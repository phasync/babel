<?php function L($t, $f) { echo $t, ":", preg_replace("~^.*\\((\\d+)\\) : eval.*\$~", "\$1", $f), "\n"; }
class C { public static $p = 'L("s", __FILE__);'; }
$c = 'L("a", __FILE__);';
$o = new stdClass; $o->p = $c;
eval($o
 ->
 p
);
eval($o
 ?->
 p
);
eval(C::
 $p
);
eval($o->{
 'p'
 }
);
$name = 'c';
eval($
 $name
);
eval(${
 'c'
 }
);
eval((function($x) { return $x; })(
 $c
 )
);
eval((static fn($x) => $x)(
 $c
 )
);
eval((static function() {
 return 'L("t", __FILE__);';
 }
 )()
);
