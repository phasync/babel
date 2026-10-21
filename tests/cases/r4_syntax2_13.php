<?php
namespace App;
use Orig\{Attr, Thing, Base, Contract};

function take(object $a, ...$rest) { return get_parent_class($a) . '|' . implode(',', class_implements($a)) . '|' . $a->m() . '|' . implode(',', $rest); }
echo take(new #[Attr(static function () { return fopen('a'); })] class (fopen('ctor')) extends Base implements Contract {
    public function __construct(public $v) {}
    public function m() { return $this->v . '/' . strtoupper('m') . '/' . (new class { public function n() { return \get_class(new Thing); } })->n(); }
}, fopen('z'), new class { public $x = Thing::X; }->x, array_map(null, [1])), "\n";
$o = new #[Attr([Thing::class, 'who'])] class {};
$at = (new \ReflectionObject($o))->getAttributes()[0];
echo $at->getName(), ' ', implode('::', $at->newInstance()->v), "\n";
#[Attr(new Thing)]
function g(#[Attr(static function (Thing $t): Thing { return $t; })] Thing $t = new Thing) { return $t; }
$rf = new \ReflectionFunction('App\g');
echo get_class($rf->getAttributes()[0]->newInstance()->v), ' ', get_class(g()), ' ', get_class(($rf->getParameters()[0]->getAttributes()[0]->newInstance()->v)(new Thing)), "\n";
