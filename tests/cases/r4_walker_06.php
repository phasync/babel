<?php
$c = 'Orig\Thing'; $s = 'strtoupper';
$o = new class { public $c = 'Orig\Thing'; public $s = 'strtoupper'; function m($x = null) { return $x ?? 'Orig\Thing'; } };
$f = fn() => 'Orig\Thing';
$n = null;
echo <<<X
1 {$c::who()} {$s('a')} {$f()::who()} {$o->m()::who()}
2 {$o?->c::who()} {$n?->c::who()}| {$o->m("{$c::who()}")}
3 {$o->m($s('q'))} {$o->m(<<<Y
  {$s('in')}
  Y)}
X;
echo "\n";
echo `printf '%s' "{$c::who()}-{$s('b')}"`, "\n";
echo "4 {$o->m("{$c::who()}")} {$o->m("{$o->m("{$s('z')}")}")}", "\n";
echo "5 ${s}", "\n";
echo "6 {$o->{'s'}}", "\n";
echo "7 $o->c $s[0] {$s}", "\n";
$arr = ['k' => 'strtoupper'];
echo "8 {$arr['k']('a')} $arr[k]", "\n";
echo '9 ', "{$s('a')}" . "{$s('b')}", "\n";
echo '10 ', "x" . "{$f()::who()}" . "y", "\n";
echo '11 ', "{$s('a')}" == 'HOOK:strtoupper' ? 'eq' : 'ne', "\n";
echo '12 ', "{$s('a')}" <=> "{$s('a')}", "\n";
echo '13 ', "{$s('a')}" instanceof stdClass ? 1 : 0, "\n";
echo '14 ', "{$s('a')}"[0] . "{$s('a')}"[-1], "\n";

