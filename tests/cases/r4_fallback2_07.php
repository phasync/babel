<?php
// each class using a trait gets its own copy of the trait's methods, with its own call site cache
namespace App;
trait T {
    function go() { return strtoupper('t'); }
    static function sgo() { return strtoupper('s'); }
}
class A { use T; }
class B { use T; }
echo (new A)->go(), ' ', A::sgo(), "\n";
eval('namespace App; function strtoupper($x) { return "local"; }');
echo (new A)->go(), ' ', A::sgo(), ' ', (new B)->go(), ' ', B::sgo(), "\n";
