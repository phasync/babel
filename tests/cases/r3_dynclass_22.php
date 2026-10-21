<?php
// Calls through variables that are followed by more chain before '::'
$o = new stdClass();
$o->c = 'Orig\Thing';
$f = fn () => $o;
$g = fn () => ['Orig\Thing'];
$h = ['k' => fn () => $o];
echo $f()->c::who(), "\n";
echo $g()[0]::who(), "\n";
echo $h['k']()->c::X, "\n";
echo "{$f()->c::who()}\n";
