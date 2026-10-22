<?php

declare(strict_types=1);

namespace phasync\Babel;

foreach (['T_PUBLIC_SET' => -9001, 'T_PROTECTED_SET' => -9002, 'T_PRIVATE_SET' => -9003, 'T_PIPE' => -9004] as $name => $value) {
    if (!\defined($name)) {
        \define($name, $value);
    }
}

/**
 * Rewrites PHP source so that calls to selected functions, and references to selected classes,
 * are sent to replacements.
 *
 * Every call site and class reference is resolved the way PHP resolves it (namespace, `use`,
 * `use function`, fallback to the global function) and rewritten to the fully qualified
 * replacement. What only exists at run time (class names and callables in variables, eval'd code)
 * is wrapped in a call to {@see Runtime}. The output keeps every line number.
 *
 * translate() handles exactly one compilation unit (a file or an eval'd string), because PHP
 * compiles each on its own: namespace, imports and strict_types never carry over. Loading files is
 * not this library's business: a consumer typically calls translate() from a stream wrapper.
 */
final class Babel
{
    /** Namespace of the shims used when a class-name argument has no position at translate time. */
    public const SHIM_NS = 'phasync\\Babel\\Shim\\';

    /** Global functions taking a class name (or object): list of [position, accepted parameter names]. */
    public const CLASS_ARG_FN = [
        'is_a' => [[0, ['object_or_class']], [1, ['class']]],
        'is_subclass_of' => [[0, ['object_or_class']], [1, ['class']]],
        'class_exists' => [[0, ['class']]], 'interface_exists' => [[0, ['interface']]],
        'trait_exists' => [[0, ['trait']]], 'enum_exists' => [[0, ['enum']]],
        'method_exists' => [[0, ['object_or_class']]], 'property_exists' => [[0, ['object_or_class']]],
        'get_parent_class' => [[0, ['object_or_class']]], 'class_implements' => [[0, ['object_or_class']]],
        'class_parents' => [[0, ['object_or_class']]], 'class_uses' => [[0, ['object_or_class']]],
        'get_class_methods' => [[0, ['object_or_class']]], 'get_class_vars' => [[0, ['class']]],
    ];
    /** Class-name functions that read the caller's scope and therefore cannot have a shim. */
    public const NO_SHIM = ['get_class_methods' => 1, 'get_class_vars' => 1, 'get_parent_class' => 1];
    /** Global functions taking an array whose values are callables: list of [position, accepted parameter names]. */
    public const CALLABLES_ARG_FN = ['preg_replace_callback_array' => [[0, ['pattern']]]];
    /** Classes whose constructor takes a class name (or object). */
    public const CLASS_ARG_NEW = [
        'reflectionclass' => [[0, ['objectorclass']]], 'reflectionmethod' => [[0, ['objectormethod']]],
        'reflectionproperty' => [[0, ['class']]], 'reflectionclassconstant' => [[0, ['class']]],
        'reflectionenum' => [[0, ['objectorclass']]],
    ];
    /** Global functions taking a 'Class::MEMBER' string. */
    public const MEMBER_ARG_FN = [
        'constant' => [[0, ['name']]], 'defined' => [[0, ['constant_name']]],
    ];
    /** Static methods taking a callable or a 'Class::method' string: [mode, specs]. */
    public const STATIC_ARG = [
        'closure::fromcallable' => ['fn', [[0, ['callback']]]],
        'reflectionmethod::createfrommethodname' => ['member', [[0, ['method']]]],
    ];

    private const RESERVED = [
        'self' => 1, 'parent' => 1, 'static' => 1, 'int' => 1, 'float' => 1, 'bool' => 1, 'string' => 1, 'array' => 1,
        'callable' => 1, 'iterable' => 1, 'object' => 1, 'mixed' => 1, 'void' => 1, 'null' => 1, 'never' => 1, 'false' => 1,
        'true' => 1, 'class' => 1, 'list' => 1, 'new' => 1, 'function' => 1, 'fn' => 1, 'match' => 1, 'enum' => 1,
    ];

    /** @internal lowercase fully qualified function => replacement */
    public readonly array $fn;
    /** @internal lowercase fully qualified class => replacement */
    public readonly array $cls;
    /** @internal lowercase fully qualified constant => replacement function to call for it */
    public readonly array $const;
    /** Fully qualified, no leading backslash; null: include/require are left alone. */
    public readonly ?string $includeHandler;
    /** Identifies the map; changes when the maps or the translator change. */
    public readonly string $fingerprint;
    /** @internal the comment translated code starts with, see translate() */
    public readonly string $marker;

    /**
     * @param array<string,string> $functions      function name => replacement function name
     * @param array<string,string> $classes        class name => replacement class name
     * @param array<string,string> $constants      global constant name => replacement function name: every
     *                                             run time read of the constant becomes a call of that
     *                                             function. An unqualified name inside a namespace resolves
     *                                             like PHP itself (the namespace's own constant when this
     *                                             unit declares or imports one of that name, else global).
     *                                             Never applied where PHP does not allow a call (constant
     *                                             expressions: const and class const values, enum case
     *                                             values, parameter and property defaults, attribute
     *                                             arguments; a local static variable's initializer is not
     *                                             in this list, since PHP 8.3 accepts arbitrary expressions
     *                                             there, same as for a mapped function or class)
     * @param bool                 $runtime        wrap what is only known at run time (eval, class
     *                                             names and callables in variables) in Runtime calls
     * @param bool                 $nsFallback     an unqualified call to a mapped global function inside
     *                                             a namespace resolves at run time like PHP's own
     *                                             fallback (the namespaced function when it exists);
     *                                             false rewrites such calls to the replacement
     *                                             unconditionally
     * @param string|null          $includeHandler a function name: every include/include_once/require/
     *                                             require_once keeps the construct, and its path
     *                                             expression (with or without parentheses, any
     *                                             expression) becomes
     *                                             `$includeHandler(<expr>, '<original directory of
     *                                             this unit>')`; null (the default): include/require
     *                                             are left alone
     * @param bool                 $fileConstants  in file units (not eval'd code), __FILE__ and __DIR__
     *                                             become string literals of the unit's original path
     *                                             and directory
     *
     * @throws \InvalidArgumentException when a name is not a valid function or class name, or a
     *                                   replacement is itself mapped or takes class names or callables
     *                                   itself (either would make a second translation of translated
     *                                   code change it again)
     */
    public function __construct(
        array $functions = [],
        array $classes = [],
        public readonly bool $runtime = true,
        public readonly bool $nsFallback = true,
        ?string $includeHandler = null,
        public readonly bool $fileConstants = false,
        array $constants = [],
    ) {
        if (null !== $includeHandler && !\preg_match('/^\\\\?[A-Za-z_\x80-\xff][\w\x80-\xff]*(\\\\[A-Za-z_\x80-\xff][\w\x80-\xff]*)*$/D', $includeHandler)) {
            throw new \InvalidArgumentException('phasync/babel: not a valid name: ' . \var_export($includeHandler, true));
        }
        $this->includeHandler = null === $includeHandler ? null : \ltrim($includeHandler, '\\');
        $fn = $cls = $const = [];
        foreach (['fn' => $functions, 'cls' => $classes, 'const' => $constants] as $kind => $map) {
            foreach ($map as $from => $to) {
                foreach ([$from, $to] as $name) {
                    if (!\is_string($name) || !\preg_match('/^\\\\?[A-Za-z_\x80-\xff][\w\x80-\xff]*(\\\\[A-Za-z_\x80-\xff][\w\x80-\xff]*)*$/D', $name)) {
                        throw new \InvalidArgumentException('phasync/babel: not a valid name: ' . \var_export($name, true));
                    }
                }
                // a reserved word cannot name a class or a replacement function (a namespaced one can: A\list);
                // as a function or constant key it never matches (get_defined_functions() lists exit and die)
                foreach ($kind === 'cls' ? [$from, $to] : [$to] as $name) {
                    $last = \strtolower(\ltrim($name, '\\'));
                    if (!\str_contains($last, '\\') && ($kind === 'cls' ? isset(self::RESERVED[$last]) : \token_get_all("<?php $last")[1][0] !== \T_STRING)) {
                        throw new \InvalidArgumentException('phasync/babel: a reserved word is not a valid name: ' . \var_export($name, true));
                    }
                }
                ${$kind}[\strtolower(\ltrim($from, '\\'))] = \ltrim($to, '\\');
            }
        }
        foreach (['fn' => $fn, 'cls' => $cls] as $kind => $map) {
            foreach ($map as $from => $to) {
                $k = \strtolower($to);
                if (isset($map[$k])) {
                    throw new \InvalidArgumentException("phasync/babel: replacement '$to' of '$from' is itself mapped");
                }
                if ($kind === 'fn' ? $k === 'eval' || self::argSpecs($k) : isset(self::CLASS_ARG_NEW[$k]) || $k === 'closure' || $k === 'reflectionmethod') {
                    throw new \InvalidArgumentException("phasync/babel: replacement '$to' of '$from' takes class names or callables itself");
                }
            }
        }
        foreach ($const as $from => $to) {
            $k = \strtolower($to);
            if (isset($fn[$k])) {
                throw new \InvalidArgumentException("phasync/babel: replacement '$to' of '$from' is itself mapped");
            }
            if ($k === 'eval' || self::argSpecs($k)) {
                throw new \InvalidArgumentException("phasync/babel: replacement '$to' of '$from' takes class names or callables itself");
            }
        }
        $this->fn = $fn;
        $this->cls = $cls;
        $this->const = $const;
        $this->fingerprint = \md5(\serialize([$fn, $cls, $runtime, $nsFallback, $this->includeHandler, $fileConstants, $const, 9]));
        $this->marker = '/*phasync-babel:' . \substr($this->fingerprint, 0, 12) . '*/';
    }

    public function isIdentity(): bool
    {
        return $this->fn === [] && $this->cls === [] && $this->const === [] && null === $this->includeHandler && !$this->fileConstants;
    }

    /**
     * Translates one compilation unit. Pure: the same input gives the same output.
     *
     * Translated code starts with a marker comment (on the first line, so line numbers stay); code
     * that starts with this Babel's marker is returned unchanged, and translating translated code
     * again changes nothing either way.
     *
     * @param string $origin the original absolute path of a file, or PHP's own origin string
     *                       for eval'd code (`/app/a.php(3) : eval()'d code`)
     */
    public function translate(string $source, string $origin): string
    {
        if ($this->isIdentity() || $source === '') {
            return $source;
        }
        $isEval = \str_ends_with($origin, " : eval()'d code") && \preg_match('/\(\d+\) : eval\(\)\'d code$/', $origin);
        if (!$isEval && \strpos($source, '<?') === false) {
            return $source; // inline HTML only
        }

        return (new Unit($this, $source, $origin, (bool) $isEval))->run();
    }

    /**
     * The replacement for a class name given as a string at run time ('Class' or 'Class::member');
     * anything else is returned as is.
     */
    public function mapClass(mixed $name): mixed
    {
        if (\is_string($name) && $this->cls) {
            $p = \strpos($name, '::');
            $r = $this->cls[\strtolower(self::unqualify($p === false ? $name : \substr($name, 0, $p)))] ?? null;
            if ($r !== null) {
                return $p === false ? $r : $r . \substr($name, $p);
            }
        }

        return $name;
    }

    /** A name given as a string at run time without its one optional leading backslash. */
    private static function unqualify(string $name): string
    {
        return $name !== '' && $name[0] === '\\' ? \substr($name, 1) : $name;
    }

    /** Maps a 'Class::member' string; other values are returned as is. */
    public function mapMember(mixed $name): mixed
    {
        return \is_string($name) && \str_contains($name, '::') ? $this->mapClass($name) : $name;
    }

    /** Maps a callable: 'func', 'Class::method', [class-string, method]; anything else is returned as is. */
    public function mapCallable(mixed $cb): mixed
    {
        if (\is_string($cb)) {
            if (\str_contains($cb, '::')) {
                return $this->mapClass($cb);
            }
            $k = \strtolower(self::unqualify($cb));
            if (isset($this->fn[$k])) {
                return $this->fn[$k];
            }
            if ($this->cls && isset(self::CLASS_ARG_FN[$k]) && !isset(self::NO_SHIM[$k]) && \function_exists(self::SHIM_NS . $k)) {
                return self::SHIM_NS . $k;
            }

            return $cb;
        }
        if (\is_array($cb) && \count($cb) === 2 && isset($cb[0]) && \is_string($cb[0])) {
            $cb[0] = $this->mapClass($cb[0]);
        }

        return $cb;
    }

    /**
     * Arguments of a function (lowercase name, `class` for a constructor, `class::method`) that hold a
     * class name, a callable or a 'Class::member' string: list of [mode, position, parameter names].
     *
     * @return list<array{string,int,list<string>}>
     */
    public static function argSpecs(string $function): array
    {
        $out = [];
        foreach ([
            'cls' => self::CLASS_ARG_FN[$function] ?? self::CLASS_ARG_NEW[$function] ?? [],
            'member' => self::MEMBER_ARG_FN[$function] ?? [],
            'fn' => self::callableArgs()[$function] ?? [],
            'fns' => self::CALLABLES_ARG_FN[$function] ?? [],
        ] as $mode => $specs) {
            foreach ($specs as [$pos, $names]) {
                $out[] = [$mode, $pos, $names];
            }
        }
        if (isset(self::STATIC_ARG[$function])) {
            foreach (self::STATIC_ARG[$function][1] as [$pos, $names]) {
                $out[] = [self::STATIC_ARG[$function][0], $pos, $names];
            }
        }

        return $out;
    }

    /** Whether the internal function $function (lowercase) has a by-reference parameter. */
    public static function byRef(string $function): bool
    {
        static $cache = [];
        if (!isset($cache[$function])) {
            $cache[$function] = false;
            if (\function_exists($function)) {
                foreach ((new \ReflectionFunction($function))->getParameters() as $p) {
                    $cache[$function] = $cache[$function] || $p->isPassedByReference();
                }
            }
        }

        return $cache[$function];
    }

    /**
     * Internal functions with a callable parameter (from Reflection, plus the few whose parameter is
     * not declared `callable`): lowercase name => list of [position, [parameter name]].
     *
     * @return array<string,list<array{int,list<string>}>>
     */
    public static function callableArgs(): array
    {
        static $table = null;
        if ($table !== null) {
            return $table;
        }
        // callable parameters without a declared type
        $table = ['ob_start' => [[0, ['callback']]], 'is_callable' => [[0, ['value']]], 'pcntl_signal' => [[1, ['handler']]],
            'excimer_set_timeout' => [[0, ['callback']]]];
        foreach (\get_defined_functions()['internal'] as $f) {
            foreach ((new \ReflectionFunction($f))->getParameters() as $p) {
                $type = $p->getType();
                $types = $type instanceof \ReflectionUnionType ? $type->getTypes() : [$type];
                foreach ($types as $t) {
                    if ($t instanceof \ReflectionNamedType && $t->getName() === 'callable') {
                        $table[\strtolower($f)][] = [$p->getPosition(), [\strtolower($p->getName())]];
                        break;
                    }
                }
            }
        }

        return $table;
    }
}
