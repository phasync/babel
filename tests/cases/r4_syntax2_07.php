<?php
// The pipe operator calls its right operand: a computed callable there is a call through a computed callee.
$f = 'strtoupper';
echo 'a' |> $f, "\n";
echo 'b' |> 'strtoupper', "\n";
echo 'c' |> 'Orig\Thing::who', "\n";
echo 'd' |> ['Orig\Thing', 'who'], "\n";
$cls = 'Orig\Thing';
echo 'e' |> [$cls, 'who'], "\n";
$fs = ['k' => 'fopen'];
echo 'f' |> $fs['k'], "\n";
echo 'g' |> trim(...) |> $f, "\n";
