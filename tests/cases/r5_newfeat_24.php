<?php
// A `new` expression with a member chain (PHP 8.4) or a match expression as the right operand of |>: the result
// is called, like (new K()->m())($x).
class K { public $p = 'strtoupper'; function m() { return 'strtoupper'; } }
$x = 'abc';
$k = 'K';
echo $x |> new K()->m(), "\n";
echo $x |> new $k()->p, "\n";
echo $x |> new class { function m() { return 'strtoupper'; } }->m(), "\n";
echo $x |> new class { function __invoke($v) { return "inv:$v"; } }, "\n";
echo $x |> match (true) { default => 'strtoupper' }, "\n";
echo $x |> match ($x) { 'abc' => ['Orig\Thing', 'who'] }, "\n";
