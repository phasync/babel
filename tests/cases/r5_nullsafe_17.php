<?php
// Chains whose base is static::/self::/parent:: calls and properties, $x::$p, $x::$$p, $x::${expr}, $$v and ${expr} bases, ->$p, ->{expr} links.
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
function tr($x) { echo "tr($x) "; return $x; }
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
class P { public static $sp; public static $nil; public $class = 'Orig\Thing'; public $list = 'Orig\Thing';
  public static function mk() { return new static; } public static function nul() { return null; }
  public function __construct() {} }
class C extends P {
  public static function go() {
    t(fn() => static::$sp?->class::who());
    t(fn() => static::$nil?->class::who(tr(1)));
    t(fn() => self::mk()?->list::X);
    t(fn() => parent::mk()?->list::who());
    t(fn() => parent::nul()?->list::who(tr(2)));
    t(fn() => static::mk()?->class::$p);
    t(fn() => static::nul()?->class::$p);
  }
}
P::$sp = new P;
C::go();
$x = 'C'; $p = 'sp'; $q = 'nil';
t(fn() => $x::$sp?->class::who());
t(fn() => $x::$$p?->class::who());
t(fn() => $x::${'s' . 'p'}?->class::who());
t(fn() => $x::${tr('nil')}?->class::who(tr(3)));
t(fn() => $x::mk()?->class::who());
t(fn() => $x::nul()?->class::who(tr(4)));
t(fn() => C::mk()?->class::who());
t(fn() => \C::nul()?->class::who(tr(5)));
t(fn() => $x::{'mk'}()?->class::who());
$o = new P; $n = 'class';
t(fn() => ${'o'}?->class::who());
t(fn() => $$n);
$oo = 'o';
t(fn() => $$oo?->class::who());
t(fn() => ${'o' . ''}?->{'cl' . 'ass'}::who());
t(fn() => $o?->$n::who());
$nn = 'n';
t(fn() => $o?->$$nn::who());
t(fn() => $o?->{$n}::who());
t(fn() => $o?->{tr($n)}::who());
