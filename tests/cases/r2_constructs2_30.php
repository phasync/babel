<?php function L($t, $f) { echo $t, ":", preg_replace("~^.*\\((\\d+)\\) : eval.*\$~", "\$1", $f), "\n"; }
$c = 'L("a", __FILE__);';
eval(
$c

);
eval($c);eval(trim(

$c
));
echo __LINE__, "\n";
