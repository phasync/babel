<?php
// nullsafe chains before '::m()': the short circuit skips the arguments
function side($s) { echo "side:$s\n"; return $s; }
$a = null;
var_dump($a?->b::who(side(1)));
var_dump($a?->b()::who(side(2)));
var_dump($a?->b[0]::who(side(3)));
var_dump(($a?->b)::who(side(4)));
$o = new stdClass();
$o->b = 'Orig\Thing';
var_dump($o?->b::who(side(5)));
