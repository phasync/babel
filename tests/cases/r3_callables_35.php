<?php
// callable literals in odd spellings: case, leading backslash, escapes, binary prefix, trailing spread
$rest = ['x'];
echo call_user_func('FOPEN', 'x'), ' ', 'FoPeN'('x'), ' ', ('\fopen')('x'), "\n";
$f = '\FOPEN';
echo $f('x'), ' ', call_user_func("fop\x65n", 'x'), ' ', call_user_func(b'fopen', 'x'), "\n";
echo call_user_func('fopen', ...$rest), ' ', call_user_func_array('fopen', $rest), "\n";
echo \closure::FROMCALLABLE('fopen')('x'), ' ', \Closure::fromCallable(callback: ['\Orig\Thing', 'who'])(), "\n";
echo ReflectionMethod::createFromMethodName('Orig\Thing::who')->invoke(null), "\n";
echo 'Orig\Thing::who'(...)(), ' ', "Orig\\Thing::who"(), "\n";
