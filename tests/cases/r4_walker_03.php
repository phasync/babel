<?php
// A long list (array literal / argument list) of nullsafe static accesses must translate in linear time:
// each element must not rescan all elements before it to find its enclosing bracket.
$b = new phasync\Babel\Babel([], ['Orig\Thing' => 'Repl\Thing']);
$src = '<?php $x = fn($c) => [' . str_repeat('$c?->a::m(), ', 4000) . '];';
$t = microtime(true);
$out = $b->translate($src, '/x.php');
$dt = microtime(true) - $t;
echo $dt < 1.5 ? "fast\n" : "slow\n";
echo substr_count($out, 'Runtime::cls('), "\n";
