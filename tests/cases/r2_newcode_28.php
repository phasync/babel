<?php
// Keyword method names and static calls to them; magic-constant-named methods and enum cases.
class M {
    public static function include($x) { return "inc:$x"; }
    public function __FILE__() { return 'mf'; }
    public static function eval($c) { return "ev:$c"; }
    public function require_once() { return __FUNCTION__ . basename(__FILE__); }
}
enum E { case __DIR__; case eval; }
$m = new M;
echo M::include(fopen('x', 'r')), ' ', $m->__FILE__(), ' ', M::eval('1'), ' ', $m?->require_once(), ' ', E::__DIR__->name, E::eval->name, "\n";
$f = M::include(...);
echo $f(__DIR__ === dirname(__FILE__) ? 'same' : 'diff'), "\n";
