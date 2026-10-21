<?php
// Nullsafe chain with a static call that ends at ::X / ::class / ::{expr}: translating twice must change nothing.
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
function tr($x) { echo "tr($x) "; return $x; }
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
class H { public $b = 'Orig\Thing'; public $nul = null; public $self; public $arr;
    public function __construct() { $this->self = $this; $this->arr = ['k' => $this]; }
    public static function id($x) { return $x; }
    public function get() { return $this; }
    public static function obj() { return new H; } }
$a = new H; $z = null;
$c = 'X';
t(fn() => $a?->self::id('Orig\Thing')::X);
t(fn() => $a?->self::id('Orig\Thing')::{$c});
t(fn() => $a?->self::id(new Orig\Thing)::class);
t(fn() => $a?->self::id($a)?->b::X);
t(fn() => $z?->self::id(tr(1))::X);
