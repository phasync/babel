<?php
class K {
    function __FILE__() { return 'mf'; }
    static function __DIR__() { return 'md'; }
    function __COMPILER_HALT_OFFSET__() { return 'mh'; }
}
enum E { case __FILE__; case __DIR__; }
function f(...$a) { return json_encode($a); }
$k = new K;
echo $k->__FILE__(), K::__DIR__(), $k->__COMPILER_HALT_OFFSET__(), E::__FILE__->name, E::__DIR__->name, "\n";
echo f(__FILE__: 1), "\n";
echo f(__DIR__: 2), "\n";
echo f(__COMPILER_HALT_OFFSET__: 3), "\n";
echo strtoupper('x'), "\n";
__halt_compiler();
