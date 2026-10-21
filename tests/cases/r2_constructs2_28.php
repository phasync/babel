<?php function L($t, $f) { echo $t, ":", preg_replace("~^.*\\((\\d+)\\) : eval.*\$~", "\$1", $f), "\n"; }
$c = 'L("a", __FILE__);'; $n = null;
eval($n
 ??
 $y
 =
 $c
);
eval(''
 .
 $w
 =
 $c
);
eval(!$v
 = $c ? $c : ''
);
