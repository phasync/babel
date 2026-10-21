<?php
namespace App;
use Orig\Thing;
#[\NoDiscard] function nd() { return fopen('nd'); }
(void) nd();
(void) fopen('v');
(void)$f = 'strtoupper';
(void) ($f)('x');
(void) [Thing::class, 'who']();
echo (string) $f, (int) '3', (bool) sleep(1), (float) '1.5', "\n";
class V { public function __construct(public string $a = 'a', public $b = null) {} }
$v = new V;
$w = clone($v, ['b' => fopen('c'), 'a' => strtoupper('q')]);
echo $w->a, ' ', $w->b, ' ', (clone $v)->a, ' ', (clone($v))->a, "\n";
$cl = clone(...);
echo get_class($cl(new Thing)), "\n";
echo 'x' |> strtoupper(...) |> (fn ($s) => $s . '!') |> trim(...), "\n";
echo nd() |> \strlen(...), "\n";
