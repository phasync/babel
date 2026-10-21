<?php
// The class-name finder on keyword-named and case-varied named arguments, nested class-name calls, Reflection*.
namespace rn;
use ReflectionClass as RC, ReflectionProperty;
$r = new \Repl\Thing;
var_dump(is_a(class: 'Orig\Thing', object_or_class: $r));
var_dump(is_a($r, class: \is_a($r, 'Orig\Thing') ? 'Orig\Thing' : 'X'));
echo (new RC(objectOrClass: 'Orig\Thing'))->getName(), ' ';
echo (new ReflectionProperty(property: 'p', class: 'Orig\Thing'))->class, ' ';
echo (new \ReflectionClassConstant('Orig\Thing', 'X',))->class, ' ';
echo (new \ReflectionMethod(method: 'who', objectOrMethod: 'Orig\Thing'))->class, "\n";
echo implode(',', array_keys(get_class_vars(class: 'Orig\Thing'))), ' ', count(get_class_methods(object_or_class: new RC('Orig\Thing') instanceof RC ? 'Orig\Thing' : 'x')), "\n";
var_dump(interface_exists(interface: 'Orig\Contract'), trait_exists(trait: 'Orig\Tr', autoload: true), enum_exists(enum: 'Orig\Thing'));
