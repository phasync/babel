<?php
// a static access after a nullsafe chain can be followed by more static accesses: the short circuit
// covers the whole chain ($a?->b::m()::n() is null when $a is null, without evaluating any argument)
class Box { public $p = 'Orig\Thing'; public ?Box $n = null; }
function side($x) { echo "side:$x\n"; return $x; }
$box = new Box; $nul = null;
var_dump($nul?->p::who(side(1))::who(side(2)));
var_dump($box?->p::who(side(3))::who(side(4)));
var_dump($nul?->p::$p::who(side(5)));
var_dump($nul?->p::who()::$p);
var_dump($box?->p::who()::$p);
var_dump($nul?->p::who(...[side(6)])::$p[0]);
var_dump($box?->p::who()::who()::who());
