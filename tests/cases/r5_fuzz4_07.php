<?php
// unpacking a Traversable into a by-reference parameter: PHP warns and passes it by value
$g = (function () { yield [3, 1, 2]; yield fn ($a, $b) => $a <=> $b; })();
var_dump(usort(...$g));
$w = new ArrayIterator([['b', 'a'], 'Orig\Thing::who']);
var_dump(usort(...$w), $w[0]);
