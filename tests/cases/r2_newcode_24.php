<?php
// Dynamic class static properties in write, reference, isset/empty, increment and destructuring contexts.
class H { public $cls = 'Orig\Thing'; public $arr = ['k' => 'Orig\Thing']; public function c() { return $this->cls; } }
$h = new H; $x = 'Orig\Thing';
$x::$p = 'a';
echo Repl\Thing::$p, Orig\Thing::$p, "\n";
$r = &$x::$p; $r .= 'b';
echo Repl\Thing::$p, "\n";
$h->cls::$p .= 'c'; $h->arr['k']::$p .= 'd'; $h->c()::$p .= 'e';
echo Repl\Thing::$p, "\n";
var_dump(isset($x::$p), empty($h->cls::$p), isset($h?->cls::$p));
[$x::$p, $h->cls::$p] = ['l1', 'l2'];
echo Repl\Thing::$p, "\n";
['a' => $h->arr['k']::$p] = ['a' => 'kd'];
echo Repl\Thing::$p, "\n";
$x::$p = 1; $x::$p++; ++$h->cls::$p; $x::$p **= 2;
echo Repl\Thing::$p, "\n";
foreach ([5] as $x::$p) {}
echo Repl\Thing::$p, " $x::X {$x}\n";
$f = fn() => $x::who() . $h->c()::X;
echo $f(), "\n";
