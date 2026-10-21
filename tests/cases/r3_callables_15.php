<?php
// PHP 8.5: the same inside a namespace, in class constants, enum constants and attribute arguments
namespace R3cb15;
const C = static function () { return strtoupper('x'); };
echo (C)(), "\n";
class K {
    const D = static function () { return fopen('y'); };
    const E = sleep(...);
}
echo (K::D)(), "\n";
echo (K::E)(1), "\n";
#[\Attribute]
class A { public function __construct(public \Closure $c) {} }
#[A(static function () { return usleep(1); })]
class T {}
echo ((new \ReflectionClass(T::class))->getAttributes()[0]->newInstance()->c)(), "\n";
