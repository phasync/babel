<?php
// Anonymous classes: constructor arguments, nested in nullsafe static chains, attributes, in interpolation.
$f = fn() => 'strtoupper';
echo new class($f(), 'Orig\Thing'::who()) extends \Orig\Base { function __construct(public $a, public $b) {} }->b, "\n";
echo new class(new class { public $c = 'Orig\Thing'; }) { function __construct(public $in) {} }?->in?->c::who(), "\n";
echo new class { #[\Orig\Attr] function m() { return 'strtoupper'; } }->m()('x'), "\n";
$r = new ReflectionMethod(new class { #[\Orig\Attr('v')] function m() {} }, 'm');
echo $r->getAttributes()[0]->getName(), "\n";
echo (new class { function f() { return new class { function __invoke() { return 'Orig\Thing'; } }; } })->f()()::who(), "\n";
echo "{$f()(new class { function __toString(): string { return 'y'; } })}", "\n";
$o = new class { public $c; function __construct() { $this->c = new class { public $d = 'Orig\Thing'; }; } };
echo "{$o->c->d::who()}", "\n";
echo (new class { const C = ['Orig\Thing', 'who']; }::C)(), "\n";
