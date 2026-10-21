<?php
// eval with function call arguments and trailing comma, eval in closures/arrow fns
$f = fn($c) => eval($c);
echo $f('return fopen(1);'), "\n";
$g = function () { $loc = 2; return eval('return $loc * 2 . fopen(1);'); };
echo $g(), "\n";
foreach (['1+1', 'fopen(1)'] as $c) { echo (fn() => eval("return $c;"))(), "\n"; }
function ev($c) { return call_user_func('eval_it', $c); }
function eval_it($c) { return eval($c); }
echo ev('return sleep(2);'), "\n";
$e = 'eval';
echo isset($e) ? "ok\n" : '';
echo eval('return "a";') . eval('return "b";'), "\n";
