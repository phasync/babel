<?php
// new Reflection*(<constant expression>) in constant-expression positions (param default, global const, attribute argument).
namespace App;
const TARGET = 'Orig\Thing';
const R = new \ReflectionClass(TARGET);
#[\Attribute] class At { public function __construct(public $r) {} }
class K {
    const T = 'Orig\Thing';
    public function m(\ReflectionClass $r = new \ReflectionClass(self::T), $p = new \ReflectionProperty(TARGET, 'p')) { return $r->getName() . ' ' . $p->class; }
}
#[At(new \ReflectionClassConstant(K::T, 'X'))]
function g() {}
// The constant class name may stay unmapped (no run time hook is possible there); it must compile and run.
$n = static fn ($s) => \str_replace('Orig\\', 'Repl\\', $s);
echo $n(R->getName()), ' ', $n((new K)->m()), ' ', \str_replace('orig', 'repl', (new \ReflectionFunction('App\g'))->getAttributes()[0]->newInstance()->r->getValue()), "\n";
