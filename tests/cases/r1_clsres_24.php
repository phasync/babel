<?php
namespace p85;
use Orig\{Thing, Base, Attr};
use PDO;

#[Attr(static function (Thing $t): ?Thing { return $t; })]
class P {
    public const F = static function (Thing $t): Base|Thing { return $t; };
    public const G = Thing::who(...);
    public function __construct(final public readonly Thing $t = new Thing) {}
    public function with(): static { return clone($this, ['t' => new Thing]); }
    #[\Deprecated(Thing::class)]
    public function old(): never { exit; }
}
final readonly class RO { public function __construct(public Thing $t, public ?PDO $p = null) {} }
$p = new P;
$f = P::F;
echo get_class($f(new \Repl\Thing)), ' ', (P::G)(), ' ', get_class($p->with()->t), "\n";
$r = new \Repl\Thing |> (fn(Thing $t): string => $t::class);
echo $r, "\n";
echo new Thing()->who(), ' ', (new Thing)::X, "\n";
echo (new \ReflectionFunction(P::F))->getParameters()[0]->getType(), ' ', (new \ReflectionFunction(P::F))->getReturnType(), "\n";
echo (new \ReflectionClass(P::class))->getAttributes()[0]->getArguments()[0] instanceof \Closure ? 'closure' : 'other', "\n";
echo (new \ReflectionProperty(RO::class, 'p'))->getType(), ' ', (new \ReflectionClass(RO::class))->isReadOnly() ? 'ro' : 'rw', "\n";
