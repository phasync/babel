<?php
namespace stress;
use Orig\{Thing, Base, Contract, Attr, Err, Tr};
use PDO;

#[Attr(new Thing)]
final class A extends Base implements Contract {
    use Tr;
    const C1 = Thing::X, C2 = [Thing::class => Base::class];
    const ?Thing C3 = null;
    final public const Thing|Base|null C4 = null;
    #[Attr(Thing::class)] public ?Thing $p1 = null, $p2 = null;
    public static Thing|PDO|null $p3 = null;
    var $p4 = Thing::X;
    public function m1(#[Attr(Base::class)] Thing &$a, Base|Thing ...$rest): static { return $this; }
    public function m2(Thing|(Base&Contract)|null $x = null): Thing|null { static $s = null; return $x; }
    public function m3(): iterable { yield new Thing => Base::class; yield from [Thing::X]; }
    public function m4() {
        $x = fn(Thing $t = new Thing, Base ...$b): ?Thing => $t instanceof Thing ? $t : null;
        $y = static function (Thing $t) use ($x): Thing|Base { return $t; };
        try { throw new Err; } catch (Err | \RuntimeException $e) { } catch (Base) { } finally { }
        $z = match (true) { $x instanceof Thing, $y instanceof Base => Thing::class, default => PDO::class };
        $f = Thing::who(...); $g = new Thing(...[]); 
        $o = new class(new Thing) extends Base implements Contract { use Tr; public function __construct(public Thing $t) {} };
        return [$f, $g, $o, $z, Thing::$p, Thing::X, $x(), PDO::class, (clone new Thing)::who(), (new Thing)::X];
    }
    public function Thing() { return $this->Thing . Thing::X; }
}
interface I2 extends Contract { const T = Thing::X; public function f(Thing $t): Thing; }
enum En: string implements Contract { use Tr; case A = Thing::X; const D = self::A; public function g(Thing $t = new Thing): ?Thing { return null; } }
trait T3 { abstract public function f(Thing $t): Base; public static function s(): static { return new static; } }
function ff(Thing $a, \Orig\Thing $b, namespace\Thing $c, \PDO $d, PDO $e): PDO { return $e; }
$r = (function (Thing ...$a): Thing { return $a[0]; })(new Thing);
echo Thing::class, A::C1, PHP_EOL;
echo (new \ReflectionMethod(A::class, 'm2'))->getParameters()[0]->getType(), '|', (new \ReflectionClassConstant(A::class, 'C4'))->getType(), '|', (new \ReflectionFunction('stress\ff'))->getParameters()[2]->getType(), '|', En::A->value, "\n";
$a = new A; $r = $a->m4(); echo get_parent_class($r[2]), ' ', get_class($r[1]), ' ', $r[3], ' ', $r[4], ' ', get_class($a->m3()->key()), "\n";
