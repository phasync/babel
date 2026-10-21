<?php
// where the short circuit of a nullsafe chain with static links ends: ::CONST, ::class, operators
class H { public $k = 'H'; public static $s = 'Orig\Thing'; public static $n = null; public static function mk() { return new H; } }
$h = new H; $z = null;
echo $h?->k::$s::X, ' ', $h?->k::mk()?->k::$s::X, "\n";
foreach (['$z?->k::$s::X', '$z?->k::class', '$z?->k::mk()::$s::who()', '$z?->k::$s::$p', '$h?->k::$n?->x::$y', '$z?->k::$s . "|"', '$z?->k::$s instanceof H', '-$z?->k::mk()?->k::$s'] as $code) {
    try {
        var_dump(eval("return $code;"));
    } catch (\Throwable $e) {
        echo get_class($e), ': ', $e->getMessage(), "\n";
    }
}
try { var_dump($z?->k::$s::X ?? 'd'); } catch (\Error $e) { echo $e->getMessage(), "\n"; }
