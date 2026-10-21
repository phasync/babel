<?php
// Static links after the first ?->: ::$p[k](), ::$$p, ::$f(), ::$$f(), ::${expr}, ::{expr}(), mixed -> and ?-> after ::.
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
function tr($x) { echo "tr($x) "; return $x; }
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
class S { public static $p = ['k' => 'Orig\Thing::who']; public static $q = 'Orig\Thing'; public static $o; }
class H { public $b = 'S'; public $self;
  public function __construct() { $this->self = $this; }
  public static function who() { return 'H::who'; }
  public static function id($x) { return $x; } }
S::$o = new H;
$a = new H; $z = null; $f = 'who'; $ff = 'f'; $pp = 'p';
t(fn() => $a?->b::$p['k']());
t(fn() => $z?->b::$p['k']());
t(fn() => $a?->b::$q::who());
t(fn() => $a?->b::$$pp['k']());
t(fn() => $a?->self::$f());
t(fn() => $a?->self::$$ff());
t(fn() => $z?->self::$$ff(tr(1)));
t(fn() => $a?->b::$o?->b::$q::who());
t(fn() => $a?->b::$o::$f());
t(fn() => $a?->b::$o->b::$q::who());
t(fn() => $a?->b::$o?->self::id('Orig\Thing')::who());
t(fn() => $a?->b::${'q'}::who());
t(fn() => $z?->b::${tr('q')}::who());
t(fn() => $a?->self::{'id'}('Orig\Thing')::who());
