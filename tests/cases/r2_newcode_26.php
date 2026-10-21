<?php
// new $x::$p / instanceof $x::$p: the static property is read from the class $x names, which is mapped.
$real = unserialize('O:10:"Orig\\Thing":0:{}');
(new ReflectionClass($real))->setStaticPropertyValue('p', 'Orig\Base');
Repl\Thing::$p = 'Orig\Err';
$x = 'Orig\Thing';
echo get_class(new $x::$p), "\n";
var_dump(new Repl\Err instanceof $x::$p);
