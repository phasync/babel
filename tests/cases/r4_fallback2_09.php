<?php
namespace App;
// generators, recursion that defines the function mid-way and first-class callables created at one site keep the first choice
function gen() { for ($i = 0; $i < 3; $i++) { yield strtoupper("g$i"); } }
function rec($n) { if ($n === 1) eval('namespace App; function strtoupper($s) { return "<$s>"; }'); return $n >= 3 ? '' : strtoupper("r$n") . rec($n + 1); }
function fcc() { return strtoupper(...); }
$g = gen();
echo $g->current(), "\n";
$f1 = fcc();
echo rec(0), "\n";
$g->next(); echo $g->current(), "\n";
foreach (gen() as $v) echo $v; echo "\n";
$f2 = fcc();
echo $f1('a'), $f2('b'), (new \ReflectionFunction($f2))->getName(), "\n";
echo strtoupper('z'), "\n";
