<?php
// Parentheses around a chain do not stop ?? and empty() from reading it as isset() does.
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
function tr($x) { echo "tr($x) "; return $x; }
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
class H { public $b = 'Orig\Thing'; public $nul = null; public $self; public $arr;
    public function __construct() { $this->self = $this; $this->arr = ['k' => $this]; }
    public static function id($x) { return $x; }
    public function get() { return $this; }
    public static function obj() { return new H; } }
$a = new H; $z = null;
t(fn() => ($a?->b::$nope) ?? 'd1');
t(fn() => (($a?->b)::$nope) ?? 'd2');
t(fn() => ($a?->b::$p) ?? 'd3');
t(fn() => empty(($a?->b::$nope)));
t(fn() => empty($a?->b::$nope));
