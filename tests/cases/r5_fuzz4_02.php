<?php
// a parenthesised nullsafe chain with a static access, then '->', '[...]' or a method call:
// PHP's short circuit extends through the parentheses (no warning, no Error, arguments not evaluated)
namespace NA;
class H { public $a = 'Orig\Thing'; }
function l($x) { echo "L:$x "; return $x; }
$n = null; $h = new H;
var_dump(($n?->a::who())->c);
var_dump(($n?->a::who())[l(1)]);
try { var_dump(($n?->a::who())->m(l(2))); } catch (\Error $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
var_dump(($h?->a::who())[0]);
