<?php
// `??` after a nullsafe chain reads every link of the chain as isset() does (no warnings)
$o = new stdClass;
$o->c = 'Orig\Thing';
$o->e = [];
echo $o?->c::$p?->x?->y ?? 'd1', "\n";
echo $o?->c::$p?->x['k'] ?? 'd2', "\n";
echo $o?->e['nope']?->c::who() ?? 'd3', "\n";
echo $o?->nope?->c::who() ?? 'd4', "\n";
echo $o?->c::who()?->x->y?->z ?? 'd5', "\n";
eval('echo $o?->c::$p?->x?->y ?? "d6", "\n";');
echo "{$o?->c::$p}\n";
