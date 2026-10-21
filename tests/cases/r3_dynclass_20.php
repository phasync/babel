<?php
// Static variable initializers (8.3 arbitrary expressions), arrow bodies, match arms, named and spread args
function init() {
    static $v = ('Orig' . '\Thing')::who();
    static $w = [(fn () => 'Orig\Thing')()::X];
    return $v . ',' . $w[0];
}
echo init(), "\n";
$c = 'Orig\Thing';
$g = fn ($x) => $x::who();
echo $g($c), "\n";
echo match (true) { $c::X === 'repl' => 'mapped', default => 'not' }, "\n";
function two($a, $b) { return "$a/$b"; }
echo two(b: $c::X, a: $c::who()), "\n";
echo two(...[$c::$p, $c::who()]), "\n";
function gen() { $k = yield; echo (yield $k::X), "\n"; }
$gn = gen();
$gn->current();
$gn->send('Orig\Thing');
echo $gn->current(), "\n";
