<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
$v = '';
eval($v . ('L(' .
'__FILE__);'
)
);
