<?php
// Translation time must stay linear: 4000 nullsafe static calls in one array literal (linear: ~0.1s).
class C { public static function m() { return 1; } }
$a = new stdClass;
$a->b = 'C';
$code = 'return [' . str_repeat('$a?->b::m(), ', 4000) . '];';
$t = microtime(true);
$r = eval($code);
echo array_sum($r), ' ', microtime(true) - $t < 2 ? 'fast' : 'SLOW', "\n";
