<?php
// Chain shapes: :: before the first ?->, $$ and ${} bases, peeled and unpeeled parentheses, computed calls ending the chain, dims, ->{expr}.
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
function tr($x) { echo "tr($x) "; return $x; }
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
class H { public $b = 'Orig\Thing'; public $n = null; public $self; public static $sp; public static $nil = null; public $arr;
  public function __construct() { $this->self = $this; $this->arr = ['k' => $this, 'c' => 'Orig\Thing']; }
  public function m() { return 'Orig\Thing'; }
  public function get() { return $this; }
  public static function sm() { return 'Orig\Thing'; }
  public static function cb() { return 'Orig\Thing::who'; }
  public static function obj() { return new H; }
}
H::$sp = new H;
$a = new H; $z = null; $cls = 'H'; $p = 'sp'; $q = 'nil'; $f = 'sm';
t(fn() => $cls::$sp?->b::who());
t(fn() => $cls::$nil?->b::who(tr(1)));
t(fn() => $cls::$$p?->b::who());
t(fn() => $cls::$$q?->b::who(tr(2)));
t(fn() => (($a?->self)->b)::who());
t(fn() => (($z?->self)->b)::who(tr(3)));
t(fn() => (($a?->self)?->b)::who());
t(fn() => ((($z?->self))?->b)::who(tr(4)));
t(fn() => (new H)?->b::who());
t(fn() => ($z ?: $a?->self)::sm()::who());
t(fn() => ($a ?: $z?->self)::sm()::who());
t(fn() => ($a?->self ?: $z)::sm()::who());
t(fn() => $a?->self::$f()::who());
t(fn() => $z?->self::$f(tr(5)));
t(fn() => $a?->self::cb()());
t(fn() => $z?->self::cb()());
t(fn() => $a?->b::X);
t(fn() => $z?->b::X);
t(fn() => $a?->b::class);
t(fn() => $z?->b::class);
t(fn() => $a?->arr['k']::sm()::who());
t(fn() => $z?->arr['k']::sm(tr(6)));
t(fn() => $a?->arr['k']?->arr['c']::who());
t(fn() => $a?->get()::obj()?->get()::sm()::who());
t(fn() => $a?->get()::obj()?->n::sm(tr(7))::who());
t(fn() => $a?->{'b'}::who());
t(fn() => $a?->{tr('b')}::who());
t(fn() => $z?->{tr('b')}::who());
t(fn() => $a::$sp?->self::$sp?->b::$p);
