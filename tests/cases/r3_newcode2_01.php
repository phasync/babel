<?php
// PHP 8.5 closures in constant expressions: the closure body is ordinary code, so an unqualified call
// resolves at run time (App\fopen is declared by an included file the translator cannot see).
namespace App;
require __DIR__ . '/fixtures/r3_newcode2_nsfn.php';
const G = static function () { return fopen('a', 'r'); };
class K {
    const C = static function () { return fopen('a', 'r'); };
    public \Closure $p = static function () { return strtoupper('a'); };
    public static function m($cb = static function () { return fopen('a', 'r'); }, $fn = static function () { return strtoupper("a"); }) {
        return $cb() . ' ' . $fn();
    }
}
#[\Attribute] class At { public function __construct(public \Closure $c) {} }
#[At(static function () { return fopen('a', 'r'); })]
class U {}
echo (G)(), "\n";
echo (K::C)(), "\n";
echo ((new K)->p)(), "\n";
echo K::m(), "\n";
echo ((new \ReflectionClass(U::class))->getAttributes()[0]->newInstance()->c)(), "\n";
echo fopen('a', 'r'), "\n";
