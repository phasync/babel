<?php

declare(strict_types=1);

namespace phasync\Babel;

/**
 * The run time half of the translation: translated code calls these methods for what cannot be
 * resolved from the source alone (class names and callables computed at run time, eval'd code).
 * It is the only stateful part of phasync/babel and holds just the Babel instance.
 */
final class Runtime
{
    private static ?Babel $babel = null;
    /** @var array<string,string> per call site: the function a namespaced call resolved to */
    private static array $fallback = [];
    /** @var array<string,bool> per call site: the call reaches the namespaced function */
    private static array $local = [];

    public static function configure(Babel $babel): void
    {
        self::$babel = $babel;
        self::$fallback = self::$local = [];
        // Heredoc interpolation "{$cls::x()}" must start with '$', so translated heredocs call these.
        $GLOBALS['__phasync_babel_cls'] = static fn (mixed $name): mixed => self::cls($name);
        $GLOBALS['__phasync_babel_fn'] = static fn (mixed $cb): mixed => self::fn($cb);
        $GLOBALS['__phasync_babel_v'] = static fn (array $temps, mixed $value): mixed => self::v($temps, $value);
    }

    public static function babel(): ?Babel
    {
        return self::$babel;
    }

    /**
     * The value of a rewritten nullsafe chain; $temps holds references to its temporaries, which are
     * cleared.
     *
     * @internal
     */
    public static function v(array $temps, mixed $value): mixed
    {
        foreach ($temps as $k => $_) {
            $temps[$k] = null;
        }

        return $value;
    }

    /** Maps a class name given as a string at run time; objects and unmapped names pass through. */
    public static function cls(mixed $name): mixed
    {
        return self::$babel === null ? $name : self::$babel->mapClass($name);
    }

    /** Maps a callable ('func', 'Class::method', [class-string, method]); closures and objects pass through. */
    public static function fn(mixed $callable): mixed
    {
        return self::$babel === null ? $callable : self::$babel->mapCallable($callable);
    }

    /** Maps each value of an array of callables (preg_replace_callback_array()); anything else passes through. */
    public static function fns(mixed $callables): mixed
    {
        if (\is_array($callables)) {
            foreach ($callables as $k => $cb) {
                $callables[$k] = self::fn($cb);
            }
        }

        return $callables;
    }

    /** Maps a 'Class::member' string (constant(), defined(), ReflectionMethod). */
    public static function member(mixed $name): mixed
    {
        return self::$babel === null ? $name : self::$babel->mapMember($name);
    }

    /**
     * PHP's namespace fallback for an unqualified call: when the namespaced function $local exists at
     * the first call of this call site, $ifLocal (its replacement, or itself) is called, otherwise
     * $ifGlobal (the replacement of the global function). Like PHP, the choice is kept per call site.
     */
    public static function ns(string $site, string $local, string $ifLocal, string $ifGlobal): string
    {
        if (isset(self::$fallback[$site])) {
            return self::$fallback[$site];
        }
        $isLocal = self::$local[$site] = \function_exists($local);
        if (!$isLocal && !\function_exists($ifGlobal)) {
            return $local; // neither exists: PHP reports the namespaced name, and looks again next time
        }

        $target = $isLocal ? $ifLocal : $ifGlobal;
        if ($site[0] !== '~') {
            self::$fallback[$site] = $target; // a site of eval'd code ('~') decides at every call, see evalCode()
        }

        return $target;
    }

    /**
     * An argument of a namespaced call whose function was resolved by ns() just before (PHP evaluates
     * the callee first): mapped only when the call reaches the global function's replacement.
     *
     * @internal
     */
    public static function arg(string $site, string $mode, mixed $value): mixed
    {
        return (self::$local[$site] ?? false) ? $value : self::map($mode, $value);
    }

    /**
     * Maps the class-name / callable / member arguments inside the unpacked argument lists of a call
     * (`is_a(...$args)`, `f(...$a, ...$b)`); $offset is the number of positional arguments before them,
     * $site the guard of a namespaced call (see arg()).
     *
     * @internal
     */
    public static function spread(string $function, int $offset, ?string $site, mixed ...$lists): mixed
    {
        foreach ($lists as $list) {
            if (!\is_iterable($list)) {
                return $list; // PHP's own TypeError, at the call
            }
            if (!\is_array($list)) {
                return self::traversed($function, $offset, $site, $lists);
            }
        }
        return self::spreadRef($function, $offset, $site, ...$lists);
    }

    /**
     * spread() for a function with by-reference parameters, given variables: the unmapped elements
     * of arrays are passed on as references, so `usort(...$args)` still sorts $args[0].
     *
     * @internal
     */
    public static function spreadRef(string $function, int $offset, ?string $site, mixed &...$lists): mixed
    {
        foreach ($lists as $list) {
            if (!\is_array($list)) {
                return self::spread($function, $offset, $site, ...$lists);
            }
        }
        $specs = self::specs($function, $site);
        $out = [];
        $p = 0;
        // unpacking passes integer keys by position, in order, and string keys by name
        foreach ($lists as &$list) {
            foreach ($list as $k => &$v) {
                $key = \is_int($k) ? $p++ : $k;
                $mode = self::mode($specs, $key, $offset);
                if ($mode !== null) {
                    $out[$key] = self::map($mode, $v);
                } else {
                    $out[$key] = &$v;
                }
            }
            unset($v);
        }
        unset($list);

        return $out;
    }

    /** spread() of lists with a Traversable among them: PHP unpacks those itself (keys, warnings, errors). */
    private static function traversed(string $function, int $offset, ?string $site, array $lists): \Generator
    {
        $specs = self::specs($function, $site);
        $p = 0;
        foreach ($lists as $list) {
            foreach ($list as $k => $v) {
                $mode = self::mode($specs, \is_int($k) ? $p++ : $k, $offset);
                yield $k => $mode === null ? $v : self::map($mode, $v);
            }
        }
    }

    /** @return list<array{string,int,list<string>}> */
    private static function specs(string $function, ?string $site): array
    {
        return ($site !== null && (self::$local[$site] ?? false)) ? [] : Babel::argSpecs($function);
    }

    private static function mode(array $specs, mixed $key, int $offset): ?string
    {
        $mode = null;
        foreach ($specs as [$m, $pos, $names]) {
            if (\is_int($key) ? $key === $pos - $offset : \in_array($key, $names, true)) {
                $mode = $m;
            }
        }

        return $mode;
    }

    private static function map(string $mode, mixed $v): mixed
    {
        return match ($mode) {
            'fn' => self::fn($v),
            'fns' => self::fns($v),
            'member' => self::member($v),
            default => self::cls($v),
        };
    }

    /**
     * Translates eval'd code. $origin is the string PHP reports for this eval site
     * (`/app/a.php(3) : eval()'d code`).
     */
    public static function evalCode(string $origin, mixed $code): mixed
    {
        if ($code instanceof \Stringable) {
            $code = (string) $code;
        }
        // Anything else that is not a string is left to eval itself (coercion or TypeError, as without the tool).
        if (!\is_string($code) || self::$babel === null) {
            return $code;
        }

        $code = self::$babel->translate($code, $origin);
        // PHP compiles each eval anew, with call sites of their own. Ids unique per eval would cost
        // memory for good (PHP keeps every literal of eval'd code), so the sites of eval'd code (also
        // translated code eval'd again, as closure serializers do) are marked '~': they decide at every
        // call instead of keeping a choice that could belong to another eval.
        if (\str_contains($code, '\\phasync\\Babel\\Runtime::')) {
            $code = \preg_replace(
                "/(\\\\phasync\\\\Babel\\\\Runtime::(?:ns|arg)\\('|\\\\phasync\\\\Babel\\\\Runtime::spread(?:Ref)?\\('[^']*', \\d+, ')([0-9a-f]{10}:)/",
                '\\1~\\2',
                $code,
            );
        }

        return $code;
    }
}
