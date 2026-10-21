<?php
// a nullsafe chain with a static link, in parentheses, as the base of another nullsafe chain with a
// static link: both are one chain (parentheses do not end the short circuit)
class H { public $k = 'H'; public $c = 'Orig\Thing'; public static function mk() { return new H; } }
$a = new H; $z = null;
echo ($a?->k::mk())?->c::who(), "\n";
echo (($a?->k)::mk())?->c::who(), "\n";
echo (($a?->k)::mk())->c::who(), "\n";
var_dump(($z?->k::mk())?->c::who());
var_dump((($z?->k)::mk())->c::who());
echo (($a?->k::mk())?->k::mk())?->c::$p, "\n";
echo ($a?->k::mk())->c::who(), ' ', ($a?->k::mk())::mk()->k, "\n";
var_dump(($z?->k::mk())->c::who(), ($z?->k::mk()?->c)::$p);
