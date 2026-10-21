<?php
namespace A;
use Orig\{Thing, Err, Attr as At};
use Orig\Base as B;
#[At('x')]
enum E: int {
    #[At] case One = 1;
    #[\Orig\Attr(Thing::class)] case Two = 2;
}
abstract class Abs {
    abstract public function f(Thing $t): ?Thing;
    abstract protected static function g(#[At] (B&Thing)|null $x = null, Thing ...$rest): static;
    public Thing|B $u;
    public static ?Thing $s = null;
    private static int|Thing $q = 5;
    var $legacy;
    public /* c */ Thing /* d */ $cm;
    public readonly Thing $ro;
}
try { throw new Err('e'); } catch (Err | \RuntimeException) { echo "caught\n"; }
try { throw new Err('e'); } catch (\Exception $e) { echo get_class($e), "\n"; }
$o = new #[At] class(new Thing) extends B { public function __construct(public Thing $t) {} };
echo get_class($o->t), get_parent_class($o), "\n";
foreach ([E::class, Abs::class] as $c) {
    foreach ((new \ReflectionClass($c))->getAttributes() as $a) echo $a->getName(), ' ', json_encode($a->getArguments()), "\n";
}
foreach ((new \ReflectionEnumBackedCase(E::class, 'Two'))->getAttributes() as $a) echo $a->getName(), ' ', json_encode($a->getArguments()), "\n";
$r = new \ReflectionClass(Abs::class);
foreach (['u','s','q','cm','ro'] as $p) echo $p, '=', $r->getProperty($p)->getType() ?? 'none', "\n";
echo $r->getMethod('g')->getParameters()[0]->getType(), ' ', $r->getMethod('g')->getParameters()[1]->getType(), "\n";
