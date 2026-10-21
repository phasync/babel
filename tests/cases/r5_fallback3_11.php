<?php
// several evals on one line share the origin string but are compilations of their own; so is each
// iteration of an eval in a loop and each call of a function that evals
namespace App;
$c = 'namespace App; return strtoupper("e");';
echo eval($c), ' ', eval('namespace App; function strtoupper($x) { return "local($x)"; }'), '|', eval($c), "\n";
function ev($code) { return eval($code); }
$d = 'namespace App; return fopen("f");';
echo ev($d), ' ';
eval('namespace App; function fopen($x) { return "lf($x)"; }');
echo ev($d), "\n";
