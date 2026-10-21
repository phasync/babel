<?php
class Holder { public function __construct(public mixed $v = null) {} }
class D {
    public function __construct(
        public Holder $h = new Holder(fopen(...)),
        public Closure $c = static function () { return strtoupper('x') . sleep(1); },
        public mixed $fc = null,
    ) {}
    public static function f($a = new Holder([sleep(...), usleep(...)])) { return $a->v; }
    const CB = fopen(...);
}
$d = new D;
echo ($d->h->v)(), ' ', ($d->c)(), ' ', D::f()[1](), ' ', (D::CB)(), "\n";
enum E: string {
    case A = 'a';
    const X = [self::A, strtoupper(...)];
    public static function go() { return (self::X[1])(); }
}
echo E::go(), "\n";
function st() { static $s = fopen('q'); static $t = [sleep(1)]; return $s . json_encode($t); }
echo st(), "\n";
$o = new class(fopen('x'), sleep(1)) extends Holder {
    public function __construct(public $a, $b) { parent::__construct([$a, $b, usleep(1)]); }
};
echo json_encode($o->v), "\n";
