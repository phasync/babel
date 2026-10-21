<?php
// Parenthesised nullsafe chain with a static access, continued by ->: PHP still short-circuits the whole chain.
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
function tr($x) { echo "tr($x) "; return $x; }
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
class H { public $b = 'Orig\Thing'; public $nul = null; public $self; public $arr;
    public function __construct() { $this->self = $this; $this->arr = ['k' => $this]; }
    public static function id($x) { return $x; }
    public function get() { return $this; }
    public static function obj() { return new H; } }
$a = new H; $z = null;
t(fn() => ($z?->self::id(tr(1)))->b);
t(fn() => ($z?->self::id(tr(2)))->get());
t(fn() => ($z?->self::id(tr(3)))->arr['k']);
