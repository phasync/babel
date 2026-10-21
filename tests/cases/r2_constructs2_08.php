<?php function L($t, $f) { echo $t, ":", preg_replace("~^.*\\((\\d+)\\) : eval.*\$~", "\$1", $f), "\n"; }
function g($a = '', $b = '') { return $a . $b; }
$c = 'L("a", __FILE__);';
eval(g(
 b:
 $c
 )
);
eval(g(...[
 $c
 ]
 )
);
eval(g($c,
 )
);
eval([
 'k'
 =>
 $c
 ]['k']
);
eval([$c][
 0
 ]
);
eval(strval(...)(
 $c
 )
);
eval(true ? $c : (
 false ? 'x' : 'y'
 )
);
eval(false ? 'x' : (
 true ? $c : 'y'
 )
);
