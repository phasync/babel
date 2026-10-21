<?php
// Closure::fromCallable and bind to the same scope share the cache; binding to another class scope
// gives the closure a fresh cache (as does ->call())
namespace App;
class K {}
function mk() { return function () { return strtoupper('x'); }; }
$a = mk();
echo $a(), "\n";
$same = \Closure::bind($a, null, null);
$fc = \Closure::fromCallable($a);
$other = \Closure::bind($a, null, K::class);
eval('namespace App; function strtoupper($x) { return "local"; }');
echo $same(), ' ', $fc(), ' ', $other(), ' ', $a->call(new K), "\n";
