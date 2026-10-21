<?php
// by-reference parameters and argument unpacking into a callable-taking function: PHP passes the
// elements by reference only when a plain variable is unpacked (each such unpacking of the call);
// an unpacked array element or property is a copy
$cmp = fn ($a, $b) => $b <=> $a;
$a = ['x' => [[3, 1, 2], $cmp]];
usort(...$a['x']);
echo json_encode($a['x'][0]), "\n";
$o = new stdClass; $o->p = [[3, 1, 2], $cmp];
usort(...$o->p);
echo json_encode($o->p[0]), "\n";
// the callable is mapped: preg_replace_callback's $count (by reference) is in the second unpacking
$p = ['/./', 'strtoupper']; $q = ['ab', -1, 0];
echo preg_replace_callback(...$p, ...$q), ' ', $q[2], "\n";
$r = ['/./']; $s = ['strtoupper', 'abc', -1, 0];
echo preg_replace_callback(...$r, ...$s), ' ', $s[3], "\n";
$t = ['/./', 'strtoupper', 'abcd', -1, 0];
echo preg_replace_callback(...$t), ' ', $t[4], "\n";
