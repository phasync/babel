<?php
// Pipe operands: nullsafe chains, escaped literals, parenthesised FCC on a nullsafe static chain, generators, eval.
class O { public $c = 'Orig\Thing'; public $fs = ['k' => 'strtoupper']; public $o; function __construct() { $this->o = $this; } }
$o = new O; $x = 'abc';
echo $x |> $o?->fs['k'], "\n";
echo $x |> $o?->o?->fs['k'] |> 'strrev', "\n";
echo $x |> "\x73trtoupper", "\n";
echo $x |> ($o?->c::who(...)), "\n";
$g = (function () use ($x) { yield $x |> 'strtoupper'; yield 'k' => $x |> $this->fs['k']; })->call($o);
foreach ($g as $k => $v) echo "$k:$v\n";
echo eval('return "e" |> "strtoupper";'), "\n";
echo eval('$q = "strtoupper"; return "e" |> $q;'), "\n";
echo $x |> (static fn ($v) => $v), "\n";
