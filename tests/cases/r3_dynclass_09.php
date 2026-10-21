<?php
// Writes through a dynamic class: =, []=, ++, ??=, by-ref, foreach by-ref, list targets, isset/empty
class Holder { public static $p = 'x'; public static $arr = []; public static $n = 0; public static $q = null; }
$c = 'Holder';
$c::$p = 'y';
$c::$arr[] = 1;
$c::$arr['k'] = 2;
++$c::$n;
$c::$n++;
$c::$n += 10;
$c::$q ??= 'set';
$r = &$c::$p;
$r = 'byref';
foreach ($c::$arr as &$v) { $v *= 10; }
unset($v);
[$c::$p, $c::$n] = ['L1', 'L2'];
['a' => $c::$q] = ['a' => 'L3'];
var_dump(Holder::$p, Holder::$arr, Holder::$n, Holder::$q, isset($c::$p), empty($c::$arr), isset($c::$nope));
$o = (object) ['c' => 'Orig\Thing'];
$o->c::$p = 'w1';
echo \Repl\Thing::$p, "\n";
function ref(&$x) { $x .= '!'; }
ref($o->c::$p);
echo \Repl\Thing::$p, "\n";
