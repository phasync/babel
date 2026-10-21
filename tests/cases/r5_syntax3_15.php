<?php
// new-expressions as chain bases: constructor arguments vs. calls of the object, PHP 8.4 new without parentheses
class Inv { public $c = 'Orig\Thing'; public function __construct(public $a = 'fopen') {} public function __invoke($x = null) { return 'strtoupper'; } public function cls() { return 'Orig\Thing'; } }
$c = 'Inv';
$mk = fn() => 'Inv';
echo new $c()('x')('y'), "\n";
echo new $c('sleep')->a, ' ', (new $c('sleep'))->a, "\n";
echo new ($mk())()()('z'), "\n";
echo new ($mk())('usleep')->a, "\n";
echo new Inv()->cls()::who(), ' ', new Inv()->c::$p, "\n";
echo new class { public function __invoke() { return 'strtoupper'; } }()('w'), "\n";
echo new class('Orig\Thing') { public function __construct(public $k) {} }->k::who(), "\n";
echo new #[A] readonly class { public function m() { return 'fopen'; } }->m()('v'), "\n";
echo (new $c)()('u'), ' ', (new $c)->cls()::who(), "\n";
echo new $c()->cls()::who(), "\n";
$o = new Inv;
echo new $o->c()::who(), "\n";
