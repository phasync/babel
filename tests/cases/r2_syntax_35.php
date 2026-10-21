<?php
// asymmetric visibility on static properties and in anonymous classes (public private(set) static)
namespace s35;
use Orig\Thing;
class S { public private(set) static ?Thing $one = null; public static function init() { self::$one = new Thing; } }
S::init();
echo S::$one::who(), "\n";
