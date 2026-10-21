<?php
// The class of a static access is the value of a static property: A::$c::x(), $a::$b::X, static::$c::who().
class Holder { public static $cls = 'Orig\Thing'; static function viaStatic() { return static::$cls::who(); } }
$h = 'Holder';
echo Holder::$cls::who(), "\n";
echo $h::$cls::X, "\n";
echo Holder::viaStatic(), "\n";
