<?php
// nullsafe chains with static links split by comments and newlines, in arrow functions, match arms,
// array keys, ternaries, argument lists and return statements
class H { public $k = 'H'; public $c = 'Orig\Thing'; public static function mk() { return new H; } }
$h = new H; $z = null;
echo $h # one
    ?->k // two
    ::mk() /* three */
    ?->c
    ::who(), "\n";
$f = fn($x) => $x?->k::mk()?->c::who();
echo $f($h), ' ', var_export($f($z), true), "\n";
echo match (true) { $z?->k::mk() === null => 'null-arm', default => 'x' }, ' ', match ($h?->k::mk()?->c::$p) { 'repl' => 'repl-arm', default => 'other' }, "\n";
$arr = [$h?->c::who() => 1, 'k' => $z?->c::who()];
var_dump($arr);
echo $z?->c::who() ? 'y' : 'n', ($h?->c::who() ?: 'e'), "\n";
function r($o) { return $o?->k::mk()?->c::$p; }
echo r($h), var_export(r(null), true), "\n";
echo implode(',', [strlen($h?->c::who()), $h?->k::mk()->c::$p]), "\n";
