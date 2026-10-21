<?php
// a nullsafe chain before '::' with a dynamic method name {expr} short-circuits like ::m()
class Box { public $p = 'Orig\Thing'; public ?Box $n = null; }
function side($x) { echo "side:$x\n"; return $x; }
$box = new Box; $nul = null; $m = 'who';
var_dump($nul?->p::{$m}(side(1)));
var_dump($box->n?->p::{'who'}(side(2)));
var_dump(($box->n?->p)::{$m}(side(3)));
var_dump($box?->p::{$m}(side(4)));
var_dump($box?->p::{'w' . 'ho'}());
