<?php
// translate() time must be linear in the nesting depth of rewritten calls: computed callees
// $f($f(...)), namespace fallback calls fopen(fopen(...)), computed classes $c::m($c::m(...)),
// nullsafe chains with a static access as arguments of each other
$m = require __DIR__ . '/../map.php';
$b = new phasync\Babel\Babel($m['functions'], $m['classes']);
$time = function (string $src) use ($b) {
    $t = hrtime(true);
    $b->translate("<?php\n" . $src, '/x/p.php');
    return (hrtime(true) - $t) / 1e9;
};
foreach ([
    'callee' => fn ($n) => '$v = ' . str_repeat('$f(', $n) . '1' . str_repeat(')', $n) . ';',
    'fallback' => fn ($n) => "namespace a;\n\$v = " . str_repeat('fopen(', $n) . '1' . str_repeat(')', $n) . ';',
    'class' => fn ($n) => '$v = ' . str_repeat('$c::m(', $n) . '1' . str_repeat(')', $n) . ';',
    'nullsafe' => fn ($n) => '$v = ' . str_repeat('$h?->a::b(', $n) . '1' . str_repeat(')', $n) . ';',
    'parens' => fn ($n) => '$v = ' . str_repeat('(', $n) . '$x' . str_repeat(')()', $n) . ';',
] as $name => $g) {
    $small = $time($g(250));
    $big = $time($g(4000));
    // 16 times the input: linear is ~16x, quadratic ~256x
    echo $name, ': ', $big < 40 * max($small, 0.002) ? 'linear' : sprintf('superlinear (%.3fs vs %.3fs)', $big, $small), "\n";
}
