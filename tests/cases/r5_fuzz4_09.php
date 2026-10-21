<?php
// a parenthesised callee called before the first '?->' of a chain with a static access: the guard
// must hold the call's result, and the callee is a computed callee
namespace NA;
class H { public $d = 'Orig\Thing'; }
function mk() { return new H; }
function no() { return null; }
$f = 'NA\mk'; $z = 'NA\no'; $o = new \stdClass; $o->x = 'NA\mk';
var_dump(($f)(1)?->d::who());
var_dump(($z)(1)?->d::who());
var_dump(($o?->x)(1)?->d::who());
