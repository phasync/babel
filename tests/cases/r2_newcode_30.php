<?php
// A property whose default is a closure (PHP 8.5) followed by a hook block: the hook's parameter type is mapped.
class C {
    public Orig\Thing|Closure $f = static function () { return 'cl'; } {
        set(Orig\Thing|Closure $v) { $this->f = $v; }
    }
}
$c = new C;
echo ($c->f)(), ' ', (new ReflectionProperty(C::class, 'f'))->getHook(PropertyHookType::Set)->getParameters()[0]->getType(), "\n";
$c->f = new Orig\Thing;
echo get_class($c->f), "\n";
