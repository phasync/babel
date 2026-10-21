<?php
// performance: deeply nested plain calls g(g(g(...))) (nothing mapped among them) must translate in
// linear time: the constant expression test must not walk the whole bracket stack for every call
use phasync\Babel\Babel;
$map = require __DIR__ . '/../map.php';
$b = new Babel($map['functions'], $map['classes']);
$n = 6000;
$src = '<?php ' . str_repeat('g(', $n) . '1' . str_repeat(')', $n) . ';';
$t = hrtime(true);
$out = $b->translate($src, '/x/perf.php');
$ms = (hrtime(true) - $t) / 1e6;
var_dump($out === $src);
echo $ms < 500 ? "fast\n" : "slow: $ms ms\n";
