<?php
// translation time must stay linear in the nesting depth of calls: nested class-name calls in a namespace
// with a polyfill (each enclosing call scans the whole argument list again); four times deeper may take
// about four times longer, not sixteen
$b = new phasync\Babel\Babel(['strtoupper' => 'Hook\strtoupper'], ['Orig\Thing' => 'Repl\Thing']);
$time = function (int $n) use ($b) {
    $src = "<?php\nnamespace App;\nif (\\PHP_INT_SIZE === 1) { function is_a() {} }\n\$o = 1;\n\$r = " . str_repeat('is_a($o, ', $n) . "'x'" . str_repeat(')', $n) . ";\nvar_dump(\$r);\n";
    $best = INF;
    for ($k = 0; $k < 3; $k++) {
        $t = microtime(true);
        $out = $b->translate($src, "/x/deep$n.php");
        $best = min($best, microtime(true) - $t);
    }
    return [$best, $out];
};
[$t1] = $time(200);
[$t2, $out] = $time(800);
echo $t2 < 8 * $t1 + 0.02 ? "linear\n" : sprintf("superlinear: %.3fs for 200, %.3fs for 800\n", $t1, $t2);
phasync\Babel\Runtime::configure($b);
eval('?>' . $out);
