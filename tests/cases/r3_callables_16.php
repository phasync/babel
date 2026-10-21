<?php
// PHP 8.5: a closure in a constant expression whose namespace declares the function only conditionally
namespace R3cb16;
if (PHP_VERSION_ID < 0) {
    function strtoupper($s) { return "local:$s"; }
}
const C = static function () { return strtoupper('x'); };
echo (C)(), "\n";
class K { const D = static function () { return strtoupper('y'); }; }
echo (K::D)(), "\n";
