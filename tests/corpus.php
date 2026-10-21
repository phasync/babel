<?php
/**
 * Corpus checker for phasync/babel.
 *
 *   php tests/corpus.php [--jobs=N] [--limit=N] [--classes=N] [--fn=f,g] [--max=N] DIR...
 *   php tests/corpus.php --self-test
 *
 * Translates every .php file below DIR with a big map and checks the result with
 * checks that do not read the tool's internals: php -l, identity map, line preservation, determinism, and an
 * independent count of the call/class sites (nikic/php-parser + NameResolver) against the
 * \Hook\... and \Repl\... fully qualified tokens found in the translated output.
 */

use PhpParser\Node;
use PhpParser\Node\Stmt;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitor\NameResolver;
use PhpParser\NodeVisitorAbstract;
use PhpParser\ParserFactory;
use phasync\Babel\Babel;

// CORPUS_BABEL_SRC=/path/to/src runs the checker against another copy of the tool (e.g. a patched one).
if (($alt = getenv('CORPUS_BABEL_SRC')) !== false && $alt !== '') {
    require $alt . '/Babel.php';
    require $alt . '/Runtime.php';
}
require __DIR__ . '/../vendor/autoload.php';
ini_set('memory_limit', '-1');

// ---------------------------------------------------------------- oracle (php-parser)

/**
 * Collects, per line, what PHP's semantics require of a translation, as php-parser + NameResolver see it:
 *
 *   calls    mapped function calls                          (\Hook\f tokens)
 *   classes  mapped class references                        (\Repl\C tokens)
 *   imports  `use function` of a mapped function            (Hook\f inside `use function`)
 *   strargs  string literals naming a mapped class/member, rewritten at translate time ('Repl\C', 'Repl\C::m')
 *   fnstr    string literal callables rewritten to a replacement function or a shim ('Hook\f', 'phasync\Babel\Shim\f')
 *   dyn      run time wrappers: 'cls' (computed class expression or class-name argument), 'fn' (call through any
 *            computed callee, non-literal callable argument), 'member' (non-literal constant()/defined() argument);
 *            arguments of a guarded call (below) are all run time wrappers (Runtime::arg) of their mode
 *   shim     first-class callables of a class-name function (the argument position is unknown)
 *   nsfb     unqualified calls that the same namespace may declare (conditionally / nested): PHP decides at run
 *            time, so the call becomes `Runtime::ns(<site>, 'ns\f', 'ns\f', '<global replacement>')(...)`;
 *            the value is the global replacement (the function itself when only its arguments are mapped)
 *   spread   argument unpacking into a function with class-name / callable / member parameters:
 *            `...Runtime::spread('<function>', <positional arguments before it>, EXPR)`, value '<function>:<n>'
 */
final class OracleVisitor extends NodeVisitorAbstract
{
    /** Global functions taking a class name: positions, parameter names (from the PHP manual, not from the tool). */
    private const CLASS_ARG_FN = [
        'is_a' => [[0, ['object_or_class']], [1, ['class']]], 'is_subclass_of' => [[0, ['object_or_class']], [1, ['class']]],
        'class_exists' => [[0, ['class']]], 'interface_exists' => [[0, ['interface']]],
        'trait_exists' => [[0, ['trait']]], 'enum_exists' => [[0, ['enum']]],
        'method_exists' => [[0, ['object_or_class']]], 'property_exists' => [[0, ['object_or_class']]],
        'get_parent_class' => [[0, ['object_or_class']]], 'class_implements' => [[0, ['object_or_class']]],
        'class_parents' => [[0, ['object_or_class']]], 'class_uses' => [[0, ['object_or_class']]],
        'get_class_methods' => [[0, ['object_or_class']]], 'get_class_vars' => [[0, ['class']]],
    ];
    private const CLASS_ARG_NEW = [
        'reflectionclass' => [[0, ['objectorclass']]], 'reflectionmethod' => [[0, ['objectormethod']]],
        'reflectionproperty' => [[0, ['class']]], 'reflectionclassconstant' => [[0, ['class']]],
        'reflectionenum' => [[0, ['objectorclass']]],
    ];
    /** Functions taking a 'Class::CONST' string (manual). */
    private const MEMBER_ARG_FN = ['constant' => [[0, ['name']]], 'defined' => [[0, ['constant_name']]]];
    /** Callable parameters the engine does not type as `callable` (manual). */
    private const CALLABLE_EXTRA = ['ob_start' => [[0, ['callback']]], 'is_callable' => [[0, ['value']]], 'pcntl_signal' => [[1, ['handler']]],
        'excimer_set_timeout' => [[0, ['callback']]]];
    public const SHIM = 'phasync\\babel\\shim\\';
    /** Class-name functions that read the calling scope (visibility): a shim would answer for the wrong scope. */
    private const NO_SHIM = ['get_class_methods' => 1, 'get_class_vars' => 1];
    /** Functions PHP refuses to call dynamically (manual: they read the caller's frame). */
    private const NO_DYNAMIC = ['compact' => 1, 'extract' => 1, 'func_get_args' => 1, 'func_get_arg' => 1, 'func_num_args' => 1, 'get_defined_vars' => 1, 'assert' => 1];

    /** @var array<string, list<array{int,list<string>}>> function => callable parameters, from Reflection */
    private static ?array $callableFn = null;
    /** @var array<string, array{string, list<array{int,list<string>}>}> 'class::method' => [mode, parameters] */
    private static ?array $staticArg = null;

    public array $calls = [];
    public array $classes = [];
    public array $imports = [];
    public array $strargs = [];
    public array $fnstr = [];
    public array $dyn = [];
    public array $shim = [];
    public array $nsfb = [];
    public array $spread = [];
    /** @var array<int,true> spl ids of function declarations at the top level of the file or of a namespace */
    public array $topLevel = [];
    public array $allClasses = []; // lower => [count, name]   (pass 1)
    private string $ns = '';
    /** declare(strict_types=1): first-class callables go to the strict shims (phasync\Babel\Shim\Strict\) */
    public bool $strict = false;
    /** the source, to see the parentheses php-parser drops (`$x |> ($a . $b)`) */
    public string $code = '';
    private array $imp = [];      // alias(lower) => full(lower)  `use function`
    private array $declared = []; // lower fq => true (declared at the top level) | false (conditionally / nested: maybe)
    private array $pending = [];  // [ns, lowername, FuncCall]  unqualified calls in a namespace
    private array $skip = [];
    private array $skipDyn = [];  // spl ids of class expressions already covered by an outer wrapper

    public function __construct(private array $fn, private array $cls, private bool $collect = false)
    {
        if (self::$callableFn === null) {
            self::$callableFn = self::CALLABLE_EXTRA;
            foreach (get_defined_functions()['internal'] as $f) {
                foreach ((new ReflectionFunction($f))->getParameters() as $p) {
                    if (!$p->isVariadic() && preg_match('/\bcallable\b/', (string) $p->getType())) {
                        self::$callableFn[$f][] = [$p->getPosition(), [strtolower($p->getName())]];
                    }
                }
            }
            self::$staticArg = ['reflectionmethod::createfrommethodname' => ['member', [[0, ['method']]]]];
            foreach (get_declared_classes() as $c) {
                $rc = new ReflectionClass($c);
                if (!$rc->isInternal()) {
                    continue;
                }
                foreach ($rc->getMethods(ReflectionMethod::IS_STATIC) as $m) {
                    foreach ($m->getParameters() as $p) {
                        if (!$p->isVariadic() && preg_match('/\bcallable\b/', (string) $p->getType())) {
                            self::$staticArg[strtolower($c . '::' . $m->name)][0] = 'fn';
                            self::$staticArg[strtolower($c . '::' . $m->name)][1][] = [$p->getPosition(), [strtolower($p->getName())]];
                        }
                    }
                }
            }
        }
    }

    /** The class expression of a node that takes one, or null. */
    private static function classExpr(Node $n): ?Node
    {
        if ($n instanceof Node\Expr\New_ || $n instanceof Node\Expr\Instanceof_ || $n instanceof Node\Expr\StaticCall
            || $n instanceof Node\Expr\StaticPropertyFetch || $n instanceof Node\Expr\ClassConstFetch) {
            return $n->class;
        }

        return null;
    }

    private static function isLiteral(Node $e): bool
    {
        return $e instanceof Node\Scalar\String_ && in_array($e->getAttribute('kind'), [Node\Scalar\String_::KIND_SINGLE_QUOTED, Node\Scalar\String_::KIND_DOUBLE_QUOTED], true);
    }

    /** 'C' / 'C::m' with C mapped: the rewritten string (lower case), else null. */
    private function mapClassStr(string $s): ?string
    {
        $p = strpos($s, '::');
        $r = $this->cls[strtolower(ltrim($p === false ? $s : substr($s, 0, $p), '\\'))] ?? null;

        return $r === null ? null : strtolower($r . ($p === false ? '' : substr($s, $p)));
    }

    /** Records what a string literal in a class-name / member / callable position becomes. */
    private function literal(string $s, int $line, string $mode): void
    {
        if ($mode === 'cls' || str_contains($s, '::')) {
            if ($mode !== 'member' || str_contains($s, '::')) {
                if (($r = $this->mapClassStr($s)) !== null) {
                    $this->strargs[$line][] = $r;
                }
            }

            return;
        }
        if ($mode === 'fn') {
            $k = strtolower(ltrim($s, '\\'));
            if (isset($this->fn[$k])) {
                $this->fnstr[$line][] = strtolower($this->fn[$k]);
            } elseif ($this->cls && isset(self::CLASS_ARG_FN[$k]) && !isset(self::NO_SHIM[$k])) {
                $this->fnstr[$line][] = self::SHIM . $k;
            }
        }
    }

    private function dynSite(Node $n): void
    {
        $c = self::classExpr($n);
        if (!$c instanceof Node\Expr || isset($this->skipDyn[spl_object_id($n)])) {
            return;
        }
        if (self::isLiteral($c) && !$n instanceof Node\Expr\New_) {
            $this->literal($c->value, $c->getStartLine(), 'cls'); // 'A'::x(): mapped at translate time

            return;
        }
        $this->dyn[$c->getStartLine()][] = 'cls';
        if ($n instanceof Node\Expr\New_ || $n instanceof Node\Expr\Instanceof_) {
            // `new $a::$b` / `new $a->b::$c`: the whole new_variable chain is one class expression
            for ($e = $c; ; ) {
                if ($e instanceof Node\Expr\StaticPropertyFetch) {
                    $this->skipDyn[spl_object_id($e)] = true;
                    $e = $e->class;
                } elseif ($e instanceof Node\Expr\PropertyFetch || $e instanceof Node\Expr\NullsafePropertyFetch || $e instanceof Node\Expr\ArrayDimFetch) {
                    $e = $e->var;
                } else {
                    break;
                }
            }
        }
    }

    /** @return list<array{string,array{int,list<string>}}> [mode, [position, names]] of a function / constructor class / 'class::method' */
    private function specs(string $key): array
    {
        $r = [];
        if ($this->cls) {
            foreach (self::CLASS_ARG_FN[$key] ?? self::CLASS_ARG_NEW[$key] ?? [] as $sp) {
                $r[] = ['cls', $sp];
            }
            foreach (self::MEMBER_ARG_FN[$key] ?? [] as $sp) {
                $r[] = ['member', $sp];
            }
        }
        foreach (self::$callableFn[$key] ?? [] as $sp) {
            $r[] = ['fn', $sp];
        }
        foreach (self::$staticArg[$key][1] ?? [] as $sp) {
            $r[] = [self::$staticArg[$key][0], $sp];
        }

        return $r;
    }

    /**
     * Records the class-name / member / callable arguments of a call.
     *
     * @param bool $guarded the call may reach a namespaced function: every such argument is a run time wrapper
     *
     * @return bool false for a first-class callable (the argument positions are unknown)
     */
    private function callArgs(Node\Expr\CallLike $call, string $key, bool $guarded): bool
    {
        $specs = $this->specs($key);
        if (!$specs) {
            return true;
        }
        if ($call->isFirstClassCallable()) {
            return false;
        }
        // partial application (PHP 8.6): a placeholder in a class-name / callable / member position sends the call to
        // the shim (README: `is_a($x, ?)`); the bound arguments are mapped as in any call
        $byPos = $named = [];
        // (a `...` placeholder after bound arguments sends the call to the shim, like a first-class callable)
        $ph = new stdClass();
        foreach ($call->args as $a) {
            if ($a instanceof Node\VariadicPlaceholder) {
                return false;
            }
            if ($a instanceof Node\ArgPlaceholder) {
                if ($a->name !== null) {
                    $named[$a->name->toLowerString()] ??= $ph;
                } elseif (!$named) {
                    $byPos[] = $ph;
                }
                continue;
            }
            if ($a->unpack) {
                $this->spread[$a->value->getStartLine()][] = $key . ':' . count($byPos);
                break;
            }
            if ($a->name !== null) {
                $named[$a->name->toLowerString()] ??= $a->value;
            } elseif (!$named) {
                $byPos[] = $a->value;
            }
        }
        $partial = false;
        foreach ($specs as [$mode, [$pos, $names]]) {
            $target = $byPos[$pos] ?? null;
            foreach ($names as $nm) {
                $target ??= $named[$nm] ?? null;
            }
            if ($target === $ph) {
                $partial = true;
            } elseif ($target !== null) {
                $this->argValue($target, $mode, $guarded);
            }
        }

        return !$partial;
    }

    private static function isClassName(Node $e): bool
    {
        // X::class / static::class / $o::class: already a resolved class name
        return $e instanceof Node\Expr\ClassConstFetch && $e->name instanceof Node\Identifier && $e->name->toLowerString() === 'class'
            && ($e->class instanceof Node\Name || ($e->class instanceof Node\Expr\Variable && is_string($e->class->name)));
    }

    private function argValue(Node\Expr $target, string $mode, bool $guarded): void
    {
        if (self::isClassName($target)) {
            return;
        }
        if ($guarded) {
            $this->dyn[$target->getStartLine()][] = $mode;

            return;
        }
        if ($target instanceof Node\Scalar\Int_ || $target instanceof Node\Scalar\Float_) {
            return;
        }
        if (self::isLiteral($target)) {
            $this->literal($target->value, $target->getStartLine(), $mode);

            return;
        }
        if ($mode === 'fn' && $target instanceof Node\Expr\Array_) {
            $first = $target->items[0] ?? null;
            if ($first === null) {
                return;
            }
            if ($first->key === null && !$first->unpack && self::isLiteral($first->value)) {
                $this->literal($first->value->value, $first->value->getStartLine(), 'cls'); // ['Class', 'method']

                return;
            }
            if ($first->key === null && !$first->unpack && self::isClassName($first->value)) {
                return; // [X::class, 'method']
            }
        }
        $this->dyn[$target->getStartLine()][] = $mode;
    }

    /** Arguments of a call to the global function $full (or one imported by `use function`). */
    private function argSites(string $full, Node\Expr\FuncCall $node): void
    {
        if (!$this->callArgs($node, $full, false) && $this->cls && isset(self::CLASS_ARG_FN[$full]) && !isset(self::NO_SHIM[$full]) && !isset($this->fn[$full])) {
            $this->shim[$node->name->getStartLine()][] = self::SHIM . ($this->strict ? 'strict\\' : '') . $full;
        }
    }

    /** A call through a computed callee: every one is wrapped, a bare string literal is mapped at translate time. */
    private function dynCall(Node\Expr\FuncCall $n): void
    {
        $c = $n->name;
        $paren = $n->getStartFilePos() < $c->getStartFilePos(); // ('f')(), (new A)()
        if (self::isLiteral($c)) {
            $this->literal($c->value, $c->getStartLine(), 'fn'); // 'fopen'(...)
            if (!$paren) {
                return;
            }
        }
        if ($c instanceof Node\Expr\New_ && !$paren) {
            return; // new A()(): an object
        }
        $this->dyn[$n->getStartLine()][] = 'fn'; // the wrapper opens before the '(' of a parenthesised callee
    }

    /**
     * The right operand of `|>` is called with the left one: a string literal is mapped at translate time, a closure or
     * first-class callable needs nothing, any other complete operand is a computed callee. An operand that is itself
     * an operator expression is mapped only when parenthesised (README: `$x |> $a . $b` is not mapped).
     */
    private function pipe(Node\Expr\BinaryOp\Pipe $n): void
    {
        $r = $n->right;
        if (self::isLiteral($r)) {
            $this->literal($r->value, $r->getStartLine(), 'fn');

            return;
        }
        if ($r instanceof Node\Expr\Closure || $r instanceof Node\Expr\ArrowFunction || $r instanceof Node\Expr\New_
            || ($r instanceof Node\Expr\CallLike && $r->isFirstClassCallable())) {
            return;
        }
        $paren = str_contains(substr($this->code, $n->left->getEndFilePos() + 1, $r->getStartFilePos() - $n->left->getEndFilePos() - 1), '(');
        $operand = $r instanceof Node\Expr\Variable || $r instanceof Node\Expr\ArrayDimFetch || $r instanceof Node\Expr\PropertyFetch
            || $r instanceof Node\Expr\NullsafePropertyFetch || $r instanceof Node\Expr\StaticPropertyFetch || $r instanceof Node\Expr\CallLike
            || $r instanceof Node\Expr\Array_ || $r instanceof Node\Expr\ClassConstFetch || $r instanceof Node\Expr\ConstFetch || $r instanceof Node\Scalar\InterpolatedString;
        if ($paren || $operand) {
            $this->dyn[$r->getStartLine()][] = 'fn';
        }
    }

    public function enterNode(Node $n)
    {
        if ($n instanceof Node\Expr\BinaryOp\Pipe && ($this->fn || $this->cls)) {
            $this->pipe($n);
        }
        if (self::classExpr($n) !== null && $this->cls) {
            $this->dynSite($n);
        }
        if ($n instanceof Node\Expr\New_ && $n->class instanceof Node\Name && $this->cls) {
            $r = $n->class->getAttribute('resolvedName');
            if ($r !== null && isset(self::CLASS_ARG_NEW[$r->toLowerString()])) {
                $this->callArgs($n, $r->toLowerString(), false);
            }
        }
        if ($n instanceof Node\Expr\StaticCall && $n->class instanceof Node\Name && $n->name instanceof Node\Identifier && $this->cls) {
            $r = $n->class->getAttribute('resolvedName');
            if ($r !== null) {
                $this->callArgs($n, $r->toLowerString() . '::' . $n->name->toLowerString(), false);
            }
        }
        if ($n instanceof Stmt\Namespace_) {
            $this->ns = $n->name ? $n->name->toString() : '';
            $this->imp = [];
        } elseif ($n instanceof Stmt\Use_) {
            $this->uses($n->uses, '', $n->type);
        } elseif ($n instanceof Stmt\GroupUse) {
            $this->uses($n->uses, $n->prefix->toString() . '\\', $n->type);
        } elseif ($n instanceof Stmt\Function_) {
            $k = strtolower($n->namespacedName->toString());
            $this->declared[$k] = ($this->declared[$k] ?? false) || isset($this->topLevel[spl_object_id($n)]);
        } elseif ($n instanceof Node\Expr\ConstFetch) {
            $this->skip[spl_object_id($n->name)] = true;
        } elseif ($n instanceof Node\Expr\FuncCall && $n->name instanceof Node\Name) {
            $this->skip[spl_object_id($n->name)] = true;
            $this->call($n->name, $n);
        } elseif ($n instanceof Node\Expr\FuncCall) {
            if ($this->fn || $this->cls) {
                $this->dynCall($n);
            }
        } elseif ($n instanceof Node\Name && !isset($this->skip[spl_object_id($n)])) {
            $r = $n->getAttribute('resolvedName');
            if ($r === null || $n->isSpecialClassName()) {
                return null;
            }
            $lc = strtolower($r->toString());
            if ($this->collect) {
                $this->allClasses[$lc][0] = ($this->allClasses[$lc][0] ?? 0) + 1;
                $this->allClasses[$lc][1] = $r->toString();
            }
            if (isset($this->cls[$lc])) {
                $this->classes[$n->getStartLine()][] = strtolower($this->cls[$lc]);
            }
        }

        return null;
    }

    public function leaveNode(Node $n)
    {
        if ($n instanceof Stmt\Namespace_) {
            $this->ns = '';
            $this->imp = [];
        }

        return null;
    }

    private function uses(array $uses, string $prefix, int $type): void
    {
        foreach ($uses as $u) {
            if (($type === Stmt\Use_::TYPE_UNKNOWN ? $u->type : $type) !== Stmt\Use_::TYPE_FUNCTION) {
                continue;
            }
            $full = strtolower($prefix . ltrim($u->name->toString(), '\\'));
            $this->imp[$u->getAlias()->toLowerString()] = $full;
            if (isset($this->fn[$full])) {
                $this->imports[$u->getStartLine()][] = strtolower($this->fn[$full]);
            }
        }
    }

    private function call(Node\Name $name, Node\Expr\FuncCall $node): void
    {
        if ($name->isFullyQualified()) {
            $this->hit(strtolower($name->toString()), $node);
        } elseif ($name->isRelative()) {
            $rest = strtolower($name->toString());
            $this->hit($this->ns === '' ? $rest : strtolower($this->ns) . '\\' . $rest, $node);
        } elseif ($name->isUnqualified()) {
            $a = strtolower($name->toString());
            if (isset($this->imp[$a])) {
                // resolved through `use function`: the call itself is covered by the import rewrite
                $this->argSites($this->imp[$a], $node);

                return;
            }
            if ($this->ns === '') {
                $this->hit($a, $node);
            } else {
                $this->pending[] = [strtolower($this->ns), $a, $node];
            }
        } // qualified names (a\b()) never resolve to a global function
    }

    private function hit(string $full, Node\Expr\FuncCall $node): void
    {
        if (isset($this->fn[$full])) {
            $this->calls[$node->name->getStartLine()][] = strtolower($this->fn[$full]);
        }
        $this->argSites($full, $node);
    }

    /** Resolves the namespace fallback now that every function declared in the file is known. */
    public function finish(): void
    {
        foreach ($this->pending as [$ns, $a, $node]) {
            $d = $this->declared[$ns . '\\' . $a] ?? null;
            if ($d === null) {
                $this->hit($a, $node);
            } elseif ($d === false) {
                // maybe declared: PHP decides at run time (Runtime::ns), the arguments follow that choice
                if (isset(self::NO_DYNAMIC[$a])) {
                    $this->hit($a, $node); // cannot be called through a string: rewritten directly
                } elseif (isset($this->fn[$a]) || $this->specs($a)) {
                    $shim = $this->cls && isset(self::CLASS_ARG_FN[$a]) && !isset(self::NO_SHIM[$a]) && $node->isFirstClassCallable() ? self::SHIM . ($this->strict ? 'strict\\' : '') . $a : $a;
                    $this->nsfb[$node->name->getStartLine()][] = strtolower($this->fn[$a] ?? $shim);
                    $this->callArgs($node, $a, true);
                }
            }
        }
    }

    /** @return array<string, array<int, list<string>>> */
    public function sites(): array
    {
        $r = [];
        foreach (SITE_KINDS as $key => $_) {
            $r[$key] = $this->$key;
        }

        return $r;
    }
}

/** site key => short kind name used in reports */
const SITE_KINDS = ['calls' => 'call', 'classes' => 'class', 'imports' => 'import', 'strargs' => 'strarg', 'dyn' => 'dyn', 'fnstr' => 'fnstr', 'shim' => 'shim', 'nsfb' => 'nsfb', 'spread' => 'spread'];

function oracle_analyze(PhpParser\Parser $parser, string $code, array $fn, array $cls, bool $collect = false): OracleVisitor
{
    $stmts = $parser->parse($code);
    $v = new OracleVisitor($fn, $cls, $collect);
    $v->code = $code;
    foreach ($stmts as $st) {
        if (!$st instanceof Stmt\Declare_) {
            break;
        }
        foreach ($st->declares as $d) {
            if ($d->key->toLowerString() === 'strict_types' && $d->value instanceof Node\Scalar\Int_ && $d->value->value === 1) {
                $v->strict = true;
            }
        }
    }
    foreach ($stmts as $st) {
        foreach ($st instanceof Stmt\Namespace_ ? $st->stmts : [$st] as $x) {
            if ($x instanceof Stmt\Function_) {
                $v->topLevel[spl_object_id($x)] = true;
            }
        }
    }
    $t = new NodeTraverser();
    $t->addVisitor(new NameResolver(null, ['replaceNodes' => false]));
    $t->addVisitor($v);
    $t->traverse($stmts);
    $v->finish();

    return $v;
}

// ---------------------------------------------------------------- tool side (tokens)

/** Counts \Hook\... (calls), \Repl\... (classes) fully qualified tokens, and Hook\ names in `use function`. */
function token_sites(string $code): array
{
    $r = array_fill_keys(array_keys(SITE_KINDS), []);
    $toks = token_get_all($code);
    $line = 1;
    $lines = [];
    foreach ($toks as $i => $t) {
        $lines[$i] = $line;
        $line += is_array($t) ? substr_count($t[1], "\n") : substr_count($t, "\n");
    }
    $sig = []; // significant token indexes
    foreach ($toks as $i => $t) {
        if (!(is_array($t) && ($t[0] === T_WHITESPACE || $t[0] === T_COMMENT || $t[0] === T_DOC_COMMENT))) {
            $sig[] = $i;
        }
    }
    $at = fn (int $k) => isset($sig[$k]) ? $toks[$sig[$k]] : null;
    $prevUse = false;
    $inUseFn = false;
    $str = fn (int $k) => is_array($x = $at($k)) && $x[0] === T_CONSTANT_ENCAPSED_STRING ? strtolower(str_replace(['\\\\', "\\'"], ['\\', "'"], substr($x[1], 1, -1))) : null;
    $skipStr = []; // string tokens that are arguments of Runtime::ns/arg/spread
    foreach ($sig as $k => $i) {
        $t = $toks[$i];
        $l = $lines[$i];
        if ($prevUse && is_array($t) && $t[0] === T_FUNCTION) {
            $inUseFn = true;
        }
        $prevUse = is_array($t) && $t[0] === T_USE;
        if ($inUseFn && $t === ';') {
            $inUseFn = false;
        }
        if (is_array($t) && $t[0] === T_CONSTANT_ENCAPSED_STRING && $t[1][0] === "'" && !isset($skipStr[$k])) {
            $v = $str($k);
            if (str_starts_with($v, 'repl\\')) {
                $r['strargs'][$l][] = $v;
            } elseif (str_starts_with($v, 'hook\\') || str_starts_with($v, OracleVisitor::SHIM)) {
                $r['fnstr'][$l][] = $v;
            }
        }
        // \phasync\Babel\Runtime::cls|clsOrNull|fn|member(
        if (is_array($t) && $t[0] === T_NAME_FULLY_QUALIFIED && strcasecmp($t[1], '\\phasync\\Babel\\Runtime') === 0 && is_array($u = $at($k + 1)) && $u[0] === T_DOUBLE_COLON) {
            $m = $at($k + 2);
            $m = is_array($m) ? strtolower($m[1]) : '';
            $kind = ['cls' => 'cls', 'clsornull' => 'cls', 'fn' => 'fn', 'member' => 'member'][$m] ?? null;
            if ($kind !== null) {
                $r['dyn'][$l][] = $kind;
            } elseif ($at($k + 3) === '(' && in_array($m, ['ns', 'arg', 'spread', 'spreadref'], true)) {
                // ns('<site>', '<local>', '<ifLocal>', '<ifGlobal>'), arg('<site>', '<mode>', EXPR), spread|spreadRef('<fn>', <n>, EXPR[, '<site>'])
                $skipStr += array_fill_keys(array_map(fn ($d) => $k + $d, ['ns' => [4, 6, 8, 10], 'arg' => [4, 6, 8], 'spread' => [4], 'spreadref' => [4]][$m]), 1);
                if ($m === 'ns') {
                    $r['nsfb'][$l][] = $str($k + 10);
                } elseif ($m === 'arg') {
                    $r['dyn'][$l][] = $str($k + 6);
                } else {
                    $r['spread'][$l][] = $str($k + 4) . ':' . (is_array($n = $at($k + 6)) ? $n[1] : '?');
                }
            }
        }
        // "{$GLOBALS['__phasync_babel_cls'](...)}" inside interpolation
        if (is_array($t) && $t[0] === T_VARIABLE && $t[1] === '$GLOBALS' && $at($k + 1) === '[') {
            $s = $at($k + 2);
            if (is_array($s) && in_array($s[1], ["'__phasync_babel_cls'", "'__phasync_babel_v'", "'__phasync_babel_fn'"], true)) {
                $r['dyn'][$l][] = $s[1] === "'__phasync_babel_fn'" ? 'fn' : 'cls';
            }
        }
        if (is_array($t) && ($t[0] === T_NAME_FULLY_QUALIFIED || $t[0] === T_NAME_QUALIFIED)) {
            $lc = strtolower(ltrim($t[1], '\\'));
            $fq = $t[0] === T_NAME_FULLY_QUALIFIED;
            if ($inUseFn) {
                if (str_starts_with($lc, 'hook\\')) {
                    $r['imports'][$l][] = $lc;
                }
            } elseif ($fq && str_starts_with($lc, 'hook\\')) {
                $r['calls'][$l][] = $lc;
            } elseif ($fq && str_starts_with($lc, 'repl\\')) {
                $r['classes'][$l][] = $lc;
            } elseif ($fq && str_starts_with($lc, OracleVisitor::SHIM)) {
                $r['shim'][$l][] = $lc;
            }
        }
    }

    return $r;
}

/** translated sites minus original sites (multiset, per line, per kind). */
function sites_diff(array $out, array $orig): array
{
    foreach ($out as $kind => $lines) {
        foreach ($lines as $l => $names) {
            foreach ($orig[$kind][$l] ?? [] as $o) {
                $k = array_search($o, $names, true);
                if ($k !== false) {
                    unset($names[$k]);
                }
            }
            if ($names) {
                $out[$kind][$l] = array_values($names);
            } else {
                unset($out[$kind][$l]);
            }
        }
    }

    return $out;
}

/** @return list<array{int,string,array,array}> [line, kind, oracleOnly, toolOnly] */
function compare_sites(array $oracle, array $tool): array
{
    $res = [];
    foreach (SITE_KINDS as $key => $kind) {
        foreach (array_unique(array_merge(array_keys($oracle[$key]), array_keys($tool[$key]))) as $l) {
            $o = $oracle[$key][$l] ?? [];
            $t = $tool[$key][$l] ?? [];
            $oo = $o;
            $to = [];
            foreach ($t as $x) {
                $k = array_search($x, $oo, true);
                if ($k === false) {
                    $to[] = $x;
                } else {
                    unset($oo[$k]);
                }
            }
            if ($oo || $to) {
                $res[] = [$l, $kind, array_values($oo), $to];
            }
        }
    }

    return $res;
}

/** The tail of a multi-line wrapper call: the only change on the line is an inserted `)`. */
function closing_paren_added(string $orig, string $new): bool
{
    $new = preg_replace('~, \'(?:[^\'\\\\]|\\\\.)*eval\\(\\)\\\\\'d code\'~', '', $new);
    if ($new === $orig) {
        return true;
    }
    for ($p = strpos($new, ')'); $p !== false; $p = strpos($new, ')', $p + 1)) {
        if (substr($new, 0, $p) . substr($new, $p + 1) === $orig) {
            return true;
        }
    }

    return false;
}

function make_parser(): PhpParser\Parser
{
    return (new ParserFactory())->createForNewestSupportedVersion();
}

// ---------------------------------------------------------------- self test

function self_test(): int
{
    $fn = ['fopen' => 'Hook\fopen', 'sleep' => 'Hook\sleep', 'class_exists' => 'Hook\class_exists'];
    $cls = ['Orig\Thing' => 'Repl\Thing', 'PDO' => 'Repl\PDO'];
    $fnl = array_change_key_case($fn);
    $clsl = array_change_key_case($cls);
    // [name, code, expected calls, classes, imports, strargs, dyn, fnstr, shim, nsfb, spread] (missing = 0)
    $cases = [
        ['global call', '<?php fopen(1); \fopen(2); FOPEN(3); sleep(...);', 4, 0, 0],
        ['ns fallback', "<?php\nnamespace a;\nfopen(1);\n\\fopen(2);\nnamespace\\fopen(3);\nb\\fopen(4);\n", 2, 0, 0],
        ['ns fallback shadowed by declaration', "<?php\nnamespace a;\nfunction fopen(\$x) {}\nfopen(1);\n\\fopen(2);\nsleep(1);\n", 2, 0, 0],
        ['declaration in other namespace does not shadow', "<?php\nnamespace b { function fopen(\$x) {} }\nnamespace a { fopen(1); }\n", 1, 0, 0],
        ['conditional declaration: run time check', "<?php\nnamespace a;\nif (true) { function sleep() {} }\nsleep(1);\nfunction x() { function fopen() {} }\nfopen(1);\nfunction fopen() {}\n", 0, 0, 0, 0, 0, 0, 0, 1],
        ['use function import, call via alias is not a call site', "<?php\nnamespace a;\nuse function fopen as f;\nuse function sleep;\nf(1); sleep(2); fopen(3);\n", 1, 0, 2],
        ['use function of other function', "<?php\nnamespace a;\nuse function Other\\fopen;\nfopen(1);\nsleep(2);\n", 1, 0, 0],
        ['group use', "<?php\nnamespace a;\nuse function Other\\{fopen, sleep as nap};\nfopen(1); nap(2);\n", 0, 0, 0],
        ['group use of global names with prefix', "<?php\nnamespace a;\nuse function Other\\{fopen};\nsleep(1);\n", 1, 0, 0],
        ['two namespaces, imports are per namespace', "<?php\nnamespace a { use function fopen; fopen(1); }\nnamespace b { fopen(2); }\n", 1, 0, 1],
        ['methods and friends are not calls', "<?php\n\$o->fopen(1); O::fopen(2); new fopen; function fopen2() {} const sleep = 1; echo sleep;\n", 0, 0, 0],
        ['class refs', "<?php\nnamespace x;\nuse Orig\\Thing;\nuse Orig\\Thing as T;\nclass A extends Thing implements \\PDO { use T; }\nnew Thing; T::f(); \$a instanceof \\Orig\\Thing; Thing::class; PDO::x();\n", 0, 7, 0],
        ['class refs in types, catch, attributes', "<?php\nuse Orig\\Thing;\n#[Thing] function f(Thing|\\PDO \$a, ?Thing \$b, (Thing&\\PDO)|null \$c): ?Thing { try {} catch (\\PDO | Thing \$e) {} }\n", 0, 9, 0],
        ['class refs: special names and shadows', "<?php\nnamespace a;\nnew PDO; new \\PDO; new self; new static; \\Orig\\Thing::X;\n", 0, 2, 0],
        ['global namespace PDO', "<?php\nnew PDO; new pdo; function g(PDO \$x) {}\n", 0, 3, 0],
        // [.., strargs, dyn]
        ['class-name literals', "<?php\nnamespace a;\nis_a(\$o, 'Orig\\Thing'); \\class_exists('\\\\PDO'); is_subclass_of(\$o, \"Orig\\\\Thing\"); method_exists('Other', 'x'); class_exists(class: 'PDO');\n", 2, 0, 0, 4, 2],
        ['class-name literals: reflection', "<?php\nnew \\ReflectionClass('PDO'); new \\ReflectionMethod('PDO', 'x'); new \\ReflectionProperty(class: 'Orig\\Thing', property: 'p');\n", 0, 0, 0, 3, 0],
        ['class-name args: dynamic', "<?php\nis_a(\$o, \$c); class_exists(\$a . 'x'); is_a(\$o, Foo::class); is_a(\$o, static::class); new \\ReflectionClass(\$x); method_exists(...\$a); is_a(...);\n", 1, 0, 0, 0, 6, 0, 1, 0, 1],
        ['class-name fn shadowed in namespace', "<?php\nnamespace a;\nfunction is_a(\$a, \$b) {}\nis_a(\$o, 'PDO'); is_a(\$o, \$x);\n", 0, 0, 0, 0, 0],
        ['class-name fn via use function', "<?php\nnamespace a;\nuse function is_a;\nis_a(\$o, 'PDO');\n", 0, 0, 0, 1, 1],
        ['dynamic class expressions', "<?php\nnew \$x; new \$this->c; new \$a['k']; \$x::foo(); \$this->c::X; \$o instanceof \$x; new static::\$c; \$x::\$p;\n", 0, 0, 0, 0, 8],
        ['dynamic class expressions: in strings, and static ones', "<?php\necho \"{\$x::foo()}\"; \$x->foo(); \$o instanceof Foo; Foo::\$x;\n", 0, 0, 0, 0, 1],
        ['string class before ::, new/instanceof (expr)', "<?php\n'Orig\\Thing'::who(); 'Other'::x(); new ('Orig\\Thing'); \$o instanceof (\$c); new (trim(\$c))(1);\n", 0, 0, 0, 1, 3],
        ['X::class before ::', "<?php\nOrig\\Thing::class::who(); \$o::class::x();\n", 0, 1, 0, 0, 3],
        ['nullsafe chain before ::', "<?php\n\$a?->b::m(); \$a?->b::\$p; f(\$a?->b)::X;\n", 0, 0, 0, 0, 3],
        ['calls through variables', "<?php\n\$f(1); \$a['k'](2); \$a['k']['j'](3); echo \"{\$f()}\"; \$o->m(); A::\$f(); \$o->\$f(); (function () {})(); (fn () => 1)(); (new A)(); new A()();\n", 0, 0, 0, 0, 7],
        ['calls through computed callees (r3_corpus_01)', "<?php\n\$this->cb[0](4); (\$this->cb)(5); \$f()(6); A::\$cb(7); (\$f)(8); (\$a['k'])(9); A::\$p['k'](); [\$o, 'm'](); [Orig\\Thing::class, 'm']();\n", 0, 1, 0, 0, 9],
        ['string callees', "<?php\n'fopen'(1); ('sleep')(2); 'PDO::x'(); 'trim'(3); 'is_a'(\$o, 'x');\n", 0, 0, 0, 1, 1, 3],
        ['callable arguments', "<?php\narray_map('fopen', \$x); usort(\$a, [Orig\\Thing::class, 'cmp']); usort(\$a, ['Orig\\Thing', 'cmp']); call_user_func('PDO::x'); array_filter(\$a, \$cb);\narray_map(fn (\$x) => \$x, \$a); array_map(null, \$a); is_callable('is_a'); call_user_func(...\$args); spl_autoload_register(callback: \$f); array_map(1, \$a); usort(\$a, []);\n", 0, 1, 0, 2, 4, 2, 0, 0, 1],
        ['callable arguments: computed class string in array (tool bug r3_corpus_02)', "<?php\ncall_user_func(['Orig\\\\' . \$n, 'x']);\n", 0, 0, 0, 0, 1],
        ['callable arguments: reflection-typed callables the tool does not list (tool bug r3_corpus_03)', "<?php\nspl_autoload_unregister(\$f); session_set_save_handler(\$o, \$c, \$r, \$w, \$d, \$g);\n", 0, 0, 0, 0, 5],
        ['member strings', "<?php\nconstant('PDO::ATTR'); defined('FOO'); constant(\$n); defined(constant_name: 'Orig\\Thing::X'); constant(...\$a); defined(\$c . '::X');\n", 0, 0, 0, 2, 2, 0, 0, 0, 1],
        ['static callable / member parameters', "<?php\nClosure::fromCallable('fopen'); \\Closure::fromCallable(\$f); ReflectionMethod::createFromMethodName('PDO::x'); ReflectionMethod::createFromMethodName(\$m);\n", 0, 0, 0, 1, 2, 1],
        ['spread into a reflection constructor (r3_corpus_06)', "<?php\nnew ReflectionMethod(...\$cb); new \\ReflectionClass(...\$a); new ReflectionMethod(\$o, ...\$m);\n", 0, 0, 0, 0, 1, 0, 0, 0, 3],
        ['spread into a mapped class-name function (r3_corpus_04)', "<?php\nclass_exists(...\$a); \\class_exists(...);\n", 2, 0, 0, 0, 0, 0, 0, 0, 1],
        ['guarded call: arguments follow the run time choice', "<?php\nnamespace a;\nif (!function_exists('a\\is_a')) { function is_a(\$a, \$b) {} }\nis_a(\$o, 'PDO'); is_a(\$o, Orig\\Thing::class); is_a(...\$x); is_a(...); sleep(1);\n", 1, 0, 0, 0, 3, 0, 0, 4, 1],
        ['nullsafe static chain continued by another :: (tool bug r4_corpus_01)', "<?php\n\$a?->b::m()::n();\n", 0, 0, 0, 0, 2],
        ['untyped callable parameter of pcntl_signal (tool bug r4_corpus_02)', "<?php\npcntl_signal(SIGINT, \$h); pcntl_signal(SIGINT, 'Orig\\Thing::who');\n", 0, 0, 0, 1, 1],
        // round 4 forms
        ['spread of a variable into a by-reference function: spreadRef', "<?php\nusort(...\$args); usort(...\$a['x']); array_walk(...\$w); is_a(...\$x); usort(\$a, ...\$r);\n", 0, 0, 0, 0, 0, 0, 0, 0, 5],
        ['strict_types: first-class callables go to the strict shims', "<?php\ndeclare(strict_types=1);\nnamespace a;\nis_a(...); array_map('is_a', \$a); \\class_exists(...); method_exists(\$o, ?);\nif (0) { function is_subclass_of() {} }\nis_subclass_of(...);\n", 1, 0, 0, 0, 1, 1, 1, 1],
        ['partial application: a placeholder in a class-name position goes to the shim', "<?php\nis_a(\$x, ?); is_a(?, 'PDO'); is_a(\$x, ...); method_exists(\$o, ...); method_exists(\$o, ?); is_a(object_or_class: ?, class: 'PDO'); class_exists(?); array_map(?, \$l); \$f(?, 1);\n", 1, 0, 0, 2, 3, 0, 5],
        ['strict_types=0 keeps the plain shims', "<?php\ndeclare(strict_types=0);\nis_a(...);\n", 0, 0, 0, 0, 0, 0, 1],
        ['pipe operator operands', "<?php\n\$x |> \$f; \$x |> 'fopen'; \$x |> 'Orig\\Thing::who'; \$x |> strlen(...); \$x |> (fn (\$y) => 1); \$x |> A::\$p; \$x |> \$o->m(); \$x |> [\$o, 'm'] |> \$g;\n\$x |> \$a . \$b; \$x |> new A; \$x |> (\$a . \$b); \$x |> \$f === 1;\n", 0, 0, 0, 1, 7, 1],
        ['pipe operator: static calls and constants are complete operands too (tool bug r5_corpus_01)', "<?php\n\$x |> A::m(); \$x |> \$o::m(); \$x |> A::B; \$x |> CB; \$x |> \"f{\$y}\";\n", 0, 0, 0, 0, 6],
        ['untyped callable parameter of excimer_set_timeout', "<?php\nexcimer_set_timeout(\$f, 1); excimer_set_timeout('fopen', 1);\n", 0, 0, 0, 0, 1, 1],
        ['nullsafe: one guard per chain, cls for each :: after the first ?->', "<?php\n\$a?->b?->c::m()::\$p; \$a?->b->c::X; \$a?->b(\$a?->c::m())::n();\n", 0, 0, 0, 0, 5],
        ['no shim for scope-reading class-name functions', "<?php\nget_class_methods(...); array_map('get_class_vars', \$a); array_map('is_a', \$a); [static::class, 'm'](); usort(\$a, [static::class, 'm']); usort(\$a, [\$o::class, 'm']);\n", 0, 0, 0, 0, 2, 1],
    ];
    $parser = make_parser();
    $babel = new Babel($fn, $cls, true, false); // as worker_check: no run time namespace fallback check
    $bad = $knownBugs = 0;
    foreach ($cases as $case) {
        [$name, $code] = $case;
        $exp = array_slice(array_pad($case, 2 + count(SITE_KINDS), 0), 2);
        try {
            $v = oracle_analyze($parser, $code, $fnl, $clsl);
        } catch (Throwable $e) {
            ++$bad;
            echo "ORACLE WRONG  $name: ", $e->getMessage(), "\n";
            continue;
        }
        $o = $v->sites();
        $got = array_values(array_map(fn ($x) => array_sum(array_map('count', $x)), $o));
        if ($got !== $exp) {
            ++$bad;
            echo "ORACLE WRONG  $name: expected ", implode('/', SITE_KINDS), ' ', implode('/', $exp), ", oracle ", implode('/', $got), "\n";
            continue;
        }
        $out = $babel->translate($code, '/x/y.php');
        $t = sites_diff(token_sites($out), token_sites($code));
        foreach (compare_sites($o, $t) as [$l, $kind, $oo, $to]) {
            // snippets named "(tool bug <case>)" document a known tool bug: the oracle count is the hand count
            $known = str_contains($name, '(tool bug ');
            $bad += $known ? 0 : 1;
            $knownBugs += $known ? 1 : 0;
            echo $known ? 'KNOWN TOOL BUG' : 'TOOL DIFFERS', "  $name line $l $kind: oracle-only [", implode(',', $oo), "] tool-only [", implode(',', $to), "]\n";
        }
    }
    echo $bad ? "self-test: $bad problem(s)\n" : "self-test: all " . count($cases) . " snippets: oracle matches hand counts, tool matches oracle"
        . ($knownBugs ? " except $knownBugs difference(s) in the known tool bug snippets" : '') . "\n";

    return $bad ? 1 : 0;
}

// ---------------------------------------------------------------- workers

function worker_scan(string $listFile, string $outFile): void
{
    $parser = make_parser();
    $classes = [];
    $parseFail = 0;
    $n = 0;
    foreach (explode("\n", trim(file_get_contents($listFile))) as $path) {
        $src = @file_get_contents($path);
        if ($src === false) {
            continue;
        }
        try {
            $v = oracle_analyze($parser, $src, [], [], true);
        } catch (Throwable $e) {
            ++$parseFail;
            continue;
        }
        foreach ($v->allClasses as $lc => [$c, $name]) {
            $classes[$lc][0] = ($classes[$lc][0] ?? 0) + $c;
            $classes[$lc][1] = $name;
        }
        ++$n;
    }
    file_put_contents($outFile, serialize(['classes' => $classes, 'parseFail' => $parseFail, 'n' => $n]));
}

function worker_check(string $listFile, string $mapFile, string $tmp, string $outFile, int $wid): void
{
    $map = unserialize(file_get_contents($mapFile));
    $fnl = array_change_key_case($map['functions']);
    $clsl = array_change_key_case($map['classes']);
    // Counting compares fully qualified \Hook\ tokens, so the run time namespace fallback check (which
    // names the replacement in a string) is off there; the default translation is what gets linted.
    $babel = new Babel($map['functions'], $map['classes'], true, false);
    $babelFb = new Babel($map['functions'], $map['classes']);
    $identity = new Babel([], []);
    $parser = make_parser();
    $res = ['files' => 0, 'parseFail' => 0, 'changed' => [], 'mm' => [], 'time' => 0.0, 'bytes' => 0, 'sites' => array_fill_keys(SITE_KINDS, 0)];
    $constructs = '/eval|__COMPILER_HALT_OFFSET__|is_a|is_subclass_of|_exists|property_exists|get_parent_class|class_implements|class_parents|class_uses|get_class_methods|get_class_vars|Reflection/i';
    $id = 0;
    foreach (explode("\n", trim(file_get_contents($listFile))) as $path) {
        $src = @file_get_contents($path);
        if ($src === false) {
            continue;
        }
        try {
            $v = oracle_analyze($parser, $src, $fnl, $clsl);
        } catch (Throwable $e) {
            ++$res['parseFail'];
            continue;
        }
        ++$res['files'];
        $res['bytes'] += strlen($src);
        $mm = function (string $kind, int $line, string $msg) use (&$res, $path) {
            $res['mm'][] = [$path, $line, $kind, $msg];
        };
        set_error_handler(function ($no, $msg) use ($mm) {
            if (!(error_reporting() & $no)) {
                return true;
            }
            $mm('warning', 0, 'translate() raised: ' . $msg);

            return true;
        });
        try {
            $t0 = hrtime(true);
            $out = $babel->translate($src, $path);
            $res['time'] += (hrtime(true) - $t0) / 1e9;
            $again = $babel->translate($src, $path);
        } catch (Throwable $e) {
            restore_error_handler();
            $mm('crash', 0, get_class($e) . ': ' . $e->getMessage());
            continue;
        }
        restore_error_handler();
        if ($again !== $out) {
            $mm('nondeterministic', 0, 'second translate() differs');
        }
        if ($identity->translate($src, $path) !== $src) {
            $mm('identity', 0, 'empty map changed the source');
        }
        if (substr_count($src, "\n") !== substr_count($out, "\n")) {
            $mm('newlines', 0, 'newline count ' . substr_count($src, "\n") . ' -> ' . substr_count($out, "\n"));
            continue;
        }
        $o = $v->sites();
        foreach (SITE_KINDS as $key => $k) {
            $res['sites'][$k] += array_sum(array_map('count', $o[$key]));
        }
        if ($out === $src) {
            $tool = array_fill_keys(array_keys(SITE_KINDS), []);
        } else {
            $tool = sites_diff(token_sites($out), token_sites($src));
            $f = $tmp . '/' . $wid . '_' . $id++ . '.php';
            $outFb = $babelFb->translate($src, $path);
            if (substr_count($outFb, "\n") !== substr_count($src, "\n")) {
                $mm('newlines', 0, 'newline count changed with the namespace fallback check');
            }
            file_put_contents($f, $outFb);
            $res['changed'][$f] = $path;
        }
        foreach (compare_sites($o, $tool) as [$l, $kind, $oo, $to]) {
            $mm($kind, $l, 'oracle-only [' . implode(',', $oo) . '] tool-only [' . implode(',', $to) . ']');
        }
        if ($out !== $src) {
            $a = explode("\n", $src);
            // the marker comment on the line of the first open tag is no rewrite site
            $b = explode("\n", str_replace([$babel->marker . ' ', ' ' . $babel->marker, $babel->marker], '', $out));
            foreach ($a as $i => $line) {
                $l = $i + 1;
                $site = false;
                foreach ($o as $key => $x) {
                    $site = $site || isset($x[$l]) || isset($tool[$key][$l]);
                }
                if ($line !== $b[$i] && !$site
                    && !preg_match('/Runtime::(?:cls|clsOrNull|fn|fns|member|evalCode|ns|arg|spread|spreadRef|v)\(|__phasync_babel_|Babel\\\\Shim\\\\/', $b[$i]) && !str_contains($b[$i], 'Repl\\\\') && !closing_paren_added($line, $b[$i])
                    && !preg_match($constructs, $line) && !preg_match('/\\$\w+\s*::|instanceof\s+\$|new\s+\$/', $line)) {
                    $mm('line', $l, 'line changed without a rewrite site: ' . trim(substr($b[$i], 0, 160)));
                }
            }
        }
    }
    file_put_contents($outFile, serialize($res));
}

// ---------------------------------------------------------------- main

function run_workers(array $cmds): void
{
    $procs = [];
    foreach ($cmds as $c) {
        $procs[] = proc_open($c, [], $pipes);
    }
    foreach ($procs as $p) {
        proc_close($p);
    }
}

function main(array $argv): int
{
    $jobs = 16;
    $limit = 0;
    $nclasses = 300;
    $max = 60;
    $dirs = [];
    $onlyFn = null;
    foreach (array_slice($argv, 1) as $a) {
        if (preg_match('/^--jobs=(\d+)$/', $a, $m)) {
            $jobs = max(1, (int) $m[1]);
        } elseif (preg_match('/^--limit=(\d+)$/', $a, $m)) {
            $limit = (int) $m[1];
        } elseif (preg_match('/^--classes=(\d+)$/', $a, $m)) {
            $nclasses = (int) $m[1];
        } elseif (preg_match('/^--fn=(.+)$/', $a, $m)) {
            $onlyFn = explode(',', $m[1]); // a small function map, e.g. --fn=fopen,sleep --classes=0
        } elseif (preg_match('/^--max=(\d+)$/', $a, $m)) {
            $max = (int) $m[1];
        } else {
            $dirs[] = $a;
        }
    }
    if (!$dirs) {
        fwrite(STDERR, "usage: php tests/corpus.php [--jobs=N] [--limit=N] [--classes=N] [--fn=f,g] [--max=N] DIR...\n       php tests/corpus.php --self-test\n");

        return 2;
    }
    $tmp = sys_get_temp_dir() . '/babel-corpus-' . getmypid();
    mkdir($tmp, 0777, true);
    $self = escapeshellarg(PHP_BINARY) . ' -d memory_limit=-1 ' . escapeshellarg(__FILE__);

    // 1. files, biggest first, dealt round robin so the workers get equal work
    $files = [];
    foreach ($dirs as $d) {
        $d = (string) realpath($d);
        $find = shell_exec('find ' . escapeshellarg($d) . ' -type f \( -iname "*.php" \) -readable -printf "%s\t%p\n" 2>/dev/null');
        foreach (explode("\n", trim((string) $find)) as $row) {
            if ($row !== '') {
                [$size, $p] = explode("\t", $row, 2);
                $files[$p] = (int) $size;
            }
        }
    }
    arsort($files);
    $files = array_keys($files);
    if ($limit > 0) {
        mt_srand(1);
        shuffle($files);
        $files = array_slice($files, 0, $limit);
    }
    $jobs = min($jobs, max(1, count($files)));
    $lists = array_fill(0, $jobs, []);
    foreach ($files as $i => $p) {
        $lists[$i % $jobs][] = $p;
    }
    foreach ($lists as $w => $l) {
        file_put_contents("$tmp/list$w", implode("\n", $l));
    }

    // 2. pass 1: most referenced classes
    $t0 = microtime(true);
    run_workers(array_map(fn ($w) => "$self --w-scan=$tmp/list$w --out=$tmp/scan$w", range(0, $jobs - 1)));
    $classes = [];
    $scanFail = 0;
    foreach (range(0, $jobs - 1) as $w) {
        $r = unserialize((string) @file_get_contents("$tmp/scan$w"));
        $scanFail += $r['parseFail'] ?? 0;
        foreach ($r['classes'] ?? [] as $lc => [$c, $name]) {
            $classes[$lc][0] = ($classes[$lc][0] ?? 0) + $c;
            $classes[$lc][1] = $name;
        }
    }
    uasort($classes, fn ($a, $b) => $b[0] <=> $a[0]);
    $clsMap = [];
    foreach ($classes as $lc => [$c, $name]) {
        if (count($clsMap) >= $nclasses) {
            break;
        }
        // Generator/Closure/Traversable/Iterator are checked by the engine at compile time; replacing them can never lint
        if (!str_starts_with($lc, 'repl\\') && !str_starts_with($lc, 'hook\\') && !in_array($lc, ['generator', 'closure', 'traversable', 'iterator'], true)) {
            $clsMap[$name] = 'Repl\\' . $name;
        }
    }
    foreach (['PDO', 'DateTime', 'Exception', 'ArrayObject'] as $g) {
        $clsMap[$g] = 'Repl\\' . $g;
    }
    $skip = array_flip(['sort', 'rsort', 'usort', 'uasort', 'uksort', 'ksort', 'krsort', 'asort', 'arsort', 'natsort', 'natcasesort', 'shuffle',
        'in_array', 'count', 'sizeof', 'range', 'compact', 'extract', 'key', 'current', 'next', 'prev', 'reset', 'end', 'min', 'max',
        'func_get_args', 'func_get_arg', 'func_num_args', 'get_defined_vars', 'get_called_class']);
    $fnMap = [];
    foreach (get_defined_functions()['internal'] as $f) {
        if ($onlyFn !== null ? in_array($f, $onlyFn, true) : !str_starts_with($f, 'str') && !str_starts_with($f, 'array_') && !isset($skip[$f])) {
            $fnMap[$f] = 'Hook\\' . $f;
        }
    }
    file_put_contents("$tmp/map", serialize(['functions' => $fnMap, 'classes' => $clsMap]));

    // 3. pass 2: translate and check
    run_workers(array_map(fn ($w) => "$self --w-check=$tmp/list$w --map=$tmp/map --tmp=$tmp --out=$tmp/res$w --wid=$w", range(0, $jobs - 1)));
    $tWork = microtime(true) - $t0;
    $agg = ['files' => 0, 'parseFail' => 0, 'changed' => [], 'mm' => [], 'time' => 0.0, 'bytes' => 0, 'sites' => array_fill_keys(SITE_KINDS, 0)];
    foreach (range(0, $jobs - 1) as $w) {
        $r = unserialize((string) @file_get_contents("$tmp/res$w"));
        if (!$r) {
            echo "worker $w produced no result (crashed?)\n";
            continue;
        }
        foreach (['files', 'parseFail', 'time', 'bytes'] as $k) {
            $agg[$k] += $r[$k];
        }
        foreach ($r['sites'] as $k => $v) {
            $agg['sites'][$k] += $v;
        }
        $agg['changed'] += $r['changed'];
        array_push($agg['mm'], ...$r['mm']);
    }

    // 4. lint all changed outputs in parallel; failing ones are checked against the original
    file_put_contents("$tmp/lint", implode("\0", array_keys($agg['changed'])));
    $lint = fn (string $list) => array_filter(explode("\n", (string) shell_exec(
        'xargs -0 -P ' . $jobs . ' -n 25 sh -c ' . escapeshellarg('for f; do ' . escapeshellarg(PHP_BINARY) . ' -n -d display_errors=0 -l "$f" >/dev/null 2>&1 || echo "$f"; done') . ' sh < ' . escapeshellarg($list))));
    $lintBad = $lint("$tmp/lint");
    $origBad = [];
    if ($lintBad) {
        file_put_contents("$tmp/lint2", implode("\0", array_map(fn ($f) => $agg['changed'][$f], $lintBad)));
        $origBad = array_flip($lint("$tmp/lint2"));
    }
    $lintFail = 0;
    $lintOrigBad = 0;
    foreach ($lintBad as $f) {
        $orig = $agg['changed'][$f];
        if (isset($origBad[$orig])) {
            ++$lintOrigBad;
            continue;
        }
        ++$lintFail;
        $err = trim((string) shell_exec(escapeshellarg(PHP_BINARY) . ' -n -l ' . escapeshellarg($f) . ' 2>&1'));
        $agg['mm'][] = [$orig, 0, 'lint', str_replace($f, 'OUT', explode("\n", $err)[0])];
    }

    // 5. report
    $by = [];
    foreach ($agg['mm'] as [$p, $l, $kind, $msg]) {
        $by[$kind][] = [$p, $l, $msg];
    }
    $show = $max;
    foreach ($by as $kind => $rows) {
        echo "\n== $kind mismatches: ", count($rows), "\n";
        $groups = [];
        foreach ($rows as [$p, $l, $msg]) {
            $groups[preg_replace('/\[[^\]]*\]/', '[..]', $msg) . ' | ' . implode(';', array_map(fn ($x) => $x, [$msg]))][] = "$p:$l";
        }
        foreach (array_slice($rows, 0, $show) as [$p, $l, $msg]) {
            echo "  $p:$l  $kind  $msg\n";
        }
        if (count($rows) > $show) {
            echo "  ... ", count($rows) - $show, " more\n";
        }
    }
    $fnSites = $agg['sites'];
    $mmCount = array_map('count', $by);
    $mb = $agg['bytes'] / 1048576;
    printf("\nfiles checked: %d  parse failures (php-parser): %d  originals failing php -l (excluded): %d\n", $agg['files'], $agg['parseFail'], $lintOrigBad);
    printf("files changed by translation: %d  lint failures: %d\n", count($agg['changed']), $lintFail);
    echo 'oracle sites:';
    foreach (SITE_KINDS as $k) {
        echo " $k ", $fnSites[$k];
    }
    echo "\nmismatches:";
    foreach ([...array_values(SITE_KINDS), 'line', 'newlines', 'identity', 'nondeterministic', 'crash', 'warning', 'lint'] as $k) {
        echo " $k ", $mmCount[$k] ?? 0;
    }
    echo "\n";
    printf("map: %d functions, %d classes\n", count($fnMap), count($clsMap));
    if ($agg['time'] > 0) {
        printf("translate() alone, one thread: %.0f files/s, %.2f MB/s (%d files, %.1f MB, %.2fs); whole run %.1fs with %d jobs\n",
            $agg['files'] / $agg['time'], $mb / $agg['time'], $agg['files'], $mb, $agg['time'], $tWork, $jobs);
    }
    shell_exec('rm -rf ' . escapeshellarg($tmp));

    return 0;
}

$opts = getopt('', ['self-test', 'w-scan:', 'w-check:', 'map:', 'tmp:', 'out:', 'wid:']);
if (isset($opts['self-test'])) {
    exit(self_test());
}
if (isset($opts['w-scan'])) {
    worker_scan($opts['w-scan'], $opts['out']);
    exit(0);
}
if (isset($opts['w-check'])) {
    worker_check($opts['w-check'], $opts['map'], $opts['tmp'], $opts['out'], (int) $opts['wid']);
    exit(0);
}
exit(main($argv));
