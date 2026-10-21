<?php
// closure bodies inside constant expressions (PHP 8.5) are ordinary code: PHP falls back at run time
namespace App;
const H = static function () { return strtoupper('h'); };
class C {
    const K = static function () { return strtoupper('k'); };
    public function m($f = static function () { return strtoupper('m'); }) { return $f(); }
}
#[\Attribute] class A { function __construct(public $f) {} }
#[A(static function () { return strtoupper('a'); })] class D {}
echo (H)(), ' ', (C::K)(), ' ', (new C)->m(), ' ', ((new \ReflectionClass(D::class))->getAttributes()[0]->newInstance()->f)(), "\n";
eval('namespace App; function strtoupper($x) { return "local-$x"; }');
echo (H)(), ' ', (C::K)(), ' ', (new C)->m(), ' ', ((new \ReflectionClass(D::class))->getAttributes()[0]->newInstance()->f)(), "\n";
