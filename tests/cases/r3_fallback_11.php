<?php
// first-class callable, named arguments and spread through the check
namespace App;
function stream_select(&$r, &$w, &$e, $s, $us = 0) { $r = ['local']; return 'local-select'; }
$f = fopen(...);
echo $f('x'), ' ', (new \ReflectionFunction($f))->getName(), "\n";
echo strtoupper(string: 'n'), ' ', fopen(...['a', 'r']), ' ', usleep(microseconds: 1), "\n";
$r = []; $w = null; $e = null;
echo stream_select($r, $w, $e, 0), ' ', json_encode($r), "\n";
