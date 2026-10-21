<?php
// class-name functions called with the reserved-word named argument "class:"
namespace s36;
$o = new \Orig\Thing;
$n = 'Orig\Thing';
echo is_a(object_or_class: $o, class: 'Orig\Thing') ? 'a' : '-';
echo is_a($o, class: $n) ? 'b' : '-';
echo class_exists(class: 'Orig\Thing', autoload: false) ? 'c' : '-';
echo count(get_class_vars(class: $n)), ' ';
echo (new \ReflectionProperty(class: 'Orig\Thing', property: 'p'))->class, ' ';
echo (new \ReflectionClassConstant(class: $n, constant: 'X'))->getValue(), "\n";
