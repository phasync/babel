<?php
// inherited (not overridden) methods share the parent's call site; overriding ones are their own sites
namespace App;
class P { function go() { return strtoupper('p'); } static function s() { return strtoupper('ps'); } }
class C1 extends P {}
class C2 extends P {}
class C3 extends P { function go() { return parent::go() . '+' . strtoupper('c3'); } }
echo (new C1)->go(), ' ', C1::s(), "\n";
eval('namespace App; function strtoupper($x) { return "local"; }');
echo (new C2)->go(), ' ', C2::s(), ' ', (new C3)->go(), "\n";
