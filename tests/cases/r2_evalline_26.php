<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
eval((function() {
 return 'L(__FILE__);';

})());
