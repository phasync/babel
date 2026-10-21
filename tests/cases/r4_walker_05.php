<?php
namespace N;
class K { const C = 'Orig\Thing'; public static $p = 'Orig\Thing'; public static $q = ['k' => 'Orig\Thing']; public static $f = ['k' => 'strtoupper'];
  static function m() { return 'Orig\Thing'; } }
$c = 'Orig\Thing'; $n = 'c'; $nn = 'n';
$o = new class { public $c = 'Orig\Thing'; public $a = ['k' => 'Orig\Thing']; function m() { return 'Orig\Thing'; } function self() { return $this; } };
$f = fn() => 'Orig\Thing';
echo 1, $c::who(), $c::X, $c::$p, "\n";
echo 2, $$n::who(), $$$nn::X, ${'c'}::$p, "\n";
echo 3, $o->c::who(), $o->a['k']::X, $o->m()::who(), $o->self()->c::who(), "\n";
echo 4, $f()::who(), ($c)::who(), (fn() => 'Orig\Thing')()::who(), "\n";
echo 5, K::C::who(), K::$p::who(), K::$q['k']::who(), K::m()::who(), "\n";
echo 6, 'Orig\Thing'::who(), "Orig\\Thing"::who(), "Orig\Thing"::X, "\n";
echo 7, [$c][0]::who(), ['k' => $c]['k']::X, array($c)[0]::$p, "\n";
echo 8, $o?->c::who(), $o?->self()?->c::X, "\n";
echo 9, $o->{'c'}::who(), $o::class === get_class($o) ? 'y' : 'n', "\n";
echo 10, K::$f['k']('a'), (K::$f)['k']('a'), "\n";
echo 11, (K::C)::who(), (K::$p)::X, "\n";
echo 12, $c::{'who'}(), $o->c::{'X'}, "\n";
echo 13, \N\K::C::who(), namespace\K::C::X, "\n";
$x = null;
echo 14, var_export($x?->c::who(), true), var_export($x?->a['k']::who(), true), "\n";
echo 15, "{$c::who()}", "{$o->c::who()}x", "\n";
echo 16, "a{$f()::who()}b" . 'x', "\n";
echo 17, strlen("{$c::who()}") ** 2, "\n";
$y = "{$c::who()}" ?: 1; echo 18, $y, "\n";
echo 19, "{$c::who()}"[0], "\n";
