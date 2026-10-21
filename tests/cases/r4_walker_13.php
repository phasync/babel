<?php
// A nullsafe chain in two pairs of parentheses before '::' still short-circuits in PHP.
$o = new class { public $c = 'Orig\Thing'; }; $n = null;
var_dump((($o?->c))::who());
var_dump((($n?->c))::who());
var_dump(((($n?->c)))::$p);
