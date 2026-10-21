<?php
// by-reference arguments and func_get_args through calls wrapped in Runtime::fn
$f = 'preg_match';
$f('/(b)/', 'abc', $m);
echo implode(',', $m), "\n";
$s = 'sort';
$arr = [3, 1, 2];
$s($arr);
echo implode(',', $arr), "\n";
$h = ['k' => function (&$x) { $x++; }, 'n' => ['j' => static function (array &$a) { $a[] = 'pushed'; }]];
$v = 1;
$h['k']($v);
echo $v, "\n";
$h['n']['j']($arr);
echo implode(',', $arr), "\n";
function r3cb17() { return func_num_args() . ':' . implode(',', func_get_args()); }
$g = 'r3cb17';
echo $g(1, 2, 3), "\n";
$fc = $g(...);
echo $fc(4, 5), "\n";
function &r3cb17ref(array &$a) { return $a[0]; }
$r = 'r3cb17ref';
$ref = &$r($arr);
$ref = 'changed';
echo $arr[0], "\n";
$w = 'array_walk';
$w($arr, function (&$x, $k) { $x = "$k"; });
echo implode(',', $arr), "\n";
$named = 'str_pad';
echo $named('a', pad_type: STR_PAD_LEFT, length: 3, pad_string: '-'), "\n";
