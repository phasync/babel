<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
function f($a) { return $a; }
$z = [
  1,
  eval('L(__FILE__);
  L(__FILE__);'),
  3
];
