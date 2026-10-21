<?php
// the same closure object called before and after the namespaced function is defined keeps its first choice
namespace App;
$c = function () { return strtoupper('c'); };
$a = fn () => strtoupper('a');
$s = static function () { return strtoupper('s'); };
echo $c(), ' ', $a(), ' ', $s(), "\n";
eval('namespace App; function strtoupper($x) { return "local"; }');
echo $c(), ' ', $a(), ' ', $s(), "\n";
echo strtoupper('fresh'), "\n";
