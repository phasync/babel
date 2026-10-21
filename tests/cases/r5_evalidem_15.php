<?php
// unpacking a Traversable into a by-reference parameter warns and passes by value
function gen() { yield [3, 1, 2]; yield 'strcmp'; }
var_dump(usort(...gen()));
$it = new ArrayIterator([[3, 1, 2], fn ($a, $b) => $a <=> $b]);
var_dump(usort(...$it));
echo json_encode($it[0]), "\n";
$ao = new ArrayObject(['b', 'a']);
$x = [[2, 1], 'strcmp'];
var_dump(usort(...$x));
echo json_encode($x[0]), "\n";
eval('var_dump(usort(...$it)); $s = [[2, 1], "Orig\Thing::who"]; var_dump(@usort(...$s));');
