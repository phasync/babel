<?php
// `??` fetches its left operand quietly (isset semantics), also a static property behind a nullsafe chain
class Box { public $p = 'Orig\Thing'; public ?Box $n = null; public $arr = []; }
$box = new Box; $nul = null; $c = 'Orig\Thing';
var_dump($box?->p::$nope ?? 'd1');
var_dump($box?->p::$p['k'] ?? 'd2');
var_dump($nul?->p::$p ?? 'd3');
var_dump($c::$nope ?? 'd4');
var_dump($box?->n?->p::$nope ?? 'd5');
var_dump($box?->p::$p ?? 'd6');
