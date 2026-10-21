<?php
// asymmetric visibility with explicit get visibility, readonly, promoted
namespace s04;
use Orig\Thing;
final class C {
    public private(set) Thing $a;
    public protected(set) readonly ?Thing $b;
    public function __construct(public private(set) Thing $p, protected(set) Thing $q = new Thing) {
        $this->a = $p; $this->b = $q;
    }
}
$o = new C(new Thing);
echo $o->a::who(), ' ', $o->b::who(), ' ', $o->p::who(), ' ', $o->q::who(), "\n";
