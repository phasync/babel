<?php
$f = fn() => 'v'; $v = 'VV'; $s = 'strtoupper'; $g = fn() => 'strtoupper';
$o = new class { public $v = 'pv'; function m($x) { return "m($x)"; } };
$a = ['v' => 'av'];
echo "1 ${$f()}|{${$f()}}|{$a[$f()]}|{$o->{$f()}}|{$o->m($f())}|{$o->m($s('x'))}", "\n";
echo <<<X
2 ${$f()}|{${$f()}}|{$a[$f()]}|{$o->{$f()}}|{$o->m($s('x'))}|{$g()('y')}
X;
echo "\n", "3 {$g()('y')}{$g()('z')}", "\n";
