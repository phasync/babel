<?php
use Orig\Thing;
use Orig\Base;
use Orig\Contract;

function orig(string $c) { return unserialize('O:' . strlen($c) . ':"' . $c . '":0:{}'); }

class Host {
    public function make(): object {
        return new class(new Thing, 5) extends Base implements Contract {
            public function __construct(public Thing $t, public int $n) {}
            public function get(): ?Thing { return $this->t; }
            public function self(): static { return $this; }
            public static function mk(self|Thing $x, parent|null $p = null): static { return new static(new Thing, 1); }
        };
    }
    public function readonlyAnon() {
        return new readonly class(new Base) { public function __construct(public Base $b) {} };
    }
}
$o = (new Host)->make();
$rc = new ReflectionClass($o);
echo $rc->getParentClass()->getName(), ' ', implode(',', $rc->getInterfaceNames()), "\n";
echo get_class($o->t), ' ', get_class($o->get()), ' ', $o->name(), "\n";
foreach (['__construct', 'get', 'self', 'mk'] as $m) {
    $rm = new ReflectionMethod($o, $m);
    echo $m, ': ', $rm->getReturnType() ?? '-', ' <- ';
    foreach ($rm->getParameters() as $p) echo $p->getType(), ',';
    echo "\n";
}
echo (new ReflectionProperty($o, 't'))->getType(), "\n";
try { new ($rc->getName())(orig('Orig\Thing'), 1); echo "accepted\n"; } catch (TypeError) { echo "anon rejects Orig\n"; }
echo get_class((new Host)->readonlyAnon()->b), "\n";
var_dump($o instanceof Base, $o instanceof Contract, $o instanceof Thing);
var_dump(orig('Orig\Thing') instanceof Thing);
var_dump(!($o instanceof Thing));
$a = [new Thing, new Base];
echo implode(',', [get_class($a[0]), get_class($a[1])]), "\n";
echo (new Thing)::X, ' ', (new Thing)::who(), ' ', Thing::{'who'}(), "\n";
echo get_class(new Thing(...[])), ' ', Thing::class, ' ', Base::class, ' ', Contract::class, "\n";
$fc = Thing::who(...); echo $fc(), "\n";
$nm = (new Base)->name(...); echo $nm(), "\n";
echo match(true) { $o instanceof Thing => 'thing', $o instanceof Base => 'base', default => 'none' }, "\n";
echo $o instanceof /* inline */ Base ? 'b' : 'n', "\n";
$cl = 'x'; echo $o instanceof Contract && !$o instanceof Thing ? "chain\n" : "nochain\n";
