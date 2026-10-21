<?php
// nullsafe chains with static links whose base is a computed call, nested in strings and arrays
class H { public $c = 'Orig\Thing'; public ?H $n = null; public $fs = ['k' => 'strtoupper'];
  public function m() { return $this; } public function c() { return 'Orig\Thing'; } }
$h = new H; $h->n = new H; $z = null;
$f = fn() => $h;
echo $f()?->c::who(), "\n";
var_dump($z?->c::who($undefined));
echo $f()?->n?->c::$p, "\n";
echo ($f()?->m())?->c::who(), "\n";
echo $h->m()?->m()->c::who(), "\n";
var_dump($z?->m()->c::who()::who());
echo $h?->fs['k']('q'), "\n";
echo $h?->c::who() . "x", "\n";
var_dump($z?->c::$p ?? 'dflt');
echo "{$h?->c::who()}\n";
echo <<<E
{$h?->c::who()} {$z?->c::who()}|
E;
echo "\n", [$h?->c::who()][0], "\n";
