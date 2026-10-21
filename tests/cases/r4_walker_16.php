<?php
const CN = 'Orig\Thing';
class K { const C = 'Orig\Thing'; public static $b = 'Orig\Thing'; public static $f = 'strtoupper'; public static $o; public $c = 'Orig\Thing'; public $k = 'K';
  static function cls() { return static::class::who(); } static function m() { return 'strtoupper'; } }
K::$o = new K; $o = new K; $c = 'K'; $cn = 'c'; $bn = 'b';
echo 1, Orig\Thing::class::who(), \Orig\Thing::class::X, "\n";
echo 2, (CN)::who(), (K::C)::$p, ('Orig\Thing')::who(), "\n";
echo 3, array('Orig\Thing', 'who')(), ['Orig\Thing', 'who'](), array(K::C, 'who')(), [CN, 'who'](), "\n";
echo 4, get_class(new K::$b), get_class(new $c::$b), get_class(new $$cn::$$bn), "\n";
echo 5, K::$o->c::who(), K::$o->k::$b::who(), $c::$o->c::who(), "\n";
echo 6, ($o->k::$f)('a'), (K::$f)('a'), ($c::$f)('a'), "\n";
echo 7, $$cn::$$bn::who(), $c::$b::$p, "\n";
echo 8, K::m(...)()('a'), (K::m(...))()('a'), "\n";
