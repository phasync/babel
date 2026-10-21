<?php
declare(strict_types=1);
namespace App;

use Orig\Thing;
use Orig\{Base, Contract as C, Err};
use Orig\Attr;

function orig(string $c) { return unserialize('O:' . strlen($c) . ':"' . $c . '":0:{}'); }

abstract class Model {
    public function __construct(
        public readonly Thing $a,
        private ?Base $b = null,
        protected Thing|Base|null $c = null,
        public C|Base $d = new Base,
        #[Attr(1)] public readonly ?\Orig\Thing $e = null,
    ) {}
    abstract protected function make(Thing $t): ?Thing;
    abstract public static function sm(Base ...$b): static|Thing;
    public static ?Thing $inst = null;
    public readonly Thing|Base $ro;
    protected ?Base $nb = null, $nb2 = null;
    var Thing $legacy;
    private static Thing|null $sp;
    public const string NAME = 'm';
    final public const ?Thing T = null;
    const Thing|Base|null U = null, V = null;
}
interface Fact { public function f(Thing $t): Thing; public static function g(): ?Base; const Thing|string Z = Thing::X; }

foreach (['a', 'b', 'c', 'd', 'e'] as $p) {
    echo $p, '=', (new \ReflectionProperty(Model::class, $p))->getType(), ' ';
}
echo "\n";
foreach (['inst', 'ro', 'nb', 'nb2', 'legacy', 'sp'] as $p) {
    echo $p, '=', (new \ReflectionProperty(Model::class, $p))->getType(), ' ';
}
echo "\n";
foreach (['T', 'U', 'V', 'NAME'] as $c) {
    echo $c, '=', (new \ReflectionClassConstant(Model::class, $c))->getType(), ' ';
}
echo "\n";
foreach (['make', 'sm'] as $m) {
    $rm = new \ReflectionMethod(Model::class, $m);
    echo $m, ': ', $rm->getReturnType(), ' <- ';
    foreach ($rm->getParameters() as $p) echo $p->getType(), ',';
    echo "\n";
}
$rm = new \ReflectionMethod(Fact::class, 'f');
echo $rm->getReturnType(), ' ', $rm->getParameters()[0]->getType(), ' ', (new \ReflectionMethod(Fact::class, 'g'))->getReturnType(), ' ', (new \ReflectionClassConstant(Fact::class, 'Z'))->getType(), "\n";
class Impl extends Model {
    protected function make(Thing $t): ?Thing { return $t; }
    public static function sm(Base ...$b): static|Thing { return new static(new \Repl\Thing); }
    public function t(Thing $t) { return $this->make($t); }
}
$i = Impl::sm();
echo get_class($i->a), ' ', get_class($i->d), "\n";
echo get_class($i->t(new \Repl\Thing)), "\n";
try { $i->t(orig('Orig\Thing')); } catch (\TypeError) { echo "TypeError method\n"; }
try { new Impl(orig('Orig\Thing')); } catch (\TypeError) { echo "TypeError promoted\n"; }
try { Impl::$inst = orig('Orig\Thing'); } catch (\TypeError) { echo "TypeError static prop\n"; }
Impl::$inst = new \Repl\Thing; echo get_class(Impl::$inst), "\n";
try { $i->e; } catch (\Error $e) { echo get_class($e), "\n"; }
