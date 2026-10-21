<?php function L($t, $f) { echo $t, ":", preg_replace("~^.*\\((\\d+)\\) : eval.*\$~", "\$1", $f), "\n"; }
$c = 'L("a", __FILE__);';
eval((#[SomeAttr]
 fn() =>
 $c

)());
eval((#[SomeAttr] function () use ($c) {
 return $c;

})());
eval((function &() use ($c) {
 return $c;

 })());
eval((fn(): string =>
 $c
 )
 ()
);
