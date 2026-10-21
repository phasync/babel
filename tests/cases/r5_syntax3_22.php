<?php
// the pipe operator: right operands of every callee form, with comments, newlines and nested pipes
namespace N;
class Inv { public $f = 'strtoupper'; public function __invoke($x) { return "inv($x)"; } public static function s($x) { return "s($x)"; } }
$f = 'strtoupper'; $g = fn() => 'fopen'; $o = new Inv; $a = ['f' => 'strtoupper', 'c' => 'N\Inv'];
echo 'a' |> $f, "\n";
echo 'b' |> $g(), "\n";
echo 'c' |> 'strtoupper' |> $f, "\n";
echo 'd'
    |> /* c */ $o->f
    // n
    |> $a['f'], "\n";
echo 'e' |> new Inv(), ' ', 'f' |> $o, "\n";
echo 'g' |> strtoupper(...), ' ', 'h' |> \strtoupper(...), "\n";
echo 'i' |> [$a['c'], 's'], ' ', 'j' |> 'N\Inv::s', ' ', 'k' |> $a['c'] . '::s', "\n";
echo 'l' |> (fn($x) => strtoupper($x)), ' ', 'm' |> ($f), "\n";
echo ('n' |> $f) . ('o' |> $g()), "\n";
echo 'p' |> $f |> strlen(...) |> (fn($n) => $n * 2), "\n";
echo strlen('q' |> $f) === 15 ? 'yes' : 'no', "\n";
