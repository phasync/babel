<?php
// a polyfill that is not taken: the guarded calls reach the global functions and map their arguments
namespace App;
if (\PHP_INT_SIZE === 1) {
    function is_a($o, $c, $s = false) { return "App:is_a"; }
    function call_user_func($f, ...$a) { return "App:cuf"; }
    function class_exists($c, $a = true) { return "App:class_exists"; }
    function array_map($f, ...$a) { return "App:array_map"; }
}
$cls = 'Orig\Thing';
$args = [$cls, 'Repl\Thing', true];
var_dump(is_a($cls, 'Repl\Thing', true));
var_dump(is_a(...$args));
var_dump(is_a(class: 'Repl\Thing', object_or_class: $cls, allow_string: true));
echo call_user_func([$cls, 'who']), ' ', call_user_func("$cls::who"), "\n";
$f = function () use ($cls) { return class_exists($cls) ? call_user_func($cls . '::who') : 'no'; };
echo $f(), "\n";
$g = is_a(...);
var_dump($g($cls, 'Repl\Thing', true));
echo array_map('fopen', ['x']), "\n";
echo \call_user_func('strtoupper', 'x'), "\n";
