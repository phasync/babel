<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
$c = 'L(__FILE__);'; $a = '';
eval($a
.=
$b
=
$c
);
