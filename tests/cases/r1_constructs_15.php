<?php
set_error_handler(function ($n, $m, $f, $l) { echo "W: $m @$l\n"; return true; });
$f = __DIR__ . '/fixtures/r1_inc_vars.php';
$r = include $f or die("never\n");
var_dump($r);
$r = (include $f) and print("and-ran\n");
var_dump($r);
include $f and print("and2\n");
if (!(include $f) or false) echo "no\n"; else echo "yes\n";
$ok = include $f || false;
var_dump($ok);
$arr = ['a' => 1];
$m = include $f or $m = 'x';
var_dump($m);
echo "end\n";
