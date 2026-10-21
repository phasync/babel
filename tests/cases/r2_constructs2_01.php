<?php function L($t, $f) { echo $t, ":", preg_replace("~^.*\\((\\d+)\\) : eval.*\$~", "\$1", $f), "\n"; }
$c = 'L("a", __FILE__);';
$n = null;
eval($n
 ??
 $c

);
eval($c
 ?:
 'x'
);
eval($n ??
 'L("c", __FILE__);'
);
eval($c ?
 $c
 : $n
);
eval(false ?
 $n
 :
 'L("e", __FILE__);'

);
