<?php
// a statement inside a closure in a constant expression must not end the constant expression
namespace App;
const H = [static function () { $a = 1; return $a; }, strtoupper(...)];
class C {
    const K = [static function () { $b = 2; return $b; }, fopen(...)];
    public function m($f = [static function () { $c = 3; return $c; }, usleep(...)]) { return $f[1](1); }
}
#[\Attribute] class A { function __construct(public $f, public $g) {} }
#[A(static function () { $d = 4; return $d; }, sleep(...))] class D {}
echo (H[1])('a'), ' ', (C::K[1])('b'), ' ', (new C)->m(), ' ', ((new \ReflectionClass(D::class))->getAttributes()[0]->newInstance()->g)(1), "\n";
echo (H[0])(), (C::K[0])(), "\n";
