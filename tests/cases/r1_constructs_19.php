<?php
$r = include __DIR__ . '/fixtures/r1_halt_inc.php';
echo json_encode($r), "\n";
echo __COMPILER_HALT_OFFSET__ > 0 ? "has\n" : "zero\n";
$x = fopen('a');
echo $x, "\n";
echo substr(implode('', file(__FILE__)), __COMPILER_HALT_OFFSET__), "|\n";
__halt_compiler();DATA fopen('d')
