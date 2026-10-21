<?php
// 'Class::member' functions (constant, ReflectionMethod::createFromMethodName) reached
// with argument unpacking, as a first-class callable or through a variable: like is_a(...$args)
// and is_a(...) (shims), the 'Class::member' argument must still be mapped.
$a = ['Orig\Thing::X'];
$w = ['Orig\Thing::who'];
echo constant(...$a), "\n";
$k = constant(...); echo $k('Orig\Thing::X'), "\n";
$kn = 'constant'; echo $kn('Orig\Thing::X'), "\n";
echo call_user_func('constant', 'Orig\Thing::X'), "\n";
echo ReflectionMethod::createFromMethodName(...$w)->class, "\n";
$cm = ReflectionMethod::createFromMethodName(...); echo $cm('Orig\Thing::who')->class, "\n";
