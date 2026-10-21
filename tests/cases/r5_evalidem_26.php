<?php
// `??` reads its left operand as isset() does only when that operand is the chain itself:
// with an operator in front, the chain is read normally
$o = new stdClass;
$o->c = 'Orig\Thing';
foreach ([
    fn () => 'x' . $o?->c::$nope ?? 'd1',
    fn () => -$o?->c::$nope ?? 'd2',
    fn () => !$o?->c::$nope ?? 'd3',
    fn () => (string) $o?->c::$nope ?? 'd4',
    fn () => 1 + $o?->c::$nope ?? 'd5',
    fn () => $o?->c::$nope ?? 'd6',
] as $i => $f) {
    try {
        var_dump($f());
    } catch (Error $e) {
        echo $i, ' ', $e->getMessage(), "\n";
    }
}
