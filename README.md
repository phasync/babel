# phasync/babel

A source rewriting tool for PHP. It takes PHP source and a map of functions and classes, and returns
the same source with every call to a mapped function and every reference to a mapped class sent to
its replacement. It uses only `token_get_all()`, has no dependencies, and knows nothing about phasync
or any other runtime.

```php
use phasync\Babel\Babel;

$babel = new Babel(
    functions: ['fopen' => 'phasync\hooked\fopen', 'sleep' => 'phasync\hooked\sleep'],
    classes:   [PDO::class => phasync\hooked\PDO::class],
);
$out = $babel->translate($source, '/app/src/Foo.php');   // pure: same input, same output
```

The second argument is where the unit comes from: the original absolute path of a file, or PHP's own
origin string for eval'd code (`/app/a.php(3) : eval()'d code`).

Babel only rewrites code. Loading files is the consumer's business: typically a stream wrapper that
calls `translate()` for every file PHP opens for include, so that translated code runs under its
original path (`__FILE__`, `__DIR__`, include_once, stack traces and error messages all stay as they
were). Load phasync/babel's own classes before registering such a wrapper. Libraries that include code
through their own stream protocols (closure serializers such as laravel/serializable-closure) are
translated only when the consumer's wrapper covers those protocols too.

## What is rewritten

Names are resolved the way PHP resolves them (current namespace, `use`, `use function`, group `use`,
aliases, `namespace\x`, fallback of unqualified function calls to the global function) and rewritten
to the fully qualified replacement:

```php
namespace app;
use PDO;
function f(PDO $db): ?PDO { return $db; }   // function f(\phasync\hooked\PDO $db): ?\phasync\hooked\PDO
$f = fopen(...);                              // first-class callable of the replacement
echo \fopen('x');                             // \phasync\hooked\fopen('x')
```

**Functions.** Calls, first-class callables (`fopen(...)`), partial application (`fopen(?, 'r')`),
fully qualified calls, `use function` imports of a mapped function (rewritten in place, aliases kept).
Method calls, `new fopen`, constants, declarations, strings, comments and heredoc text with the same
name are never touched.

**Namespace fallback.** An unqualified `fopen()` inside `namespace app` calls `app\fopen` when that
function exists, else the global one. When the file itself declares `app\fopen` at its top level the
call is left alone. Otherwise the call becomes
`\phasync\Babel\Runtime::ns('<site>', 'app\fopen', 'app\fopen', 'phasync\hooked\fopen')(...)`, which
decides like PHP does when the call site runs first and remembers that choice per call site, as PHP
does (all closures made from one declaration share it). Call sites in eval'd code decide again at
every call (see Limitations).
This handles polyfills and functions declared conditionally or in other files (the php-mock pattern). `new Babel(..., nsFallback: false)` rewrites such calls to the
replacement directly; declarations in the same file are still honoured.

**Classes.** Every reference: `new`, `::`, `::class`, `instanceof`, `extends`, `implements`, trait
`use` (`insteadof`/`as`), `catch`, attributes, and every type declaration: parameter, return and
property types, promoted constructor parameters, typed class constants, nullable, union, intersection
and DNF types, closures and arrow functions, property hook parameters. A parameter typed `PDO` expects
the replacement afterwards. `self`, `parent`, `static` and the scalar type names are never touched.

**Class names and callables that only exist at run time.** These are mapped by
`phasync\Babel\Runtime` (configure it once with `Runtime::configure($babel)`):

* string arguments that PHP treats as class names: `is_a`, `is_subclass_of`, `class_exists`,
  `interface_exists`, `trait_exists`, `enum_exists`, `method_exists`, `property_exists`,
  `get_parent_class`, `class_implements`, `class_parents`, `class_uses`, `get_class_methods`,
  `get_class_vars`, `new ReflectionClass / ReflectionMethod / ReflectionProperty /
  ReflectionClassConstant / ReflectionEnum`, and `'Class::MEMBER'` strings of `constant()`,
  `defined()`, `ReflectionMethod`;
* callables passed to every internal function with a `callable` parameter (`array_map`,
  `call_user_func`, `usort`, `spl_autoload_register`, `Closure::fromCallable`, `pcntl_signal`, ...):
  `'fopen'`, `'Class::method'`, `['Class', 'method']`, and the callables in the array of
  `preg_replace_callback_array()`;
* calls through a computed callee: `$f()`, `$a['k']()`, `($f)()`, `f()()`, `[$o, 'm']()`, `"name"()`,
  `$$f()`, `A::$fns['k']()`, and the right operand of the pipe operator (`$x |> $f`, `$x |> 'fopen'`,
  `$x |> K::CALLBACK`, `$x |> $o->fns['k']`);
* computed class names: `new $x`, `new $this->cls`, `new (expr)`, `new static::$cls`, `$x::m()`,
  `f()::X`, `(expr)::m()`, `A::$p::m()`, `$o instanceof $x`; nullsafe chains keep PHP's short circuit
  (`$a?->b::m()::n()` and `($a?->b::m())->c` are null without evaluating the arguments when `$a` is
  null, and `$a?->b::$p ?? $d` still reads the chain as isset() does);
* argument unpacking into these functions (`is_a(...$args)`, `f(...$a, ...$b)`; by-reference
  parameters stay references, so `usort(...$args)` sorts `$args[0]`, and Traversables are unpacked by
  PHP itself, with its warnings and errors) and their first-class callables and partial applications
  (`is_a(...)`, `is_a($x, ?)`, through small shims in `phasync\Babel\Shim`, strict ones for
  `strict_types` code).

Literals are mapped at translate time; everything else is wrapped in a cheap `Runtime` call, and only
where PHP allows a call (never in constant expressions).

**eval.** `eval($code)` becomes
`eval(\phasync\Babel\Runtime::evalCode('<origin of this eval site>', $code))`: eval'd code is
translated as its own unit. `eval` stays a language construct (the code runs in the caller's
scope), and the translated eval site keeps the exact line PHP reports for it, so `__FILE__` inside
eval'd code, warnings and parse errors read as without the tool (eval'd code that does not parse is
passed on untranslated, so the ParseError is PHP's own).

**Line numbers never change.** Nothing is inserted across a line break. `translate()` with an empty
map returns its input byte for byte; `__halt_compiler()` and the data after it are untouched
(`__COMPILER_HALT_OFFSET__` becomes the original offset, so code reading its own file still finds
its data); `declare(strict_types=1)` stays first.

**Translating twice changes nothing.** Translated code starts with a marker comment on its first line
(`/*phasync-babel:<fingerprint>*/`); code that starts with it is returned unchanged. Without the
marker (a translated function body that a closure serializer evals, for example) a second
translation still changes nothing: the run time wrappers are recognised and never applied twice, and
maps where a replacement is itself mapped, or is itself a function that takes class names or
callables (`call_user_func`, `is_a`, `ReflectionClass`, ...), are rejected by the constructor, as are
names that are not valid function or class names (reserved words such as `static`, `int`, `list`).

Every file and every eval'd string is compiled on its own by PHP: namespace, imports and
`strict_types` never carry over from the includer, so `translate()` handles exactly one unit with a
fresh context.

## Loading translated code through something other than its original path

Two opt-in options, both off by default (with both off, `translate()`'s output is unchanged byte
for byte), for a consumer that serves translated code from somewhere other than the file's own
path -- a cache directory mirroring the original tree, say -- and so cannot rely on PHP resolving
`include`/`require` or `__FILE__`/`__DIR__` to the right place by itself:

```php
$babel = new Babel(includeHandler: 'App\\resolveInclude', fileConstants: true);
```

**`includeHandler`.** A function name. Every `include`/`include_once`/`require`/`require_once`
keeps the construct; its path expression -- with or without parentheses, any expression, since
PHP's own grammar gives these a full `expr` as their operand, "`include $file or die()`" footgun
included -- becomes a call to the handler with two arguments: the original expression, and this
unit's original directory (a string literal).

```php
include $path;              // include $includeHandler($path, '/original/dir');
include($a ? 'x.php' : 'y.php');   // include $includeHandler(($a ? 'x.php' : 'y.php'), '/original/dir');
```

The handler decides what actually gets included (translate and cache it at another path, map it
back to the original, anything); whatever it returns is what `include`/`require` opens, exactly as
if it had been written there directly.

**`fileConstants`.** In file units (never inside eval'd code -- its own, separately translated
unit, where `__FILE__`/`__DIR__` keep reporting PHP's own real position), `__FILE__` and `__DIR__`
become string literals of the unit's original path and directory. A `__FILE__`/`__DIR__` used as a
name instead (`Foo::__FILE__` as a class constant, `function __DIR__() {}`, ...) is a different
token in that position and is never touched.

## Command line

```
vendor/bin/phasync-babel --map=map.php FILE              # translation to stdout
vendor/bin/phasync-babel --map=map.php --out=DIR PATH... # translate trees into DIR
```

`map.php` returns `['functions' => [...], 'classes' => [...]]`.

## Limitations

What is not handled, by design or because it cannot be done from the source alone:

* Class names and function names in arbitrary strings that are only later used as such (a class name
  in a configuration array is mapped when it reaches `new $x`, `$x::m()` or one of the functions
  above, not before), and string callables handed to user functions that call them later.
* Callable-taking functions reached through a variable or a first-class callable
  (`$f = call_user_func(...)`, `$g = 'array_map'`): their callable argument is not mapped (a shim
  would change the scope in which `[$this, 'privateMethod']` is checked).
* `constant()` / `defined()` / `ReflectionMethod::createFromMethodName()` through a variable or a
  first-class callable (`'self::X'` strings need the caller's scope).
* A namespaced function with the name of a class-name or callable-taking function (`app\is_a`,
  `app\call_user_func`) defined in another file: the call goes to it, but its class-name / callable
  argument is still mapped (when the file itself declares it conditionally, the arguments follow the
  run time choice).
* First-class callables in constant expressions (PHP 8.5, `const F = strtoupper(...)`) resolve the
  namespace fallback when the constant is evaluated; they are rewritten to the global replacement.
* `isset($a?->b::$p)` and the like: an expression is not allowed there, so the class is not mapped.
* A nullsafe chain with a static access (`$a?->b::m()`) uses temporary variables
  (`$__phasync_babel_*`, null after use) in the enclosing scope, which `get_defined_vars()` shows.
* Heredoc interpolation of computed classes and callees (`"{$cls::m()}"` inside a heredoc) goes
  through closures that `Runtime::configure()` stores in `$GLOBALS` (`__phasync_babel_*`); code that
  unsets globals or backs them up and restores them (PHPUnit's backupGlobals) removes them. In double
  quoted strings the interpolation is rewritten to concatenation and needs no globals.
* The namespace fallback choice of a call site is kept where PHP would decide again: a file included
  twice (PHP compiles it again), the copy of a trait method in each class that uses the trait, and a
  closure bound to another class scope. Call sites in eval'd code instead decide at every call, where
  PHP keeps the first choice per compilation (a closure made by eval'd code and called before and
  after the namespaced function appears switches to it): ids unique per eval would leak memory, since
  PHP keeps every literal of eval'd code until the request ends.
* First-class callables and string callables of the class-name functions (`is_a(...)`,
  `'class_exists'`) go through shims: their strictness for scalar arguments is that of the file that
  made the callable (string callables: weak), not of the caller, and errors raised by the internal
  function name `src/shims.php` as their location. `get_parent_class`, `get_class_methods` and
  `get_class_vars` have no shim, since they read the caller's class.
* Unpacking into a function with by-reference parameters passes the variable by reference
  (`usort(...$args)`): an undefined `$args` is created as null without PHP's warning. PHP's quirk of
  passing a positional argument of a later unpacking after named ones (`f(...['b' => 1], ...[2])`) is
  not reproduced (an Error is raised instead). Unpacking a non-iterable raises PHP's TypeError.
* Translating code nested thousands of levels deep takes quadratic time, and the extra wrapper calls
  around arguments can push code that is close to PHP's parser depth limit over it.
* The right operand of `|>` is mapped only when it is a complete operand by itself (`$x |> $f`,
  `$x |> $o->fns['k'] |> ...`), not when an operator that binds tighter follows it (`$x |> $a . $b`).
* Static methods with a callable parameter other than `Closure::fromCallable` (`IntlChar::enumCharNames`,
  `Phar::webPhar`): their callable argument is not mapped.
* Which internal functions take callables comes from Reflection of the PHP that translates; code
  translated ahead of time (`--out`) by an older PHP does not map callables of newer functions.
* An exception thrown by `__toString()` of an object passed to `eval()` has an extra
  `Runtime::evalCode` frame in its trace.
* `constant('__COMPILER_HALT_OFFSET__')` returns the offset of the translated code.

## Tests

```
composer install
php tests/run.php [filter]   # behavioural cases: translate, run as real PHP, compare output
php tests/corpus.php DIR...  # corpus run: lint, identity, line counts, independent php-parser oracle
```

`tests/cases/*.php` + `.expect` run through `tests/harness.php` with the map in `tests/map.php` and
the replacements in `tests/hooks.php`; included files are translated by a test-only stream wrapper
(`tests/IncludeWrapper.php`). Every case also checks that the output lints, keeps every line, is
unchanged by a second translation, and that an empty map changes nothing. `tests/known-limits/` holds
cases for the limitations above.
