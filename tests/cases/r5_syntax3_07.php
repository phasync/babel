<?php
// short circuit of nullsafe chains with static links: where it ends and what is still evaluated
class K { public $c = 'Orig\Thing'; public static $arr = ['k' => 'v']; public $o; }
class W { public static $p = ['k' => 'Orig\Thing']; public static function who() { return 'Orig\Thing'; } public static function me() { return new K; } }
$z = null; $k = new K; $k->o = new K; $w = 'W';
$t = function ($l) { echo "eval:$l "; return $l; };
var_dump($z?->c::who()[$t(1)]);
var_dump($z?->c::$p[$t(2)]);
var_dump($z?->c::who()::$p);
var_dump($z?->o->c::who($t(3))?->x);
var_dump($z?->c::{'who'}($t(4)));
var_dump(isset($z?->c::who()[0]));
var_dump($z?->c::who() === null);
try { var_dump($z?->c::who()($t(5))); } catch (\Error $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
try { var_dump($z?->c::X); } catch (\Error $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
echo $k?->c::{'who'}(), ' ', $k?->o?->c::$p, ' ', $k->o?->c::who()[0], "\n";
echo $w::me()?->c::who(), ' ', $w::$p['k']::who(), "\n";
echo W::me()?->c::who(), "\n";
var_dump(W::me()?->o?->c::who());
