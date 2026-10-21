<?php
// a namespaced function declared in an included file: call sites before and after the include
namespace App;
echo file_get_contents('a'), "\n";
require __DIR__ . '/fixtures/r3_fallback_ns.php';
echo file_get_contents('b'), "\n";
echo \call_user_func(fn() => file_get_contents('c')), "\n";
