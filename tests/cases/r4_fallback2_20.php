<?php
// a mapped class-name function: its arguments are treated alike whether the call is global, a plain
// namespaced fallback, or guarded by a polyfill that is not taken
namespace Y { function isa(...$a) { return 'Y:isa(' . implode(',', $a) . ')'; } function cuf($f, ...$a) { return 'Y:cuf(' . (is_string($f) ? $f : 'arr:' . $f[0]) . ')'; } }
namespace {
    $b = new phasync\Babel\Babel(['is_a' => 'Y\isa', 'call_user_func' => 'Y\cuf', 'strtoupper' => 'Hook\strtoupper'], ['Orig\Thing' => 'Repl\Thing']);
    phasync\Babel\Runtime::configure($b);
    $code = $b->translate('<?php
namespace G { function g($c) { return is_a($c, "Orig\Thing") . " " . call_user_func("strtoupper") . " " . call_user_func([$c, "who"]); } }
namespace A { function g($c) { return is_a($c, "Orig\Thing") . " " . call_user_func("strtoupper") . " " . call_user_func([$c, "who"]); } }
namespace P {
    if (\PHP_INT_SIZE === 1) { function is_a() {} function call_user_func() {} }
    function g($c) { return is_a($c, "Orig\Thing") . " " . call_user_func("strtoupper") . " " . call_user_func([$c, "who"]); }
}
namespace { $c = "Orig\Thing"; echo G\g($c), "\n", A\g($c), "\n", P\g($c), "\n"; }
', '/x/a.php');
    eval('?>' . $code);
}
