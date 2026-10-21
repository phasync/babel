<?php
// A double quoted callee / class whose interpolation contains another interpolated double quoted string.
$o = new class { function m($x) { return $x; } }; $p = 'upper'; $t = 'Thing';
echo "1 ", "strto{$o->m("{$p}")}"('a'), "\n";
echo "2 ", "Orig\\{$o->m("{$t}")}"::who(), "\n";
echo "3 ", "strto{$o->m("up")}per"('a'), "\n";
echo "4 ", "strto{$o->m("{$p[0]}")}pper"('a'), "\n";
