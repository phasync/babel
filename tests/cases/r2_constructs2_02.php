<?php function L($t, $f) { echo $t, ":", preg_replace("~^.*\\((\\d+)\\) : eval.*\$~", "\$1", $f), "\n"; }
$c = 'L("a", __FILE__);';
$d = '';
eval($d .=
 $c
);
$q = null;
eval($q ??=
 'L("b", __FILE__);'
);
$o = new stdClass;
eval($o->p
 =
 'L("c", __FILE__);'
);
$arr = [];
eval($arr[
 'k'
 ] =
 'L("d", __FILE__);'
);
eval($x = $y =
 'L("e", __FILE__);'
);
eval($z
 = 'L("f", __FILE__);' . ''
);
