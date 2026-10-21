<?php
// silence operator, match arms, nullsafe/ternary contexts, generators and by-ref closures around the check
namespace App;
function gen() { yield strtoupper('g'); yield from [fopen('h')]; }
echo @fopen('x'), ' ', match (true) { default => strtoupper('m') }, ' ', implode(',', iterator_to_array(gen(), false)), "\n";
$s = static fn() => usleep(1);
echo $s(), ' ', (fn() => sleep(1))(), ' ', strtoupper(...)('q'), ' ', (strtoupper(...))('r'), "\n";
echo \strlen(strtoupper('abc')), ' ', strtoupper(strtoupper('n')), "\n";
