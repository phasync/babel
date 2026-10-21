<?php
// new / instanceof with a static property whose name is variable: new $c::$$n, new H::${'p'}
class H { public static $p = 'Orig\Thing'; public static $arr = ['k' => 'Orig\Thing']; }
$c = 'H';
$n = 'p';
$a = 'arr';
echo get_class(new $c::$$n), "\n";
echo get_class(new $c::${'p'}), "\n";
echo get_class(new H::$$n), "\n";
echo get_class(new $c::$arr['k']), "\n";
echo get_class(new H::$$a['k']), "\n";
$o = new Orig\Thing();
var_dump($o instanceof $c::$$n);
var_dump($o instanceof H::${'p'});
