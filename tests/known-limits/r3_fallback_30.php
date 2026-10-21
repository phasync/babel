<?php
// shim redirects (argument unpacking, first-class callable) must respect a namespaced function of the same name
namespace App;
eval('namespace App; function is_a($o, $c, $s = false) { return "App:is_a($c)"; } function class_exists($c, $a = true) { return "App:class_exists($c)"; }');
$args = ['Orig\Thing', 'Orig\Thing', true];
echo is_a(...$args), "\n";
$f = is_a(...);
echo $f('Orig\Thing', 'Orig\Thing', true), "\n";
echo class_exists(...['Orig\Thing']), "\n";
echo is_a('Orig\Thing', 'Orig\Thing', true), "\n";
