<?php
namespace app;
use Orig\Thing as T;
use Orig\{Base as B, Err};
use Orig;
use function Orig\who;
use const Orig\X;
function f(T $a, B|Err|null $b = null, \Orig\Thing&\Countable ...$rest): Orig\Thing { return $a; }
foreach ((new \ReflectionFunction('app\f'))->getParameters() as $p) { echo $p->getName(), '=', $p->getType(), "\n"; }
echo (new \ReflectionFunction('app\f'))->getReturnType(), "\n";
echo T::class, ' ', B::class, ' ', Err::class, ' ', Orig\Thing::class, ' ', \ORIG\thing::class, ' ', namespace\T::class, "\n";
echo \orig\THING::who(), ' ', T::X, ' ', T::$p, "\n";
var_dump(new \Repl\Thing instanceof T, new \Repl\Base instanceof B, new \Orig\Thing instanceof T);
