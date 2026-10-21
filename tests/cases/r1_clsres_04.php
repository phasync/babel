<?php
$r = new Repl\Thing;
$b = new Repl\Base;
$e = new Repl\Err('x');
$j = fn($v) => var_export($v, true);
echo $j(is_a($r, 'Orig\Thing')), $j(is_a($r, '\Orig\Thing')), $j(is_a($r, "Orig\\Thing")), $j(is_a($r, "\\orig\\THING")), $j(is_a($b, 'Orig\Thing')), "\n";
echo $j(is_a('Repl\Thing', 'Orig\Thing', true)), $j(is_a('Repl\Thing', 'Orig\Thing')), "\n";
echo $j(is_subclass_of($e, 'Exception')), $j(is_subclass_of($e, 'Orig\Err')), $j(is_subclass_of('Repl\Err', 'Orig\Err')), $j(is_subclass_of($r, 'Orig\Thing')), "\n";
echo $j(class_exists('Orig\Thing')), $j(class_exists('\Orig\Thing')), $j(class_exists('Orig\Contract')), $j(interface_exists('Orig\Contract')), $j(trait_exists('Orig\Tr')), $j(enum_exists('Orig\Thing')), "\n";
echo $j(method_exists('Orig\Thing', 'who')), $j(method_exists($r, 'who')), $j(method_exists('Orig\Base', 'name')), $j(property_exists('Orig\Thing', 'p')), $j(property_exists($r, 'p')), "\n";
echo $j(get_parent_class(new Repl\Err)), $j(get_parent_class('Orig\Err')), "\n";
echo $j(class_implements('Orig\Contract')), $j(class_parents('Orig\Err')), $j(class_uses('Orig\Tr')), "\n";
echo $j(get_class_methods('Orig\Thing')), $j(get_class_vars('Orig\Thing')), "\n";
echo (new ReflectionClass('Orig\Thing'))->getName(), (new ReflectionClass("\\Orig\\Base"))->name, (new ReflectionClass($r))->name, "\n";
echo (new ReflectionMethod('Orig\Thing', 'who'))->class, (new ReflectionProperty('Orig\Thing', 'p'))->class, (new ReflectionClassConstant('Orig\Thing', 'X'))->class, "\n";
echo (new \ReflectionClass('Orig\Err'))->getParentClass()->name, "\n";
