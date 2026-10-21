<?php
// Pipe operator: a nullsafe chain with a static access as the right operand is a callable to map.
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
function tr($x) { echo "tr($x) "; return $x; }
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
class H { public $b = 'Orig\Thing'; public $nul = null; public $self; public $arr;
    public function __construct() { $this->self = $this; $this->arr = ['k' => $this]; }
    public static function id($x) { return $x; }
    public function get() { return $this; }
    public static function obj() { return new H; } }
$a = new H; $z = null;
class C { public static $sf = 'Orig\Thing::who'; public static function c() { return 'Orig\Thing::who'; } }
$a->b = 'C'; $x = 'C';
t(fn() => 1 |> $a?->b::$sf);
t(fn() => 1 |> $a?->b::c());
t(fn() => 1 |> $z?->b::c(tr(1)));
t(fn() => 1 |> $x::c());
t(fn() => 1 |> C::c());
t(fn() => 1 |> $a?->b::$sf |> $x::$sf);
