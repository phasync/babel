<?php function L($t, $f) { echo $t, ":", preg_replace("~^.*\\((\\d+)\\) : eval.*\$~", "\$1", $f), "\n"; }
$c = 'L("a", __FILE__);';
eval("$c
// x
");
eval("// x
$c
// y
");
eval("// {$c}
$c");
eval("// $c
\n$c");
eval(<<<X
 // $c
 $c
 // z
 X);
