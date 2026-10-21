<?php
// namespaced constants and functions whose names equal mapped class/function names
namespace Orig;
const Thing = 'K-Thing';
const fopen = 'K-fopen';
const PDO = 'K-PDO';
echo Thing, ' ', \Orig\Thing, ' ', namespace\Thing, ' ', fopen, ' ', PDO, ' ', \PDO::class, "\n";
echo Thing::who(), ' ', \Orig\Thing::X, ' ', namespace\Thing::who(), "\n";
function f($x = Thing, $y = [Thing, Base::class]) { return $x . $y[0] . $y[1]; }
echo f(), "\n";
echo match (true) { default => Thing }, ' ', (Thing), ' ', Thing . fopen, "\n";
$x = new Thing instanceof Thing ? Thing : 'no';
echo $x, "\n";
