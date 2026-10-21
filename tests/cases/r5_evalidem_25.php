<?php
// parentheses do not stop `??` from reading a nullsafe chain as isset() does
$o = new stdClass;
$o->c = 'Orig\Thing';
echo ($o?->c::$nope) ?? 'd1', "\n";
echo (($o?->c::$nope)) ?? 'd2', "\n";
echo ($o?->c::$p['k']) ?? 'd3', "\n";
echo $o?->c::$nope ?? 'd4', "\n";
