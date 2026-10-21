<?php
// Two static accesses in one nullsafe chain: each `::` sees the same `?->` links.
class K { public $k = 'K'; public $c = 'Orig\Thing'; static function me() { return new K; } function self() { return $this; } }
$n = null; $o = new K;
var_dump($o?->k::me()?->c::who());
var_dump($n?->k::me()?->c::who());
// one `?->`, two `::` after it: both are part of the short-circuited chain
var_dump($o?->k::me()->c::who());
var_dump($n?->k::me()->c::who());
var_dump($o?->c::who()::who());
var_dump($n?->c::who()::who());
var_dump($o?->k::me()->c::$p);
var_dump($n?->c::$p::$p);
