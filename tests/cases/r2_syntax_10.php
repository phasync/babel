<?php
// PHP 8.5 first-class callable of a mapped function as an attribute argument
namespace s10;
use Orig\Attr;
#[Attr(strtoupper(...))]
class X {}
#[\Attribute]
class Mine { public function __construct(public $f) {} }
#[Mine(fopen(...))]
function f() {}
$a = (new \ReflectionClass(X::class))->getAttributes()[0];
echo $a->getName(), ' ', ($a->newInstance()->v)('a'), "\n";
$b = (new \ReflectionFunction('s10\f'))->getAttributes()[0]->newInstance();
echo ($b->f)('x'), "\n";
