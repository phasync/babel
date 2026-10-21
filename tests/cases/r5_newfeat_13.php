<?php
// Variable variables ($$n, ${expr}, ->$$p, ->{$$m}(), $$n::) as bases of computed callees and classes.
class O { public $p = 'strtoupper'; public $c = 'Orig\Thing'; public $q = 'p'; public $o2;
  function m() { return 'strtoupper'; } static function s() { return 'Orig\Thing'; } function __construct() { $this->o2 = $this; } }
$o = new O; $name = 'o'; $nn = 'name'; $cls = 'Orig\Thing'; $cn = 'cls'; $prop = 'p'; $pp = 'prop'; $meth = 'm'; $mm = 'meth';
echo $$name->m()('a'), "\n";
echo $$$nn->m()('b'), "\n";
echo ${'o'}->m()('c'), "\n";
echo ${$$nn}->m()('d'), "\n";
echo $$cn::who(), "\n";
echo ${'cls'}::who(), "\n";
echo ${'c' . 'ls'}::$p, "\n";
echo ($o->$$pp)('e'), "\n";
echo $o->$$pp, "\n";
echo $o->$$mm()('f'), "\n";
echo $o->{$$mm}()('g'), "\n";
echo $o->${'meth'}()('h'), "\n";
echo O::$$mm ?? 'unset', "\n";
echo $o::s()::who(), "\n";
echo $$name?->o2?->c::who(), "\n";
$null = null; $nul = 'null';
var_dump($$nul?->c::who());
echo $$name?->{$$mm}()('j'), "\n";
echo "{$$name->m()('k')}", "\n";
echo "{${'o'}->c::who()}", "\n";
