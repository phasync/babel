<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
class O { function g() { return 'L(__FILE__);'; } }
$o = new O; $m = 'g';
eval($o
->
$m
(
)
);
