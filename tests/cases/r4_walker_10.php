<?php
// Binary-prefixed double quoted strings: the opening token is 'b"' (or 'B"'), not '"'.
$s = 'strtoupper'; $c = 'Orig\Thing'; $p = 'upper';
echo b"1 {$s('a')} {$c::who()}", "\n";
echo B"2 {$s('a')}" . "{$s('b')}", "\n";
echo "3 ", b"strto{$p}"('a'), "\n";
