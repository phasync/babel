<?php
// Anonymous classes and new-expressions as chain bases (8.4 new without parentheses).
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
function tr($x) { echo "tr($x) "; return $x; }
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
class H { public $b = 'Orig\Thing'; public $nul = null; public $self; public function __construct() { $this->self = $this; } public static function id($x) { return $x; } }
t(fn() => (new class { public $b = 'Orig\Thing'; })?->b::who());
t(fn() => new class { public $b = 'Orig\Thing'; }?->b::who());
t(fn() => new class(tr(1)) { public $b = 'Orig\Thing'; public function __construct($x) {} }?->b::who());
t(fn() => new H()?->b::who());
t(fn() => new H()?->nul?->b::who(tr(2)));
t(fn() => new (H::class)()?->b::who());
t(fn() => new (tr('H'))()?->self::id(new class { public $b = 'Orig\Thing'; })?->b::who());
