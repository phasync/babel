<?php
// Promoted parameters: closure default followed by a hook block; DNF hook parameter; mapped types after hook params.
function get($x) { return "get($x)"; }
class B2 extends Orig\Base implements Orig\Contract {}
class C {
    public function __construct(
        public mixed $cb = static function (): string { return get(strtoupper('a')); } { get => $this->cb; },
        public (Orig\Base&Orig\Contract)|null $d = null { set((Orig\Base&Orig\Contract)|null $v) { $this->d = $v; } },
        public mixed $cb2 = static function () { return get(fopen('x', 'r')); },
        Orig\Thing|PDO ...$rest,
    ) {}
}
$c = new C(d: new B2);
echo ($c->cb)(), ' ', ($c->cb2)(), ' ', get_parent_class($c->d), "\n";
$p = (new ReflectionMethod(C::class, '__construct'))->getParameters();
echo $p[1]->getType(), ' ', $p[3]->getType(), ' ', (new ReflectionProperty(C::class, 'd'))->getHook(PropertyHookType::Set)->getParameters()[0]->getType(), "\n";
