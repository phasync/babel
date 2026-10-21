<?php
namespace A;
use Orig\Thing;
use Orig\Base;
interface HasHook { public Thing $x { get; set(Thing $v); } }
abstract class AH implements HasHook {
    abstract public Base|Thing $y { get; set(Base|Thing $v); }
    public function __construct(public Thing $p { set(Thing $v) => $v; } ) {}
}
class CH extends AH {
    public Thing $x { get => $this->x; set(Thing $v) { $this->x = $v; } }
    public Base|Thing $y { get => $this->y; set(Base|Thing $v) => $v; }
}
$c = new CH(new Thing);
$c->x = new Thing;
$c->y = new Base;
echo get_class($c->x), get_class($c->y), get_class($c->p), "\n";
foreach (['x' => CH::class, 'y' => CH::class, 'p' => AH::class] as $prop => $cls) {
    $set = (new \ReflectionProperty($cls, $prop))->getHook(\PropertyHookType::Set);
    echo $prop, ' ', $set?->getParameters()[0]->getType() ?? 'none', "\n";
}
echo fopen('last'), "\n";
