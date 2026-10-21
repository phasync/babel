<?php
// A method named with a keyword (list, new, fn, ...) is a method, not a closure: PHP keeps the namespace
// fallback of its call sites once resolved, like in any other method.
namespace App;

class C {
    public function list() { return fopen('x'); }
    public static function new() { return sleep(1); }
    public function plain() { return fopen('y'); }
}
$c = new C;
echo $c->list(), ' ', C::new(), ' ', $c->plain(), "\n";
eval('namespace App; function fopen() { return "App-fopen"; } function sleep() { return "App-sleep"; }');
echo $c->list(), ' ', C::new(), ' ', $c->plain(), "\n";
