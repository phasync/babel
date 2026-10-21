<?php
// PHP 8.5 closures in constant expressions: the closure body is ordinary code (computed callees,
// computed classes, namespace fallback), the surrounding expression is not
namespace N;
use Orig\Thing;
use Orig\Attr;
const F = static function ($c = 'Orig\Thing') { $g = 'strtoupper'; return fopen('x') . $g('y') . $c::who() . (new Thing)::X; };
#[\Attribute]
class A { public function __construct(public $cb, public $arr = []) {} }
class K {
    const G = static function () { $c = 'Orig\Thing'; return $c::$p . Thing::X; };
    public $h = static function (Thing $t) { return $t::class; };
    public function m(#[A(static function () { $f = 'fopen'; return $f(); }, [1, [2, Thing::class]])] $x = null, $d = static function () { return strtoupper('d'); }) { return $d(); }
}
echo (F)(), "\n";
echo (K::G)(), "\n";
echo ((new K)->h)(new Thing), "\n";
echo (new K)->m(), "\n";
$attr = (new \ReflectionMethod(K::class, 'm'))->getParameters()[0]->getAttributes()[0]->newInstance();
echo ($attr->cb)(), ' ', $attr->arr[1][1], "\n";
