<?php
// performance: nested calls of class-name / callable functions (is_a(is_a(...))) and their argument
// lists must translate in linear time
use phasync\Babel\Babel;
$map = require __DIR__ . '/../map.php';
$b = new Babel($map['functions'], $map['classes']);
$n = 4000;
$src = '<?php ' . str_repeat('is_a($x, ', $n) . '$y' . str_repeat(')', $n) . ';';
$t = hrtime(true);
$out = $b->translate($src, '/x/perf.php');
$ms = (hrtime(true) - $t) / 1e6;
echo substr_count($out, 'Runtime::cls('), "\n";
echo $ms < 1000 ? "fast\n" : "slow: $ms ms\n";
