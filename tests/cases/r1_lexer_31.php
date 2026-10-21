<?php
namespace A;
use Orig\Thing;
use Orig\Base;
use Orig\Attr;
function f(
    Thing $a,
    $cb = static function (Base $b): Thing { return new Thing; },
    Base $c = new Base,
    $arrow = static function (Thing $t): ?Base { return null; },
    ?Thing $d = null,
    Thing&Base ...$rest
) { return fopen('f'); }
$rf = new \ReflectionFunction('A\f');
foreach ($rf->getParameters() as $p) echo $p->getName(), ':', $p->getType() ?? '-', "\n";
function g() {
    static $s = new Thing;
    static $arr = [Thing::class => 1];
    return [get_class($s), key($arr), fopen('g')];
}
echo json_encode(g()), "\n";
#[Attr(static function (Thing $x) { return 1; })]
class WithClosureAttr {}
$args = (new \ReflectionClass(WithClosureAttr::class))->getAttributes()[0];
echo $args->getName(), ' ', (new \ReflectionFunction($args->getArguments()[0]))->getParameters()[0]->getType(), "\n";
const DEFAULT_CB = static function (Thing $t): Thing { return $t; };
echo (new \ReflectionFunction(DEFAULT_CB))->getReturnType(), "\n";
echo sleep(1), "\n";
