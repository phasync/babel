<?php
namespace kwm;
use Orig\Thing;
class C {
    public function const(Thing $t): Thing { return $t; }
    public function after(Thing $t): ?Thing { return $t; }
}
echo (new \ReflectionMethod(C::class, 'const'))->getParameters()[0]->getType(), ' ', (new \ReflectionMethod(C::class, 'const'))->getReturnType(), ' ', (new \ReflectionMethod(C::class, 'after'))->getReturnType(), "\n";
echo sleep(1), "\n";
