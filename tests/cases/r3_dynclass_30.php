<?php
// Element writes, unset, foreach targets and operators on dynamic static props
class H { public static $arr = ['k' => 1, 'd' => 2]; public static $n = 3; public static $p = null; }
$c = 'H';
unset($c::$arr['d']);
$c::$arr['k'] ??= 9;
$c::$arr['z'] ??= 9;
$x = &$c::$arr['ref'];
$x = 'R';
function setIt(&$v) { $v = 'S'; }
setIt($c::$arr['new']);
foreach ([7, 8] as $c::$p) {}
foreach (['a' => 1] as $c::$arr['fk'] => $c::$n) {}
var_dump(H::$arr, H::$n, H::$p);
var_dump(!$c::$p, -$c::$n, $c::$n ** 2, @$c::$arr['missing'], isset($c::$arr['k']['x']), empty($c::$arr['zz']));
print $c::$n . "\n";
