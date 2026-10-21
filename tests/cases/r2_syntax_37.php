<?php
// class expression read from a static property, then used as a class: H::$cls::who(), static::$cls::X
namespace s37;
class H {
    public static $cls = 'Orig\Thing';
    public static function viaStatic() { return static::$cls::who() . ' ' . self::$cls::X; }
}
echo H::$cls::who(), "\n";
echo H::viaStatic(), "\n";
$o = new \Orig\Thing;
echo $o instanceof H::$cls ? "yes\n" : "no\n";
