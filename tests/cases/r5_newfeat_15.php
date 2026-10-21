<?php
// '&' binds looser than |>: in `$x |> $f & $m` the operand is $f alone (the '&' before a variable is
// T_AMPERSAND_FOLLOWED_BY_VAR_OR_VARARG), so it is called as a computed callee.
$f = 'strtoupper'; $x = 'abc'; $m = 'HOOK:strtoupper';
var_dump($x |> $f & $m);
var_dump($x |> $f & 'HOOK:strtoupper');
var_dump(($x |> $f) & $m);
