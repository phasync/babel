<?php
// shims with named and mixed spreads
$o = new Repl\Thing;
var_dump(is_a(...['object_or_class' => $o, 'class' => 'Orig\Thing']));
var_dump(class_exists(...['Orig\Thing', 'autoload' => false]));
var_dump(is_subclass_of(...[$o, 'Orig\Thing']));
$isA = is_a(...);
var_dump($isA(class: 'Orig\Thing', object_or_class: $o));
var_dump(method_exists(...['Orig\Thing', 'who']), property_exists(...['object_or_class' => 'Orig\Thing', 'property' => 'p']));
$args = ['Orig\Thing'];
echo implode(',', get_class_methods(...$args)), "\n";
