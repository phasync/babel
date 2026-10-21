<?php
namespace a;
// A::$prop / static::$prop used as class with :: or instanceof (laravel `static::$factory::new()`,
// matomo `$x instanceof self::$mainEngine`); `new static::$c` is already handled
class H {
    public static $c = 'Orig\Thing';
    public static function t() { return static::$c::who(); }
    public static function i($o) { return $o instanceof self::$c; }
}
echo H::$c::who(), "\n";
echo H::t(), "\n";
var_dump(H::i(new \Repl\Thing));
