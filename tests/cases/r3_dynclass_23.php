<?php
// Callables stored in static property arrays of a (dynamic) class: A::$arr['k'](...), $c::$arr['k'](...)
class H { public static $fns = ['up' => 'strtoupper', 'who' => 'Orig\Thing::who', 'arr' => ['Orig\Thing', 'who']]; }
echo H::$fns['up']('x'), "\n";
echo H::$fns['who'](), "\n";
echo H::$fns['arr'](), "\n";
$c = 'H';
echo $c::$fns['up']('x'), "\n";
