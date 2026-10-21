<?php
// A double quoted string with interpolation as the right operand of |> is a computed callee too.
$y = 'upper';
$x = 'abc';
echo $x |> "strto{$y}", "\n";
echo $x |> "strto$y" |> 'strrev', "\n";
$n = 'Thing';
echo $x |> "Orig\\{$n}::who", "\n";
