<?php
// guarded arguments that start or end at the same token as other wrappers (nested guarded calls,
// computed class names, spreads) with a polyfill that is taken for one function and not for another
namespace App;
if (!\function_exists('App\class_exists')) {
    function class_exists($c, $a = true) { return "App:ce(" . (is_string($c) ? $c : get_class($c)) . ")"; }
}
if (\PHP_INT_SIZE === 1) { function is_a() {} function get_parent_class() {} }
$c = 'Orig\Thing';
$o = new \Repl\Thing;
$k = ['c' => $c];
echo class_exists($k['c']), ' ', class_exists(is_a($o, $c) ? $c : 'none'), "\n";
var_dump(is_a(is_a($c, $c, true) ? $c : 'x', $k['c'], true));
var_dump(is_a($o::class === "x" ? 1 : $o, $c));
var_dump(get_parent_class(new class extends \Orig\Base {}) === \Repl\Base::class);
echo class_exists(...[$c]), ' ', class_exists(c: $c), "\n";
