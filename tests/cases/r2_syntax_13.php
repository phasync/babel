<?php
// PHP 8.5 clone with, #[\NoDiscard], (void) casts around mapped calls
namespace s13;
use Orig\Thing;
final class V { public function __construct(public mixed $a = null, public ?Thing $t = null) {} }
$v = new V(1);
$w = clone($v, ['a' => fopen('x'), 't' => new Thing]);
echo $w->a, ' ', $w->t::who(), "\n";
$z = clone($w, [...['a' => strtoupper('q')]]);
echo $z->a, "\n";
#[\NoDiscard("use it")]
function pick(Thing $t): Thing { return $t; }
(void) pick(new Thing);
(void) fopen('x');
(void)strtoupper('y');
echo pick(new Thing)::who(), "\n";
$c = clone(...);
echo $c(new Thing)::who(), "\n";
