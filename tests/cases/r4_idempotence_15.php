<?php
namespace app;
use Orig\{Thing as T, Base};
use function strtoupper as up;
// Closures cut out of the TRANSLATED file by their reflection line numbers and eval'd again (as a
// closure serializer reading the served code would do): they are translated once more by evalCode.
function usleep($x) { return 'app\usleep'; }
$cls = 'Orig\Thing';
$o = null;
$fns = [];
$fns[] = function () use ($cls) { return fopen('a') . '|' . up('b') . '|' . usleep(1) . '|' . \sleep(1) . '|' . T::who() . '|' . $cls::who(); };
$fns[] = function () use ($cls, $o) { return var_export($o?->x::who(), true) . '|' . "{$cls::who()}" . '|' . (new $cls)::who(); };
$fns[] = fn() => array_map('strtoupper', [1]) . '|' . is_a(new T, 'Orig\Thing') . '|' . \call_user_func([$cls, 'who']) . '|' . \call_user_func('fopen');
$fns[] = static function () use ($cls) { $f = is_a(...); $g = fopen(...); return var_export($f(new T, $cls), true) . '|' . $g() . '|' . (fn() => strtoupper('x'))(); };
$fns[] = function () use ($cls) { return <<<H
    {$cls::who()} {$GLOBALS['cls']::who()} 
    H . '|' . eval('return fopen("e") . "|" . Orig\Thing::who();') . '|' . new Base()->name(); };
$fns[] = fn() => is_a(...[new T, $cls]) . '|' . \constant('Orig\Thing::X') . '|' . (new \ReflectionClass('Orig\Thing'))->getName() . '|' . \Closure::fromCallable('fopen')();

$lines = file(__FILE__);
$translated = explode("\n", \phasync\Babel\Runtime::babel()->translate(implode('', $lines), __FILE__));
$head = 'namespace app; ' . $translated[2] . ' ' . $translated[3];
foreach ($fns as $n => $f) {
    $r = new \ReflectionFunction($f);
    $code = implode("\n", array_slice($translated, $r->getStartLine() - 1, $r->getEndLine() - $r->getStartLine() + 1));
    $code = preg_replace('/^\$fns\[\] = /', 'return ', $code);
    $g = eval($head . "\n" . $code);
    $g = \Closure::bind($g, null, null);
    $a = $f();
    $b = $g->bindTo(null)->__invoke();
    echo $n, ' ', $a, "\n", $a === $b ? "  same\n" : "  DIFF $b\n";
}
