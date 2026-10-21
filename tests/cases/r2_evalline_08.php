<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
$v = 'L(__FILE__);';
eval(
$v

);
