<?php
// Non-strict code calling class-name functions through argument unpacking / first-class callables: scalar arguments are coerced as in the caller's mode.
$args = ['Orig\Thing', 'Orig\Thing', 1];
var_dump(is_a(...$args));
$f = is_subclass_of(...);
var_dump($f('Orig\Thing', 'Orig\Base', 1));
var_dump(class_exists(...['Orig\Thing', 0]));
var_dump(method_exists(...['Orig\Thing', 'who']));
