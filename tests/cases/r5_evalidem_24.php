<?php
// parentheses around a callee at the base of a nullsafe chain: (Box::$mk)() is not Box::$mk()
class Box {
    public static $mk;
    public static $next;
    public $c = 'Orig\Thing';
    public static function __callStatic($n, $a) { return 'callStatic'; }
}
Box::$next = new Box;
Box::$mk = fn () => Box::$next;
try {
    echo (Box::$mk)()?->c::who(), "\n";
} catch (Error $e) {
    echo get_class($e), ': ', $e->getMessage(), "\n";
}
$f = [Box::class, 'nope'];
echo ($f)(), "\n";
$g = fn () => Box::$next;
echo ($g)()?->c::who(), "\n";
