<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
class O { function m($c) { return $c; } }
$o = new O;
$v = 'L(__FILE__);';
eval($o->m(
$v
)

);
