<?php
namespace Vo;

use Orig\Thing;
use Orig\Base;
use Orig\Contract;

final class Wrapper implements Contract
{
    public function __construct(
        public Thing|Base $inner { set(Thing|Base $v) { $this->inner = $v instanceof Thing ? $v : new Thing; } get => $this->inner; },
        public ?Base $base = null { get => $this->base ?? new Base; },
        public readonly (Contract&Base)|Thing|null $dnf = null,
    ) {}

    public function withInner(Thing|Base $i): static
    {
        return clone($this, ['base' => $i instanceof Base ? $i : null]);
    }
}

$w = new Wrapper(new Base);
echo get_class($w->inner), ' ', get_class($w->base), "\n";
$w2 = $w->withInner(new Base);
echo get_class($w2->base), ' ', $w2 === $w ? 'same' : 'clone', "\n";
$p = (new \ReflectionClass(Wrapper::class))->getConstructor()->getParameters();
foreach ($p as $param) {
    echo $param->getName(), ': ', $param->getType(), "\n";
}
$hook = (new \ReflectionProperty(Wrapper::class, 'inner'))->getHook(\PropertyHookType::Set);
echo $hook->getParameters()[0]->getType(), "\n";
$t = new Thing;
$x = $t |> get_class(...) |> strtoupper(...);
echo $x, ' ', (Thing::class |> strtolower(...)), "\n";
