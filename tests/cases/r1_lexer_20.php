<?php
namespace A;
use Orig\Thing;
use Orig\Tr;
trait T1 { public function hi() { return 'T1'; } }
trait T2 { public function hi() { return 'T2'; } }
class C {
    use T1, T2 { T1::hi insteadof T2; T2::hi as protected other; }
    use Tr { who as public whoAlias; }
    public function o() { return $this->other(); }
}
$c = new C;
echo $c->hi(), $c->o(), $c->who(), $c->whoAlias(), "\n";
echo implode(',', class_uses($c)), "\n";
$f = function () use ($c): string { return $c->hi(); };
echo $f(), "\n";
function g() { $z = 1; return function () use ($z) { return fopen('z'); }; }
echo g()(), "\n";
$h = fn(Thing $t): Thing => $t;
echo (new \ReflectionFunction($h))->getParameters()[0]->getType(), "\n";
