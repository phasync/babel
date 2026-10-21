<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
class K { public $c = 'K'; static function m() { return 'L(__FILE__);'; } }
$o = new K;
eval($o
?->
c
::
m
(
)

);
$x = new K;
eval(
$x
::
m()
);
