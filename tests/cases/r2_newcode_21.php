<?php
// PHP 8.5 closures in constant expressions: property/param defaults, class constants, attribute args.
function get($x) { return 'get:' . $x; }
#[Attribute] class Cb { public function __construct(public Closure $c) {} }
class C {
    const K = static function (Orig\Thing $t): Orig\Thing { return $t; };
    public $f = static function (): string { return get(strtoupper('a')); };
    public $g = static function (Orig\Base $b) { return set_it(fopen('x', 'r')) . get_class($b); };
    #[Cb(static function (PDO $p): string { return get_class($p) . fopen('y', 'r'); })]
    public function m($cb = static function (Orig\Thing $t) { return get_class($t) . get(sleep(1)); }, Orig\Base $after = new Orig\Base) {
        return $cb(new Orig\Thing) . ' ' . get_class($after);
    }
}
function set_it($v) { return "[$v]"; }
$c = new C;
echo get_class((C::K)(new Orig\Thing)), "\n";
echo ($c->f)(), "\n";
echo ($c->g)(new Orig\Base), "\n";
echo $c->m(), "\n";
$a = (new ReflectionMethod(C::class, 'm'))->getAttributes()[0]->newInstance();
echo ($a->c)(new PDO('x')), "\n";
