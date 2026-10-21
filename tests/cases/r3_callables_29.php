<?php
// string callables name global functions; the namespace's own functions only when qualified
namespace R3cb29;
function sleep() { return 'R3cb29\sleep'; }
echo call_user_func('R3cb29\sleep'), "\n";
echo call_user_func('\R3cb29\sleep'), "\n";
echo call_user_func('sleep', 1), "\n";
echo call_user_func('\sleep', 1), "\n";
echo call_user_func(__NAMESPACE__ . '\sleep'), "\n";
echo call_user_func(sleep(...)), "\n";
echo call_user_func(\sleep(...), 1), "\n";
$f = 'sleep';
echo $f(1), ' ', 'sleep'(1), ' ', sleep(), "\n";
echo strtoupper('x'), ' ', call_user_func('strtoupper', 'x'), ' ', call_user_func(strtoupper(...), 'x'), "\n";
