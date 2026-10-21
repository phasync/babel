<?php
// property hooks declared in interfaces and implemented with typed set hooks
namespace s02;
use Orig\Thing;
interface HasThing {
    public Thing $t { get; }
    public ?Thing $u { set; }
}
abstract class AbsT implements HasThing {
    abstract public Thing $w { get; }
}
class Impl extends AbsT {
    public Thing $t { get => new Thing; }
    public ?Thing $u {
        set(?Thing $value) { $this->u = $value; }
    }
    public Thing $w { get => $this->t; }
}
$o = new Impl;
echo $o->t::who(), "\n";
$o->u = new Thing;
echo $o->u::who(), "\n";
echo $o->w::who(), "\n";
echo (new \ReflectionProperty(HasThing::class, 't'))->getType(), "\n";
