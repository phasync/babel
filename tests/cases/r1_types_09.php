<?php
use Orig\Thing;
use Orig\Base;

function orig(string $c) { return unserialize('O:' . strlen($c) . ':"' . $c . '":0:{}'); }

// anonymous class whose constructor arguments contain braces (closure, match, nested anonymous class)
$a = new class(function () { return 1; }) extends Base {
    public Thing $p;
    public function __construct(public $cb) {}
    public function m(Thing $t): ?Thing { return $t; }
};
$b = new class(match (true) { default => 2 }) {
    public ?Thing $q = null;
    public function __construct(public int $n) {}
    public function m(Base|Thing $t): Base|Thing { return $t; }
};
$c = new class(new class { public int $z = 1; }) {
    public function __construct(public object $inner) {}
    public function m(Thing $t, ?Base $b = null): Thing { return $t; }
    public ?Base $p = null;
};
$d = new class(fn() => [1, 2]) implements Orig\Contract {
    public function __construct(public $f) {}
    public function m(Thing $t) {}
};
foreach ([$a, $b, $c, $d] as $k => $o) {
    echo $k, ': ';
    foreach ((new ReflectionClass($o))->getMethods() as $m) {
        if ($m->getName() === '__construct' || $m->getName() === 'name') continue;
        echo $m->getName(), '(', $m->getParameters()[0]->getType(), ')', $m->getReturnType(), ' ';
    }
    foreach ((new ReflectionClass($o))->getProperties() as $p) { if ($p->getType()) echo $p->getName(), ':', $p->getType(), ' '; }
    echo get_parent_class($o) ?: '-', ' ', implode(',', class_implements($o)), "\n";
}
try { $a->m(orig('Orig\Thing')); echo "a accepted Orig\n"; } catch (TypeError) { echo "a rejects\n"; }
try { $c->m(orig('Orig\Thing')); echo "c accepted Orig\n"; } catch (TypeError) { echo "c rejects\n"; }
try { $d->m(orig('Orig\Thing')); echo "d accepted Orig\n"; } catch (TypeError) { echo "d rejects\n"; }
