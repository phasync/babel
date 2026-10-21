<?php
// Keyword-named named arguments of class-name / callable functions are found by name.
namespace App;
$t = new \Repl\Thing;
var_dump(is_a(class: 'Orig\Thing', object_or_class: $t));
var_dump(\is_subclass_of(allow_string: true, class: 'Orig\Base', object_or_class: 'Orig\Thing'));
echo implode(',', array_filter(mode: 0, array: ['x'], callback: 'Orig\Thing::who')), "\n";
var_dump(class_exists(autoload: false, class: 'Orig\Thing'));
echo \call_user_func_array(args: [], callback: ['Orig\Thing', 'who']), "\n";
echo \call_user_func(callback: 'Orig\Thing::who'), "\n";
$arr = [2, 1];
usort(callback: static fn ($a, $b) => 0, array: $arr);
var_dump(\is_callable(value: 'Orig\Thing::who', callable_name: $name), $name);
