<?php
namespace A;
use Orig\Thing;
class M {
    public function class(Thing $t) {
        echo static::class, fopen('in-class'), "\n";
        function declared_in_class_method() { return 'own'; }
        return fopen('r');
    }
    public static function interface() {
        static $n = 0;
        echo static::class, sleep(1), "\n";
    }
    public function trait(): Thing { return new Thing; }
}
$m = new M;
echo $m->class(new Thing), "\n";
M::interface();
echo get_class($m->trait()), "\n";
function fopen_wrapper() { return fopen('w'); }
echo fopen_wrapper(), "\n";
