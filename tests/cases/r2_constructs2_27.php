<?php function L($t, $f) { echo $t, ":", preg_replace("~^.*\\((\\d+)\\) : eval.*\$~", "\$1", $f), "\n"; }
$c = 'L("a", __FILE__);'; $t = true;
eval(trim($x
 =
 $c
 )
);
eval($t ? $y
 =
 $c : ''
);
eval(($z
 = $c)
 . ''
);
eval('' . ($w
 =
 $c)
);
eval($t
 ? $c
 : 'x'
);
eval($t
 ? 'L("b", __FILE__);'
 : 'x'
);
eval($t ?
 'L("c", __FILE__);'
 :
 $c
);
