<?php
// PHP 8.5 closures in constant expressions: the body is ordinary code with the namespace fallback
namespace R3cb13;
if (true) {
    function strtoupper($s) { return "local:$s"; }
}
const C = static function () { return strtoupper('x'); };
echo (C)(), "\n";
function f($cb = static function () { return strtoupper('y'); }) { return $cb(); }
echo f(), "\n";
class K { const D = static function () { $g = 'fopen'; return $g('z') . '/' . strtoupper('z'); }; }
echo (K::D)(), "\n";
