<?php function L($t, $f) { echo $t, ":", preg_replace("~^.*\\((\\d+)\\) : eval.*\$~", "\$1", $f), "\n"; }
class C { static function m() { return 'L("x", __FILE__);'; } function n() { return 'L("y", __FILE__);'; } }
function f() { return 'L("z", __FILE__);'; }
$o = new C;
eval(C::m
 (
 )
);
eval($o
 ->
 n
 ()
);
eval($o
 ?->
 n()
);
eval(f
 (
 )
);
eval(\f
 ()
);
$fn = 'f';
eval($fn
 ()
);
eval($o->n(...)
 ()
);
