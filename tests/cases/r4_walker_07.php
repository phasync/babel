<?php
class T { const X = 'x'; public static $p = 'p'; public static $f = ['k' => 'strrev']; public $c = 'T'; public $arr = ['T'];
  static function who() { return 'T'; } static function me() { return new T; } function self() { return $this; } static function nul() { return null; } }
$n = null; $o = new T;
function show($v) { echo var_export($v, true), "\n"; }
function side($v) { echo "side\n"; return $v; }
show($o?->c::who());
show($n?->c::who(side(1)));
show($n?->c::who()->c);
show($o?->c::me()->c);
show($o?->self()?->c::who());
show($n?->self()?->c::who(side(2)));
show($o?->self()?->arr[0]::who());
show(T::nul()?->c::who());
show((T::nul())?->c::who());
show(($n?->c)::$p ?? 'dflt');
show($o?->c::$p);
show($n?->c::$p);
show($n?->c::$f['k']);
show($o?->c::$f['k']('ab'));
show([$n?->c::who(), $o?->c::who()]);
show($n?->c::who() ?? $o?->c::who());
show(isset($o?->c::$p));
show(isset($n?->c::$p));
show($o?->self()::who());
$x = $n?->c::who() ?: 'e'; show($x);
show(fn() => $n?->c::who());
show((fn() => $n?->c::who())());
show((fn() => $o?->c::who())());
show("{$o?->c::who()}-{$n?->c::who()}");
show(match(true) { default => $n?->c::who() });
show($o?->c::who() . $n?->c::who() . 'z');
show(!$n?->c::who());
