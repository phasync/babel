<?php
// 'Class::method' strings and [class, method] arrays: leading backslash, odd case, keys, ::class, variables
$c = 'Orig\Thing';
$m = 'who';
$list = [
    call_user_func('\Orig\Thing::who'),
    call_user_func('orig\THING::WHO'),
    call_user_func("Orig\\Thing::who"),
    call_user_func("\\Orig\\Thing::who"),
    call_user_func(['\Orig\Thing', 'who']),
    call_user_func([\Orig\Thing::class, 'who']),
    call_user_func(array('orig\thing', 'who')),
    call_user_func([0 => 'Orig\Thing', 1 => 'who']),
    call_user_func([1 => 'who', 0 => 'Orig\Thing']),
    call_user_func([$c, 'who']),
    call_user_func([$c, $m]),
    call_user_func("$c::$m"),
    call_user_func($c . '::' . $m),
    '\Orig\Thing::who'(),
    'ORIG\thing::who'(),
    ('\Orig\Thing::who')(),
];
echo implode(',', $list), "\n";
$f = '\Orig\Thing::who';
echo $f(), "\n";
$k = ['Orig\Thing', 'who'];
echo $k(), ' ', $k(...)(), "\n";
