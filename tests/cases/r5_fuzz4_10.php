<?php
// '(chain) ?? x': the parenthesised chain is still read as isset() reads it (no warning for the
// property of a string), as without the parentheses
namespace NA;
class H { public $a = 'NA\H'; public static function sc() { return 'str'; } public static function th() { return 'Orig\Thing'; } }
$h = new H;
var_dump($h?->a::sc()->x ?? 'd1');
var_dump(($h?->a::sc()->x) ?? 'd2');
var_dump((($h?->a::sc()?->x)) ?? 'd3');
var_dump(($h?->a::sc()['k']) ?? 'd4');
var_dump(($h?->a::th()::$p) ?? 'd5');
