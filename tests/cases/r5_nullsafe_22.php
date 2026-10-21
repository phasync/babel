<?php
// Nested chains inside ->{...}, ::{...}(), dims, array literal bases, closures and arrow functions passed through chains.
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
function tr($x) { echo "tr($x) "; return $x; }
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
class H { public $b = 'Orig\Thing'; public $self; public $nul; public $arr; public $m = 'id'; public $k = 'Orig\Thing';
  public function __construct() { $this->self = $this; $this->arr = ['Orig\Thing' => $this, 'x' => 'Orig\Thing']; }
  public static function id($x) { return $x; } }
$a = new H; $z = null;
t(fn() => $a?->self::{$a?->m}('Orig\Thing')::who());
t(fn() => $a?->self::{$a?->self::id('id')}('Orig\Thing')::who());
t(fn() => $a?->arr[$a?->self::id('Orig\Thing')]?->b::who());
t(fn() => $a?->arr[$z?->self::id(tr(1))] ?? 'none');
t(fn() => $a->arr[$a?->self::id('Orig\Thing')]?->b::who());
t(fn() => [$a][0]?->self::id($a)?->arr['x']::who());
t(fn() => [$z][0]?->self::id($a)?->arr['x']::who(tr(2)));
t(fn() => $a?->self::id([1, 2])[1]);
t(fn() => $a?->self::id(['Orig\Thing'])[0]::who());
t(fn() => $z?->self::id(['Orig\Thing'])[tr(3)]::who());
t(fn() => $a?->self::id(fn($x) => $x?->b::who())($a));
t(fn() => $a?->self::id(fn($x) => $x?->b::who())(null));
t(fn() => $a?->self::id(function ($x) { return $x?->self::id($x)?->b::who(); })($a));
