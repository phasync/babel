<?php
// Static props, constants and dynamic constant fetch (8.3) yielding class names
class R {
    public static $p = 'Orig\Thing';
    const C = 'Orig\Thing';
    public static $arr = ['k' => 'Orig\Thing'];
    public static function f() { return 'Orig\Thing'; }
    public static function t() {
        return [static::$p::who(), self::C::who(), static::C::X, self::$arr['k']::who(), static::f()::who(), self::{'C'}::who()];
    }
}
echo R::$p::who(), "\n";
echo R::C::who(), "\n";
echo R::$arr['k']::who(), "\n";
echo R::f()::$p, "\n";
$k = 'C';
echo R::{$k}::who(), "\n";
echo 'Orig\Thing'::{'X'}, "\n";
$x = 'Orig\Thing';
echo $x::{'X'}, "\n";
echo implode(',', R::t()), "\n";
