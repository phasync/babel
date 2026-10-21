<?php
// parenthesised nullsafe chain with a static access, followed by a static property: the
// translation must stay valid PHP, and the short circuit extends through the parentheses
namespace NA;
class H { public $a = 'Orig\Thing'; public function c() { return 'Orig\Thing'; } }
function l($x) { echo "L:$x "; return $x; }
$h = new H; $n = null;
var_dump(($h?->a::who())::$p);
var_dump(($n?->a::who(l(1)))::$p);
var_dump(!($h?->c()::who())::$p);
