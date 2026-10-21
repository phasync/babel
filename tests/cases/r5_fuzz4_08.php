<?php
// a parenthesised base followed by '::m()' before the first '?->': the guard must hold the value
// of the whole '($a)::c()', not of the parenthesised part
namespace NA;
class H { public $d = 'Orig\Thing'; public static function c() { return new H; } public static function z() { return null; } }
$a = 'NA\H';
var_dump(($a)::c()?->d::who());
var_dump((H::class)::c()?->d::who());
var_dump((\strval($a))::z()?->d::who());
