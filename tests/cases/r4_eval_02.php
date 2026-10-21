<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
$f = fn($a) => $a;
eval($f(
'L(__FILE__);'

)
);
