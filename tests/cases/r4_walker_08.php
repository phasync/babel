<?php
class T { const X = 'x'; const C = 'T'; public static $p = 'T'; public static $f = ['k' => 'strrev']; public $c = 'T'; public static $q = ['k' => 'T'];
  static function who() { return 'T'; } static function fn() { return 'strrev'; } static function me() { return new T; } function self() { return $this; } }
function show($v) { echo var_export($v, true), "\n"; }
$f = fn() => 'T'; $a = ['k' => fn() => 'T', 'c' => 'T']; $c = 'T'; $n = 'p'; $o = new T; $m = 'p';
show($f()::who());
show($a['k']()::X);
show(new $c::$$m instanceof T);
show($f()::who()::C::$p::fn()('xy'));
show($f()::fn()('q'));
show(T::who()::who()::who());
show(T::$q['k']::$q['k']::who());
show(T::C::C::C::X);
show($c::$f['k']('ab'));
show($c::{'who'}()::{'fn'}()('ab'));
show(($f)()::who());
show((($f)())::who());
show(((fn() => $f)())()::who());
show([$f][0]()::$p);
show($o->self()->self()->c::who());
show(new T()::who());
show(new (T::who())()::who());
show((new (T::who()))::who());
show(new ($f())() instanceof T);
show(new $a['c'] instanceof $a['c']);
show($o instanceof $o->c);
show($o instanceof $a['k']);
show(new $o->c instanceof $c);
show(new T::$p() instanceof T);
