<?php
// Unpacking a Traversable into a by-reference parameter warns and passes by value.
function cmp($a, $b) { return $a <=> $b; }
function gen() { yield [3, 1, 2]; yield 'cmp'; }
var_dump(usort(...gen()));
$ao = new ArrayObject([[2, 1], 'cmp']);
var_dump(usort(...$ao));
echo json_encode($ao[0]), "\n";
