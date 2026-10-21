<?php
// nullsafe chains and destructuring with keys computed by mapped calls
namespace s15;
use Orig\Thing;
class N { public ?N $n = null; public $cls = 'Orig\Thing'; public function f(...$a) { return $this; } public function v($x) { return $x; } }
$o = new N; $o->n = new N;
echo $o?->n?->f(fopen('x'))?->v(Thing::who()), "\n";
echo $o->n?->n?->v(fopen('x')) ?? 'null', "\n";
echo $o?->n->cls::who(), "\n";
[strtoupper('a') => $a, 'k' . fopen('x') => $b] = ['HOOK:strtoupper' => 1, 'kHOOK:fopen' => 2];
echo $a, $b, "\n";
list(sleep(1) => $c, Thing::X => list(usleep(1) => $d)) = ['HOOK:sleep' => 3, 'repl' => ['HOOK:usleep' => 4]];
echo $c, $d, "\n";
foreach ([['HOOK:fopen' => 5]] as [fopen('q') => $e]) echo $e, "\n";
