<?php
// the arguments of a guarded call follow the choice of that call, even when evaluating them re-enters
// the same call site and the namespaced function appears in between
namespace App;
if (\PHP_INT_SIZE === 1) { function is_a() {} } // a polyfill that is not taken: calls are guarded
$o = new \Repl\Thing;
$g = function ($o) use (&$f) {
    eval('namespace App; function is_a($a, $b, $s = false) { return "App:is_a"; }');
    $f(0);
    return $o;
};
$f = function ($n) use (&$g, $o) {
    return is_a($n ? $g($o) : $o, 'Orig\Thing');
};
var_dump($f(1));
