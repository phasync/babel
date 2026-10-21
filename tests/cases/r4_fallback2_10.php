<?php
// closures in constant expressions (PHP 8.5): param defaults (re-evaluated per call), class constants, property
// defaults, attribute arguments, static initialisers; their call sites keep the first choice like any closure
namespace App;
class Box { function __construct(public $f) {} }
#[\Attribute(\Attribute::TARGET_ALL)] class At { function __construct(public $f) {} }
function a($x = [1, [new Box(static function () { return strtoupper('a'); })]]) { return ($x[1][0]->f)(); }
class C {
    const K = [[static function () { return strtoupper("k"); }]];
    public static $p = [static function () { return strtoupper('p'); }];
    public $q = [static function () { return strtoupper("q"); }];
    #[At(static function () { return strtoupper('m'); })]
    function m($d = static function () { return strtoupper('d'); }) { return $d(); }
}
function st() { static $s = [static function () { return strtoupper('st'); }]; return $s[0](); }
echo a(), (C::K[0][0])(), (C::$p[0])(), ((new C)->q[0])(), (new C)->m(), st(), "\n";
$at = (new \ReflectionMethod(C::class, 'm'))->getAttributes()[0]->newInstance();
echo ($at->f)(), "\n";
eval('namespace App; function strtoupper($s) { return "<$s>"; }');
echo a(), (C::K[0][0])(), (C::$p[0])(), ((new C)->q[0])(), (new C)->m(), st(), "\n";
echo ($at->f)(), "\n";
$at = (new \ReflectionMethod(C::class, 'm'))->getAttributes()[0]->newInstance();
echo ($at->f)(), "\n";
