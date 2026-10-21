<?php
// PHP 8.5 first-class callables and static closures in constant expressions: global const,
// class const, property default, param default, static var
namespace s09;
use Orig\Thing;
const F = strtoupper(...);
const G = static function (Thing $t): Thing { return $t; };
class C {
    const H = fopen(...);
    public $cb = sleep(...);
    public static $sc = static function (?Thing $t = null): string { return \usleep(1) . ($t ?? new Thing)::who(); };
    public function m($f = file_get_contents(...)) { return $f('x'); }
}
echo (F)('a'), "\n";
echo (G)(new Thing)::who(), "\n";
echo (C::H)('x'), ' ', ((new C)->cb)(1), ' ', (C::$sc)(), ' ', (new C)->m(), "\n";
function s() { static $f = curl_exec(...); return $f(1); }
echo s(), "\n";
