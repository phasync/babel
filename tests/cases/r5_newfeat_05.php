<?php
// PHP 8.4 new without extra parentheses: new $k()->m()(), new (expr)()(), new X()::s()::m() as computed callee and class bases.
class Inv { public $c = 'Orig\Thing'; function __invoke() { return 'strtoupper'; } function m() { return 'strtoupper'; } static function s() { return 'Orig\Thing'; } }
$k = 'Inv';
$f = fn() => 'Inv';
echo new $k()->m()('a'), "\n";
echo new $k()()('b'), "\n";
echo new ($f())()->m()('c'), "\n";
echo new ($f())()()('d'), "\n";
echo new $k()->c::who(), "\n";
echo new $k()::s()::who(), "\n";
echo new Inv()::s()::who(), "\n";
echo (new $k)()('e'), "\n";
echo new Inv()->m()('f'), "\n";
echo new Inv()()('g'), "\n";
$g = fn() => fn() => fn() => 'strtoupper';
echo $g()()()('h'), "\n";
$arr = ['x' => new Inv];
echo new $arr['x']->c()::who() ?? '', "\n";
