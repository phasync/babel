<?php
// a polyfill that is not taken: unpacked arguments of a guarded by-reference function stay references
// (usort(...$args) sorts $args[0]); once the namespaced function exists, new call sites reach it unmapped
namespace App;
if (\PHP_INT_SIZE === 1) { function usort(&$a, $c) { return 'never'; } }
$args = [[3, 1, 2], 'strtoupper' === 'x' ? null : fn ($a, $b) => $a <=> $b];
usort(...$args);
echo json_encode($args[0]), "\n";
$cb = ['Orig\Thing', 'who'];
echo array_map(...[$cb, [1]]), ' ', call_user_func(...[$cb]), "\n";
eval('namespace App; function usort(&$a, $c) { $a = ["local", is_string($c) ? $c : "closure"]; return true; }');
$args = [[3, 1, 2], 'strtoupper'];
usort(...$args);
echo json_encode($args[0]), "\n";
