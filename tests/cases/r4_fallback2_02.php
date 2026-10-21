<?php
// closure objects created from one declaration share the call site cache (PHP 8.1-8.5): new objects
// made after the namespaced function exists still call the global function
namespace App;
function mk() { return function () { return strtoupper('m'); }; }
function mkfn() { return fn () => strtoupper('f'); }
$fs = [];
for ($i = 0; $i < 3; $i++) {
    $fs[] = function () { return strtoupper('loop'); };
}
echo mk()(), ' ', mkfn()(), ' ', $fs[0](), "\n";
eval('namespace App; function strtoupper($x) { return "local"; }');
echo mk()(), ' ', mkfn()(), ' ', $fs[1](), ' ', $fs[2](), "\n";
$late = function () { return strtoupper('late'); };
echo $late(), "\n";
