<?php
// the right operand of '|>' is a class constant holding a callable: it is a computed callee
namespace NA;
class K { const F = 'strtoupper'; const S = 'Orig\Thing::who'; }
$o = new K;
var_dump('ab' |> K::F);
var_dump('ab' |> $o::F);
var_dump('ab' |> \NA\K::S);
var_dump('ab' |> K::F |> 'strrev');
