<?php
// computed callees and classes inside every interpolation form, strings in callee position
$f = fn($x = '') => 'strtoupper';
$g = fn($x = '') => 'toupper';
$c = 'Orig\Thing';
$strtoupper = 'VAR'; $up = 'upper';
echo "${ $f('x') }|{$f()('a')}|", "\n";
echo "{$f("{$g()}")('b')}", "\n";
echo "str{$g()}"('c'), '|', "strto{$up}"('d'), "\n";
echo b"strtoupper"('e'), B"{$f()}"('f'), "\n";
echo "{$c::who()}{$c::$p}", "\n";
echo <<<A
${ $f('x') }|{$f()('a')}|{$c::who()}|{$f("{$g()}")('b')}
A, "\n";
echo <<<"B"
  x{$f()("in {$g()}")}y
  B, "\n";
echo <<<'C'
  {$f()('q')}
  C, "\n";
echo ("strto" . "upper")('g'), ('strto' . 'upper')('h'), "\n";
