<?php
// Dynamic-class static properties passed by reference, iterated by reference, and used with ??=, compound ops.
$x = 'Orig\Thing'; $h = new class { public $c = 'Orig\Thing'; };
Repl\Thing::$p = [3, 1, 2];
sort($x::$p);
foreach ($h->c::$p as &$v) { $v *= 10; }
unset($v);
array_push($x::$p, 40);
$x::$p[] = 50;
$h->c::$p[0] ??= 'n';
echo implode(',', Repl\Thing::$p), ' ', count($x::$p), ' ', $x::$p[1] <=> $h->c::$p[2], "\n";
$ref = &$h->c::$p[0];
$ref = 'r';
echo Repl\Thing::$p[0], ' ', isset($h->c::$p[9]) ? 'y' : 'n', ' ', $x::$p[4] ?? '-', "\n";
