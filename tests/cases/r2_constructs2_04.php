<?php function L($t, $f) { echo $t, ":", preg_replace("~^.*\\((\\d+)\\) : eval.*\$~", "\$1", $f), "\n"; }
class C { function __construct(public $c = 'L("a", __FILE__);') {} function __toString(): string { return $this->c; }
  static function m($x = 'L("x", __FILE__);') { return $x; } const K = 'L("k", __FILE__);'; }
eval(new
 C(
 'L("a", __FILE__);'
 )
);
eval(new
 C
);
eval(new C(
));
eval(C
 ::
 m(
 'L("d", __FILE__);'
 )
);
eval(C
 ::
 m()
);
eval(C
 ::
 K
);
eval(\C::
 K
);
eval(
 C::class
 ? 'L("h", __FILE__);' : ''
);
