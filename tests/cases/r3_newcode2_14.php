<?php
// Named arguments to the class-name, member and callable aware functions, in any order, with keyword labels.
namespace App;
$o = new \Repl\Thing;
echo \is_a(class: 'Orig\Thing', object_or_class: 'Orig\Thing', allow_string: true) ? 'y' : 'n';
echo is_a($o, class: 'Orig\Thing') ? 'y' : 'n';
echo \is_subclass_of(allow_string: true, class: 'Orig\Base', object_or_class: 'Orig\Base') ? 'y' : 'n';
echo \class_exists(autoload: false, class: 'Orig\Thing') ? 'y' : 'n';
echo \method_exists(method: 'who', object_or_class: 'Orig\Thing') ? 'y' : 'n';
echo \property_exists(property: 'p', object_or_class: 'Orig\Thing') ? 'y' : 'n', "\n";
echo \call_user_func(callback: 'Orig\Thing::who'), ' ', \call_user_func_array(args: [], callback: ['Orig\Thing', 'who']), ' ';
echo \implode(',', \array_filter(callback: 'strtoupper', array: ['a'])), ' ', \array_reduce(initial: '', callback: 'fopen', array: [1]), "\n";
echo \constant(name: 'Orig\Thing::X'), ' ', \defined(constant_name: 'Orig\Thing::X') ? 'y' : 'n', ' ';
echo (new \ReflectionClass(objectOrClass: 'Orig\Thing'))->getName(), ' ', (new \ReflectionProperty(property: 'p', class: 'Orig\Thing'))->class, ' ';
echo (new \ReflectionClassConstant(constant: 'X', class: 'Orig\Thing'))->getValue(), ' ', (new \ReflectionMethod(method: 'who', objectOrMethod: 'Orig\Thing'))->class, "\n";
echo \Closure::fromCallable(callback: 'Orig\Thing::who')(), ' ', \ReflectionMethod::createFromMethodName(method: 'Orig\Thing::who')->class, ' ', \get_parent_class(object_or_class: 'Orig\Thing') === false ? 'nop' : 'par', "\n";
