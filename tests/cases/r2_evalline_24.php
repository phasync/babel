<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
eval( // c
'L(__FILE__);' // c
/* x
y */);
