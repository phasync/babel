<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
class K { static function m() { return 'L(__FILE__);'; } }
$x = 'K';
eval(
$x
::
m
(
)

);
