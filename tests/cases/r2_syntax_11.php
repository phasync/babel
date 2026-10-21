<?php
// constants whose names coincide with mapped class names, used inside attribute arguments
namespace Orig;
const Thing = 'const-thing';
const Base = 'const-base';
#[\Attribute] class Lbl { public function __construct(public $v = null, public $w = null) {} }
#[Lbl(Thing, [Base, Thing::X])]
function f() {}
$a = (new \ReflectionFunction('Orig\f'))->getAttributes()[0]->getArguments();
echo $a[0], ' ', $a[1][0], ' ', $a[1][1], "\n";
echo Thing, ' ', \Orig\Base, "\n";
