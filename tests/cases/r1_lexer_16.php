<?php
namespace A;
use Orig\Thing;
use Orig\Base;
// closures returning closures, anon classes in args, class in function in class
function mk(): \Closure { return fn(Thing $t) => function (Base $b) use ($t): Thing { return $t; }; }
echo get_class((mk())(new Thing)(new Base)), "\n";
echo get_class(new Thing(...[])) , "\n";
function take($o) { return get_class($o->fopen(1)) . $o->sleep(2) . $o::strtoupper(3); }
echo take(new class extends Base {
    public function fopen($x): Thing { return new Thing; }
    public function sleep($x) { return 'S'; }
    public static function strtoupper($x) { return 'U' . fopen('in'); }
    public function name() { return fopen('n') . parent::name(); }
}), "\n";
class Outer {
    public function run(Thing $t) {
        $mk = function () {
            return new class(new Thing) extends Base {
                use \Orig\Tr;
                public function __construct(public Thing $t) {}
                public function get(): Thing { return $this->t; }
            };
        };
        $o = $mk();
        function nested_in_method(Thing $t) { return fopen('nm'); }
        return [$o->who(), get_class($o->get()), get_parent_class($o), $o->name()];
    }
}
echo json_encode((new Outer)->run(new Thing)), "\n";
echo nested_in_method(new Thing), "\n";
$r = new \ReflectionClass(new class { public function m(Thing $a, Base ...$rest): ?Base { return null; } });
echo $r->getMethod('m')->getParameters()[1]->getType(), ' ', $r->getMethod('m')->getReturnType(), "\n";
