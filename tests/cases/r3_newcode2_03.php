<?php
// Trait adaptations naming keyword methods without a Trait:: prefix (include as x; __FILE__ as y;).
trait T {
    public function include() { return 'inc'; }
    public function require() { return 'req'; }
    public function eval() { return 'ev'; }
    public function __FILE__() { return 'file'; }
    public function __DIR__() { return 'dir'; }
    public function new() { return 'new'; }
    public function fn() { return 'fn'; }
}
class A {
    use T {
        include as protected incl;
        require as public req2;
        eval as ev2;
        __FILE__ as f2;
        __DIR__ as d2;
        new as n2;
        fn as fn2;
    }
    public function all() { return $this->incl() . $this->req2(); }
}
$a = new A;
echo $a->all(), $a->ev2(), $a->f2(), $a->d2(), $a->n2(), $a->fn2(), "\n";
