<?php
// first-class callables in constant expressions (PHP 8.5) without a namespaced function
namespace App;
const F = strtoupper(...);
class C { const G = fopen(...); public $p = sleep(...); }
#[\Attribute] class A { function __construct(public $f) {} }
#[A(usleep(...))] class D {}
function d($f = file_get_contents(...)) { return $f('d'); }
echo (F)('a'), ' ', (C::G)('b'), ' ', ((new C)->p)(1), ' ', d(), ' ',
    ((new \ReflectionClass(D::class))->getAttributes()[0]->newInstance()->f)(1), "\n";
