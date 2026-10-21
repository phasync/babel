<?php
// readonly anonymous classes with attributes, extends/implements mapped names
namespace s06;
use Orig\{Thing, Base, Contract, Attr};
$o = new #[Attr(Thing::class)] readonly class(new Thing) implements Contract {
    public function __construct(public Thing $t) {}
};
echo $o->t::who(), ' ', $o instanceof Contract ? 'c' : '-', "\n";
$a = (new \ReflectionObject($o))->getAttributes()[0];
echo $a->getName(), ' ', $a->getArguments()[0], "\n";
$p = new #[Attr] class extends \Orig\Base {};
echo $p->name(), "\n";
$q = new readonly class { public function __construct(public ?Thing $x = new Thing) {} };
echo $q->x::who(), "\n";
