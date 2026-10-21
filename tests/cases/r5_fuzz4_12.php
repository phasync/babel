<?php
// 'chain ?? x' reads the whole chain as isset() does: a property read on null (or a non-object) in
// the middle of a chain with several '?->' links and a static access does not warn
namespace NA;
class H { public $a = 'NA\H'; public $z = null; public static function kn() { return null; } public static function ks() { return 'str'; } public static function th() { return 'Orig\Thing'; } }
$h = new H;
var_dump($h?->a::kn()->self?->c ?? 'd1');
var_dump($h?->a::ks()->x->y?->c ?? 'd2');
var_dump($h?->a::kn()['k']?->c ?? 'd3');
var_dump($h?->z->q?->a::th() ?? 'd4');
var_dump($h?->a::th()::$p ?? 'd5');
