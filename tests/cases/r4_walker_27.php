<?php
$GLOBALS['s'] = 'strtoupper'; $GLOBALS['c'] = 'Orig\Thing';
const F = static function () { return ($GLOBALS['s'])('a') . $GLOBALS['c']::who(); };
echo (F)(), "\n";
class K { const G = static function ($x) { return [$GLOBALS['s']][0]($x) . "{$GLOBALS['c']::who()}"; };
  public $p = static function () { return ($GLOBALS['s'])('p'); }; }
echo (K::G)('b'), "\n";
function f($cb = static function () { return $GLOBALS['c']::$p; }) { return $cb(); }
echo f(), "\n";
