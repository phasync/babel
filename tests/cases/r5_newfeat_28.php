<?php
// A parenthesised right operand of |> that starts with `static` is a closure only when `fn` or
// `function` follows: (static::$f) and (static::make()) are computed callees.
class K {
    public static $f = 'strtoupper';
    public static function make() { return 'strtoupper'; }
    public static function run($x) {
        echo $x |> (static::$f), "\n";
        echo $x |> (static::make()), "\n";
        echo $x |> (static fn ($v) => "fn:$v"), "\n";
        echo $x |> (self::$f), "\n";
    }
}
K::run('abc');
