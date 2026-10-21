<?php
// Pipes in static initializers, array literals, match, offsets inside interpolation, arrow bodies, nested pipes.
class A { public static $b = 'Orig\Thing'; public static $f = 'strtoupper'; }
function g() { static $s = 'a' |> 'strtoupper'; return $s; }
echo g(), "\n";
$f = 'strtoupper'; $x = 'abc'; $m = 'HOOK:strtoupper';
var_dump($x |> $f | '');
echo implode(',', array_filter([$x |> $f, $x |> A::$f])), "\n";
echo match ($x |> $f) { 'HOOK:strtoupper' => 'match', default => 'nomatch' }, "\n";
$arr = ['HOOK:strtoupper' => 'key'];
echo $arr[$x |> $f], "\n";
echo "{$arr[$x |> $f]}", "\n";
echo <<<H
  {$arr[$x |> $f]}
  H, "\n";
$fns = [fn($v) => $v |> $f, 2];
echo $fns[0]($x), "\n";
echo $x |> 'Orig\Thing'::who(...), "\n";
$h = fn($n) => 'strtoupper';
echo $x |> ($f |> $h), "\n";
echo $x |> $f ?: 'empty', "\n";
echo $x |> $f <=> 'HOOK:strtoupper', "\n";
