<?php
// The right operand of |> is a complete operand when it is a class constant, a global constant, a
// static call or a static call on an object: each is called like (K::F)($x), so it must be mapped.
class K { const F = 'strtoupper'; public static function make() { return 'strtoupper'; } }
const G = 'strtoupper';
$x = 'abc';
$o = new K;
echo $x |> K::F, "\n";
echo $x |> G, "\n";
echo $x |> K::make(), "\n";
echo $x |> $o::make(), "\n";
echo $x |> \K::F |> 'strtolower', "\n";
