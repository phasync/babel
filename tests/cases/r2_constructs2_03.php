<?php function L($t, $f) { echo $t, ":", preg_replace("~^.*\\((\\d+)\\) : eval.*\$~", "\$1", $f), "\n"; }
class S { public static $p; }
$o = new stdClass; $o->q = ''; $arr = ['k' => ''];
eval(S::$p
 =
 'L("a", __FILE__);'
);
eval($o->q
 .=
 'L("b", __FILE__);'
);
eval($arr['k']
 .=
 'L("c", __FILE__);'
);
eval($o->r
 ??=
 'L("d", __FILE__);'
);
eval($arr[]
 =
 'L("e", __FILE__);'
);
eval($o
 ->
 q
 = 'L("f", __FILE__);'
);
$s = 'L("g", __FILE__);';
eval($m
 =&
 $s
);
