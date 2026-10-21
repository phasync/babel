<?php
// performance: a long chain of computed static calls ($c::m()::m()::m()...) must translate in linear
// time (each `::` must not rescan the whole chain looking for a nullsafe link)
use phasync\Babel\Babel;
$map = require __DIR__ . '/../map.php';
$b = new Babel($map['functions'], $map['classes']);
foreach ([500, 4000] as $n) {
    $src = '<?php $c' . str_repeat('::m()', $n) . ';';
    $t = hrtime(true);
    $out = $b->translate($src, '/x/perf.php');
    $ms[$n] = (hrtime(true) - $t) / 1e6;
}
echo substr_count($out, 'Runtime::cls('), "\n";
echo $ms[4000] < 1000 ? "fast\n" : "slow: {$ms[4000]} ms\n";
