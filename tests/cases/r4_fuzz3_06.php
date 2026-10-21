<?php
// PHP caches the fallback of a call site in a closure body for the closure's declaration, not per
// closure object: a closure that ran before the namespaced function existed keeps the global one,
// and so do other closure objects of the same declaration (opcache on or off, PHP 8.5)
namespace NA;
function mk($v) { return function () use ($v) { return strtoupper($v); }; }
$a = mk('a'); $b = mk('b');
$g = fn() => fopen('x', 'r');
echo $a(), ' ', $g(), "\n";
eval('namespace NA; function strtoupper($x) { return "NA:$x"; } function fopen(...$a) { return "NA:fopen"; }');
echo $a(), ' ', $b(), ' ', mk('c')(), ' ', $g(), "\n";
$fresh = function () { return strtoupper('d'); };
echo $fresh(), "\n";
