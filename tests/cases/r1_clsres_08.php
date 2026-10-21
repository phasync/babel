<?php
namespace dyn;
$cls = 'Orig\Thing';
$cls2 = '\Orig\Base';
$obj = new \Repl\Thing;
$none = 'Nope';
echo get_class(new $cls), ' ', get_class(new $cls2), ' ', get_class(new $obj), "\n";
echo $cls::who(), ' ', $cls::X, ' ', $cls::$p, ' ', $obj::who(), ' ', $obj::X, "\n";
echo $obj::class, "\n";
var_dump($obj instanceof $cls, $obj instanceof $cls2, $obj instanceof $obj, new \Repl\Base instanceof $cls2, $obj instanceof $none);
