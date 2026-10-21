<?php
// callable and class arguments of a fallback call that reaches a namespaced function stay unmapped
namespace App;
if (!\function_exists('App\array_map')) {
    function array_map($f, $a) { return 'App:array_map(' . (is_string($f) ? $f : 'closure') . ')'; }
    function is_a($o, $c, $s = false) { return "App:is_a($c)"; }
    function call_user_func($f, ...$a) { return "App:cuf($f)"; }
}
echo array_map('strtoupper', ['a']), "\n";
echo is_a('Orig\Thing', 'Orig\Thing', true), "\n";
echo call_user_func('fopen'), "\n";
