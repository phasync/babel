<?php
$f = __DIR__ . '/fixtures/r1_inc_a.php';
$a = include $f;
echo json_encode($a), "\n";
$b = (include $f)[0];
echo $b, "\n";
echo (include $f)[3] + 1, "\n";
echo json_encode(include($f)), "\n";
$c = include($f) ?: 'none';
echo $c[1], "\n";
$d = [include $f, 'k' => include $f];
echo count($d), $d['k'][0], "\n";
function g($x) { return $x[0] . '/' . $x[1]; }
echo g(include $f), "\n";
echo g(require $f), "\n";
var_dump(require_once $f);
var_dump(include_once $f);
if ((include $f)[2] === 'fixtures') echo "cond\n";
echo true ? (include $f)[0] : 'no', "\n";
$t = false ? 1 : include $f;
echo $t[0], "\n";
var_dump(@include 'nonexistent_r1.php');
