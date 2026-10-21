<?php
// Hooks declared in interfaces, traits and abstract classes; final hooks, &get, attributes on hooks and on set parameters.
namespace App;
use Orig\Thing;
interface HasT { public Thing $t { get; } public ?Thing $w { set; } }
trait TT {
    public Thing $t { final get => $this->t ??= new Thing; }
    public ?Thing $w = null { #[\Orig\Attr(Thing::X)] set(#[\SensitiveParameter] ?Thing $value) { $this->w = $value ?? new Thing; } }
}
abstract class A implements HasT {
    use TT;
    abstract public array $list { &get; }
}
final class B extends A {
    private array $l = [];
    public array $list { &get { return $this->l; } }
}
$b = new B;
$b->w = null;
$r = &$b->list;
$r[] = Thing::X;
echo \get_class($b->t), ' ', \get_class($b->w), ' ', \json_encode($b->list), ' ', (new \ReflectionProperty(HasT::class, 't'))->getType(), "\n";
