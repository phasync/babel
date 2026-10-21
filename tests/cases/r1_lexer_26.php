<?php
namespace A;
use Orig\Thing;
use Orig\Contract;
class K {
    const interface = 'ci';
    const trait = 'ct';
    public function a() { echo static::class, fopen('after-const'), "\n"; }
    final public const ?Thing T = null;
    const int|string U = 5, V = 6;
    public function b(Thing $t) { echo static::class, sleep(1), "\n"; }
}
(new K)->a();
(new K)->b(new Thing);
echo K::interface, K::trait, "\n";
echo (new \ReflectionClassConstant(K::class, 'T'))->getType(), "\n";
