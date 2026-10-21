<?php
// a parenthesised callee is not the base of a nullsafe chain: in `($f)()?->b::who()` the chain
// starts with the call, also when the callee is a first-class callable of a fallback call; in
// `($c)::obj()?->b::who()` it starts with the static call
namespace App;
class B { public $b = 'Orig\Thing'; }
class S { static function obj() { return new B; } }
function mk($x = 1) { return $x ? new B : null; }
$f = fn () => new B;
$n = fn () => null;
$o = new \stdClass;
$o->f = $f;
var_dump(($f)()?->b::who());
var_dump(($n)()?->b::who());
var_dump(($o->f)()?->b::$p);
var_dump((mk(...))()?->b::who(), (mk(...))(0)?->b::who());
var_dump((function () { return new B; })()?->b::who(), (static fn () => null)()?->b::who());
var_dump((\strrev(...))('gniht\giro')::who());
$c = 'App\S';
var_dump(($c)::obj()?->b::who(), ($o->f)()?->b::who());
