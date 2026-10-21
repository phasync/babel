<?php
// Double quoted strings rewritten to concatenation, in every position an expression can take.
class K { static function m() { return 'K'; } static function who() { return 'who'; } static $p = 'P'; }
function K() { return 'fnK'; }
$x = 'K';
var_dump("{$x::m()}"::who());
var_dump("{$x::m()}"());
var_dump("{$x::m()}"[0]);
var_dump(new ("{$x::m()}") instanceof K);
var_dump("{$x::m()}"::$p);
var_dump(["{$x::m()}" => 1]);
['K' => $v] = ["{$x::m()}" => 2]; var_dump($v);
["{$x::m()}" => $w] = ['K' => 3]; var_dump($w);
var_dump(match("{$x::m()}") { "{$x::m()}" => 'matched' });
switch ('K') { case "{$x::m()}": echo "case ok\n"; }
var_dump("{$x::m()}{$x::m()}" . "$x{$x::m()}$x");
var_dump(strlen("{$x::m()}") <=> 1, -"1{$x::m()}"[0], !"{$x::m()}", @"{$x::m()}");
