<?php
// Alternative control syntax, goto label named like a mapped function, ternaries around typed closures.
namespace App;
use Orig\Thing;
function id($v) { return $v; }
if (\is_string(strtoupper('a'))): echo strtoupper('b'), "\n"; elseif (false): else: endif;
foreach ([new Thing] as $t): echo \get_class($t), "\n"; endforeach;
for ($i = 0; $i < 1; $i++): echo id(Thing::class), "\n"; endfor;
while (false): endwhile;
switch (1):
    case id(1): echo Thing::X, "\n";
endswitch;
declare(ticks=1): echo \get_class(new \PDO('sqlite::memory:')), "\n"; enddeclare;
goto fopen;
echo "skipped\n";
fopen:
echo fopen('php://memory', 'r'), "\n";
$c = true ? fn(Thing $x): Thing => $x : null;
echo \get_class($c(new Thing)), "\n";
$d = false ?: function (?Thing $x = null) use ($c): ?Thing { return $x; };
echo (string) (new \ReflectionFunction($d))->getReturnType(), "\n";
$m = match (true) { $t instanceof Thing => 'm1', default => 'm2' };
echo $m, "\n";
echo (function (): string { return \get_class(new Thing); })(), "\n";
abstract class A { abstract public function f(Thing $x): Thing; }
echo (string) (new \ReflectionMethod(A::class, 'f'))->getReturnType(), "\n";
