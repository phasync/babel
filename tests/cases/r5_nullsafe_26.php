<?php
// Nullsafe chains with static access in 8.3 static variable initializers (arbitrary expressions, run time).
function tr($x) { echo "tr($x) "; return $x; }
class H { public $b = 'Orig\Thing'; public static function mk() { return new H; } public static function nul() { return null; } }
function f() { static $v = H::mk()?->b::who(); return $v; }
function g() { static $v = H::nul()?->b::who(tr(1)); return $v; }
function h() { static $v = (H::mk()?->b)::$p; return $v; }
function i() { static $v = H::mk()?->b::X; return $v; }
function j() { static $v = H::mk()?->b::$nope ?? 'dflt'; return $v; }
var_dump(f(), f(), g(), h(), i(), j());
