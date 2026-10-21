<?php
// asymmetric visibility: set-visibility-only modifiers imply public
namespace s03;
use Orig\Thing;
class C {
    private(set) Thing $a;
    protected(set) ?Thing $b = null;
    public(set) Thing|null $c = null;
    public function __construct() { $this->a = new Thing; $this->b = new Thing; $this->c = new Thing; }
}
$o = new C;
echo $o->a::who(), ' ', $o->b::who(), ' ', $o->c::who(), "\n";
echo (new \ReflectionProperty(C::class, 'a'))->getType(), "\n";
