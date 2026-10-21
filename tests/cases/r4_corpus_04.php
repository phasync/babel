<?php
// r4 (probe): unpacking an array variable into a function with by-reference parameters passes its elements
// by reference (usort(...$args) sorts $args[0], preg_replace_callback(...$p) sets $p[4]). The translation
// unpacks the array returned by Runtime::spread('usort', 0, $args), a copy: the caller's array is left as it was.
$args = [[3, 1, 2], fn ($x, $y) => $x <=> $y];
usort(...$args);
echo implode(',', $args[0]), "\n";
$p = ['/a/', fn ($m) => 'b', 'aXa', -1, 0];
preg_replace_callback(...$p);
echo $p[4], "\n";
$w = [[1, 2], function (&$v) { $v *= 10; }];
array_walk(...$w);
echo implode(',', $w[0]), "\n";
