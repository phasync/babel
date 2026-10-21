<?php
// A ?? after a chain reads every static property of the chain as isset() does, also one before a later ?-> link.
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
function tr($x) { echo "tr($x) "; return $x; }
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
class H { public $b = 'Orig\Thing'; public $nul = null; public $self; public $arr;
    public function __construct() { $this->self = $this; $this->arr = ['k' => $this]; }
    public static function id($x) { return $x; }
    public function get() { return $this; }
    public static function obj() { return new H; } }
$a = new H; $z = null;
t(fn() => $a?->b::$nope?->x ?? 'd1');
t(fn() => $a?->b::$p?->c?->d ?? 'd2');
t(fn() => $a?->b::$p?->c ?? 'd3');
t(fn() => $a?->b::$nope ?? 'd4');
