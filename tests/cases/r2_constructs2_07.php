<?php function L($t, $f) { echo $t, ":", preg_replace("~^.*\\((\\d+)\\) : eval.*\$~", "\$1", $f), "\n"; }
eval(new class {
 function __toString(): string { return 'L("a", __FILE__);'; }

});
eval(new class(
 'L("b", __FILE__);'
 ) {
 function __construct(public string $s) {}
 function __toString(): string { return $this->s; }

});
eval(new class implements Stringable {
 function __toString(): string { return 'L("c", __FILE__);'; }

}
);
eval(new
 class
 {
 function __toString(): string { return 'L("d", __FILE__);'; }
 }
);
