<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
$v = '__FILE__);';
eval('L('
 . $v
);
