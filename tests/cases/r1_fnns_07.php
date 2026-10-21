<?php
namespace n;
echo fopen(filename: 'x', mode: 'r'), sleep(seconds: 1), "\n";
$args = ['x', 'r'];
echo fopen(...$args), "\n";
echo fopen(fopen(sleep(1))), "\n";
echo strtoupper(strtoupper(usleep(1))), "\n";
$f = sleep(...); echo $f(1), "\n";
$g = \sleep(...); echo $g(1), "\n";
function foo(...$a) { return json_encode($a); }
echo foo(sleep: 1, usleep: usleep(1)), "\n";
