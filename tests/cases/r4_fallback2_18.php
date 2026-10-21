<?php
// translation time must stay linear: a long array literal of nullsafe static calls (a config table)
$b = new phasync\Babel\Babel(['strtoupper' => 'Hook\strtoupper'], ['Orig\Thing' => 'Repl\Thing']);
$src = "<?php\nnamespace App;\n\$r = [\n" . str_repeat("    'k' => \$o?->a::m(),\n", 4000) . "];\n";
$t = microtime(true);
$b->translate($src, '/x/table.php');
$small = microtime(true) - $t;
echo $small < 1.5 ? "fast\n" : sprintf("slow: %.1fs\n", $small);
