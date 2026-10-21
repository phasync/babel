<?php
// static variable initialisers (any expression since PHP 8.3) run once per function: their calls decide
// when first run; a second function with the same initialisers decides on its own
namespace App;
function s1() { static $x = strtoupper('s'); static $f = strtoupper(...); return $x . $f('t'); }
function s2() { static $x = strtoupper('s'); static $f = strtoupper(...); return $x . $f('t'); }
echo s1(), "\n";
eval('namespace App; function strtoupper(...$a) { return "L" . implode($a); }');
echo s1(), ' ', s2(), "\n";
$c = function () { static $n = [strtoupper('c')]; return $n[0]; };
echo $c(), "\n";
