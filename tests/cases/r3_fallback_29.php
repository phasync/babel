<?php
// a namespaced function defined in an included file before the first call; include_once of the same file again
namespace App;
require_once __DIR__ . '/fixtures/r3_fallback_ns.php';
echo file_get_contents('a'), "\n";
require_once __DIR__ . '/fixtures/r3_fallback_ns.php';
echo \function_exists('App\file_get_contents') ? "exists\n" : "missing\n";
$f = file_get_contents(...);
echo $f('b'), ' ', (new \ReflectionFunction($f))->getName(), "\n";
