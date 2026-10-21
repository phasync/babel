<?php
namespace A;
use Orig\Thing;
$r = 'abc' |> strtoupper(...);
echo $r, "\n";
$r = 'abc' |> fopen(...) |> strtoupper(...) |> (fn($x) => sleep(1) . $x);
echo $r, "\n";
$r = 'x' |> \fopen(...);
echo $r, "\n";
function ident(Thing $t) { return $t; }
echo get_class(new Thing |> ident(...)), "\n";
#[\NoDiscard]
function nd(): int { return 1; }
$v = nd();
(void) nd();
echo array_first([fopen('a'), 2]), array_last([1, sleep(1)]), "\n";
$o = new \stdClass;
$o2 = clone($o, ['a' => 1] ?? []);
final class W { public function __construct(public readonly int $a = 1, public readonly ?Thing $t = null) { }
  public function with(int $a): static { return clone($this, ['a' => $a]); } }
echo (new W)->with(5)->a, "\n";
const CL = static function (Thing $t): string { return fopen('c'); };
echo (CL)(new Thing), "\n";
