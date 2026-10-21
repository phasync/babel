<?php
// the result of a call is called: $f()(), g()(), $o->m()()
function r3cb05() { return 'fopen'; }
$f = 'r3cb05';
echo $f()('x'), "\n";
echo r3cb05()('x'), "\n";
class R3cb05 { function m() { return 'sleep'; } static function s() { return 'usleep'; } }
echo (new R3cb05)->m()(1), "\n";
echo R3cb05::s()(1), "\n";
$fac = fn() => fn() => 'strtoupper';
echo $fac()()('x'), "\n";
