<?php
// Dynamic classes inside namespaces, with imports, closures and $this / static forms that must stay
namespace App;
use Orig\Thing as T;
class K {
    public static $p = 'App\K';
    public static function who() { return 'App\K'; }
    public function run() {
        $f = function () { return [$this::who(), static::who(), self::$p, static::class, $this::class]; };
        $s = static fn () => [static::who(), self::who()];
        $c = T::class;
        return implode(',', array_merge($f(), $s(), [$c::who(), (T::class)::who(), ('\Orig\Thing')::who()]));
    }
}
echo (new K)->run(), "\n";
$x = '\\Orig\\Thing';
echo $x::who(), "\n";
$y = 'orig\THING';
echo $y::who(), "\n";
echo \strtolower('Orig\Thing')::who(), "\n";
