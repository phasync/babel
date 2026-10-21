<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
eval(<<<'X'
L(__FILE__);
X
 . ''

);
