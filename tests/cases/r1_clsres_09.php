<?php
declare(strict_types=1);
namespace types;

use Orig\{Thing, Base, Contract, Attr, Err, Tr};
use PDO;

#[Attr(Thing::class)]
interface I extends Contract { public function m(Thing $t): ?Base; const T = 1; }

abstract class Par extends Base implements I, \Countable {
    use Tr { who as protected whoTr; }
    public function __construct(public readonly Thing $a, protected ?Base $b = null, private Thing|PDO|null $c = null, public int|Err $d = 0) {}
    public static ?Thing $s = null;
    public Base|Err|null $u;
    public (Thing&Contract)|null $dnf = null;
    public function count(): int { return 0; }
    abstract protected function abs(Thing ...$ts): static|Thing;
    public function cl(): \Closure { return function (Thing $x) use (&$y): ?Thing { return $x; }; }
    public function ar(): \Closure { return fn(Base $b = new Base): Base => $b; }
}
enum E: string implements Contract { case A = 'a'; use Tr; public static function mk(Thing $t = new Thing): self { return self::A; } }
trait TT { public ?Thing $tp = null; public function x(Thing $t) { return $t; } }
function ff(Thing|Base ...$all): Thing|Base|null { return $all[0] ?? null; }
$anon = new class(new Thing) extends Base implements Contract { public function __construct(public Thing $t) {} };

function show($r) { foreach ($r as $p) { echo ' ', $p->getName(), ':', $p->getType() ?? '-'; } echo "\n"; }
show((new \ReflectionMethod(Par::class, '__construct'))->getParameters());
echo (new \ReflectionProperty(Par::class, 's'))->getType(), ' ', (new \ReflectionProperty(Par::class, 'u'))->getType(), ' ', (new \ReflectionProperty(Par::class, 'dnf'))->getType(), "\n";
echo (new \ReflectionMethod(Par::class, 'abs'))->getReturnType(), ' ', (new \ReflectionMethod(Par::class, 'abs'))->getParameters()[0]->getType(), ' ', (new \ReflectionMethod(I::class, 'm'))->getReturnType(), "\n";
echo (new \ReflectionFunction('types\ff'))->getReturnType(), ' ', (new \ReflectionProperty(TT::class, 'tp'))->getType(), ' ', (new \ReflectionMethod(E::class, 'mk'))->getParameters()[0]->getType(), "\n";
echo (new \ReflectionClass(Par::class))->getParentClass()->name, ' ', implode(',', (new \ReflectionClass(Par::class))->getInterfaceNames()), ' ', implode(',', array_keys((new \ReflectionClass(Par::class))->getTraits())), ' ', implode(',', (new \ReflectionEnum(E::class))->getInterfaceNames()), "\n";
echo (new \ReflectionClass(I::class))->getAttributes()[0]->getName(), ' ', (new \ReflectionClass(I::class))->getAttributes()[0]->getArguments()[0], "\n";
echo get_parent_class($anon), ' ', implode(',', class_implements($anon)), ' ', get_class($anon->t), "\n";
echo (new \ReflectionMethod(Par::class, 'cl'))->getReturnType(), "\n";
$c = (new class extends Par { public function __construct() {} protected function abs(Thing ...$ts): static|Thing { return $this; } public function m(Thing $t): ?Base { return null; } })->cl();
echo (new \ReflectionFunction($c))->getParameters()[0]->getType(), '|', (new \ReflectionFunction($c))->getReturnType(), "\n";
try { ff(unserialize('O:10:"Orig\Thing":0:{}')); } catch (\TypeError $e) { echo "TypeError\n"; }
echo get_class(ff(new \Repl\Base)), "\n";
