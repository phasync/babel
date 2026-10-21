<?php function L($t, $f) { echo $t, ":", preg_replace("~^.*\\((\\d+)\\) : eval.*\$~", "\$1", $f), "\n"; }
$c = 'L("a", __FILE__);';
eval(match(true) {
 default
 =>
 $c
 ,

});
eval(implode('', [
 $c
 ,
 ])
);
eval(trim(
 $c
 ,
 )
);
