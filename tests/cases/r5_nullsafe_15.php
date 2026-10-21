<?php
// Chains ending at ::{expr} (8.3), new (chain), first-class callables from chains.
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
function tr($x) { echo "tr($x) "; return $x; }
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
class H { public $b = 'Orig\Thing'; public $self; public $nul = null;
  public function __construct() { $this->self = $this; }
  public static function id($x) { return $x; }
  public function inst() { return 'Orig\Thing'; } }
$a = new H; $z = null; $c = 'X';
t(fn() => $a?->b::{'X'});
t(fn() => $z?->b::{tr('X')});
t(fn() => $a?->b::{$c});
t(fn() => $a?->b::{'X'} . $a?->b::X);
t(fn() => $a?->self?->b::{'X'});
t(fn() => $a?->self?->nul?->b::{tr('X')});
t(fn() => $a?->inst() instanceof ($a?->self::id('Orig\Thing')));
t(fn() => get_class(new ($a?->self::id('Orig\Thing'))));
t(fn() => new ($z?->self::id('Orig\Thing')));
t(fn() => $a?->self::id(...)('Orig\Thing')::who());
t(fn() => $z?->self::id(...));
t(fn() => $a?->self::id(...) instanceof Closure);
