<?php
// the pipe operator (PHP 8.5) with first-class callables of fallback calls and closures
namespace App;
function p($v) { return $v |> strtoupper(...) |> (fn ($x) => $x . '+' . fopen('y')); }
echo p('a'), "\n";
echo 'Orig\Thing' |> class_exists(...) ? 'ce' : 'no', "\n";
eval('namespace App; function strtoupper($x) { return "local($x)"; }');
echo p('b'), ' ', 'c' |> strtoupper(...), "\n";
