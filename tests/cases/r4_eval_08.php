<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
$f = 'strtoupper';
eval(
'L(__FILE__);' . substr($f('x'), 0, 0)

);
eval('L(__FILE__);' . substr(strtoupper(
'x'), 0, 0
)
);
namespace\L('a');
