<?php
// new with a variable chain followed by constructor arguments
class A { public function __construct(public $v = 'none') {} }
class Box { public $m = 'A'; public $arr = ['k' => 'Orig\Thing']; public static $s = 'Orig\Thing'; }
$o = new Box();
$args = ['x'];
$n = 'o';
echo get_class(new $o->m('a')), ' ', (new $o->m('a'))->v, "\n";
echo get_class(new $o->arr['k']()), "\n";
echo get_class(new $$n->arr['k']), "\n";
echo (new $o->m(...$args))->v, "\n";
echo get_class(new $o::$s()), "\n";
echo get_class(new $o->arr['k'](...[])), "\n";
$list = [new $o->arr['k'], new $o->m];
echo get_class($list[0]), ',', get_class($list[1]), "\n";
