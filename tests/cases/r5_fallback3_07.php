<?php
// generators: each call site in the generator body decides when it first runs, for all generator objects
namespace App;
function g() { yield strtoupper('1'); yield strtoupper('2'); for ($i = 0; $i < 2; $i++) yield strtoupper('3'); }
$x = g(); echo $x->current(), "\n";
$y = g();
eval('namespace App; function strtoupper($a) { return "L$a"; }');
$x->next(); echo $x->current(), "\n"; $x->next(); echo $x->current(), "\n"; $x->next(); echo $x->current(), "\n";
foreach ($y as $v) echo $v, ' ';
echo "\n";
