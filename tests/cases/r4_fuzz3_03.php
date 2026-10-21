<?php
// translate() time must be linear: a flat list of nullsafe static accesses (each one walked back
// over all the previous elements of the list) and a long chain of computed calls.
$m = require __DIR__ . '/../map.php';
$b = new phasync\Babel\Babel($m['functions'], $m['classes']);
$time = function (string $src) use ($b) {
    $t = microtime(true);
    $b->translate("<?php\n" . $src, '/x/p.php');
    return microtime(true) - $t;
};
foreach ([
    'list' => fn ($n) => '$x = [' . str_repeat('$a?->b::m(), ', $n) . '];',
    'args' => fn ($n) => 'g(' . str_repeat('$a?->b::$p, ', $n) . ');',
    'calls' => fn ($n) => '$f' . str_repeat('[0]()', $n) . ';',
] as $name => $g) {
    $small = $time($g(125));
    $big = $time($g(2000));
    // 16 times the input: linear is ~16x, quadratic ~256x
    echo $name, ': ', $big < 40 * max($small, 0.002) ? 'linear' : sprintf('superlinear (%.3fs vs %.3fs)', $big, $small), "\n";
}
