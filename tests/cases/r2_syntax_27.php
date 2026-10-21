<?php
// PHP 8.5 static closure as property default whose body calls a function named get()/set()
namespace s27;
function get($x) { return "get($x)"; }
function set($x) { return "set($x)"; }
class C {
    public $cb = static function () { return get(strtoupper('a')) . set(fopen('b')); };
    public static $sc = static function ($v) { return set(sleep($v)); };
}
echo ((new C)->cb)(), ' ', (C::$sc)(1), "\n";
