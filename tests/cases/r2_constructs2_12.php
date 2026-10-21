<?php
$d = __DIR__ . '/fixtures/';
$t = true; $f = false;
var_dump(@include $d . 'nope.php');
$r = @include $d . 'r2_c2_p.php' and $t;
var_dump($r);
$r = @include $d . 'r2_c2_p.php' or $t;
var_dump($r);
try { $r = @include $d . "r2_c2_p.php" xor $t; } catch (ValueError $e) { $r = $e->getMessage(); }
var_dump($r);
$r = (include $d . 'r2_c2_p.php') and $f;
var_dump($r);
var_dump(@include_once($d . "r2_c2_q.php") && $t);
var_dump(@include_once($d . "r2_c2_q.php") && $t);
$mk = fn($x) => $d . $x;
var_dump(include($mk)('r2_c2_p.php'));
var_dump(include ($mk)('r2_c2_q.php') . '');
var_dump(include_once $d . 'r2_c2_q.php');
var_dump(include_once $d . 'r2_c2_q.php');
