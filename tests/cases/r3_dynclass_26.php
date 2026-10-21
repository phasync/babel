<?php
declare(strict_types=1);
// Calls through variables: references, func_get_args, strict types, static closures, generators
$sort = 'sort';
$arr = [3, 1, 2];
$sort($arr);
echo implode(',', $arr), "\n";
$pm = 'preg_match';
$pm('/(b)/', 'abc', $m);
echo $m[1], "\n";
$refRet = function &() { static $v = 1; return $v; };
$r = &$refRet();
$r = 5;
echo $refRet(), "\n";
$args = function () { return implode(',', func_get_args()); };
echo $args(1, 2, 3), "\n";
$typed = function (string $s) { return $s; };
try { $typed(1); } catch (TypeError $e) { echo preg_replace(['/, called in .*/', '/^\{closure[^}]*\}/'], ['', '{closure}'], $e->getMessage()), "\n"; }
$gen = function () { yield 1; yield 2; };
echo implode(',', iterator_to_array($gen())), "\n";
$byRef = function (&$x) { $x = 'set'; };
$byRef($undefined);
echo $undefined, "\n";
$cls = 'Orig\Thing';
$st = [$cls, 'who'];
echo $st(), "\n";
