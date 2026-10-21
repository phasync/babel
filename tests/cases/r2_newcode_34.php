<?php
// Anonymous classes with hooks inside hook bodies, and hooks inside anonymous classes created in method args.
class Outer {
    public object $inner {
        get => new class(new Orig\Thing) {
            public function __construct(public Orig\Thing $t { set(Orig\Thing $v) { $this->t = $v; } }) {}
            public Orig\Base $b { get => new Orig\Base; }
        };
    }
}
$o = (new Outer)->inner;
echo get_class($o->t), ' ', get_class($o->b), ' ', strtoupper('x'), "\n";
$x = array_map(fn() => 1, [new class { public Orig\Thing $q { get => new Orig\Thing; } }]);
echo $x, "\n";
