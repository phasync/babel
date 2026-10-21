<?php
// PHP 8.4 member access on `new` without parentheses, with mapped, computed and anonymous classes.
namespace App;
use Orig\Thing;
$c = 'Orig\Thing';
echo new Thing()::who(), ' ', new Thing()::X, ' ', new Thing()::$p, ' ', new Thing()->who(), "\n";
echo new $c()::who(), ' ', new $c()->who(), ' ', new $c()::X, ' ', \get_class(new $c()), "\n";
echo new (trim($c))()::who(), ' ', new (trim(" $c "))()::X, ' ', new ($c)()::class, "\n";
echo new class { public $c = 'Orig\Thing'; }->c::who(), ' ', new class (fopen('x')) { public function __construct(public $v) {} }->v, "\n";
$o = new \stdClass; $o->k = $c;
echo new $o->k()::who(), ' ', new $o->k()->who(), ' ', (new $o->k)::X, "\n";
echo new \Orig\Thing()::class, ' ', new Thing()?->who(), "\n";
