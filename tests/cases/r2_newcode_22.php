<?php
// Anonymous classes nested in constructor args of anonymous classes, with attributes, readonly, extends.
namespace ac;
use Orig\Base;
function fopen() { return 'own'; }
$o = new #[\Orig\Attr] class(new class(new readonly class { public function m(Base $b): Base { return $b; } }) extends Base {
        public function __construct(public object $inner) {}
        public function fopen(Base $b) { return fopen(); }
    }, fn(Base $b): Base => $b) extends Base implements \Orig\Contract {
    public function __construct(public object $mid, public \Closure $f) {}
    public function t(Base $x): \PDO|Base { return $x; }
};
echo get_parent_class($o), ' ', get_parent_class($o->mid), ' ', get_class($o->mid->inner->m(new Base)), "\n";
echo get_class(($o->f)(new Base)), ' ', $o->mid->fopen(new Base), ' ', implode(',', class_implements($o)), "\n";
echo (new \ReflectionMethod($o, 't'))->getReturnType(), ' ', (new \ReflectionClass($o))->getAttributes()[0]->getName(), "\n";
