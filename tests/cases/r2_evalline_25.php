<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
eval((fn() =>
'L(__FILE__);'

)());
