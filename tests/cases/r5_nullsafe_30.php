<?php
// A parenthesised class expression before the first ?-> ('($x)::$o?->b::m()'): the base of the
// nullsafe link is '($x)::$o', not '$x'.
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
function tr($x) { echo "tr($x) "; return $x; }
class S { public static $o; public static $n; }
class H { public $b = 'Orig\Thing'; public $self; public function __construct() { $this->self = $this; } public static function id($x) { return $x; } }
S::$o = new H; $x = 'S';
t(fn() => ($x)::$o?->b::who());
t(fn() => ($x)::$n?->b::who(tr(1)));
t(fn() => (tr($x))::$o?->self::id(S::$o)?->b::who());
t(fn() => (($x)::$o?->b)::who());
t(fn() => ($x::$o)?->b::who());
