<?php
namespace A;
use Orig\Thing;
class C {
    public function m(Thing $t) { return 'm'; }
    public static function s(Thing $t) { return 's'; }
    public function fopen($x) { return 'method-fopen'; }
    public static function sleep($x) { return 'static-sleep'; }
    public function list() { return 'list'; }
    public function class() { return 'class'; }
    public function enum() { return 'enum'; }
    public function match() { return 'match'; }
    public function fn() { return 'fn'; }
    public function new() { return 'new'; }
    public function array_map() { return 'am'; }
    const array_map = 1;
    const FOPEN = 'c';
}
$o = new C;
$m = $o->m(...);
$s = C::s(...);
echo get_class(new \ReflectionFunction($m)) , "\n";
echo $o->fopen(1), C::sleep(1), $o->list(), $o->class(), $o->enum(), $o->match(), $o->fn(), $o->new(), $o->array_map(), "\n";
echo $m(new Thing), $s(new Thing), "\n";
$fo = $o->fopen(...);
echo $fo(1), ' ', (C::sleep(...))(1), "\n";
$enum = 1; $match = 3; $fn = 4;
function enum() { return fopen('e'); }
echo enum(), "\n";
echo \A\enum(), "\n";
echo $o?->fopen(2), C::array_map, "\n";
