<?php
// the result of a static method named like a language construct (fn, function, use, isset, empty,
// list, eval, exit, declare) is a computed callee: after '::' these stay keyword tokens
class H {
    public static function fn() { return 'strtoupper'; }
    public static function function() { return 'strtoupper'; }
    public static function use() { return 'strtoupper'; }
    public static function isset() { return 'strtoupper'; }
    public static function empty() { return 'strtoupper'; }
    public static function list() { return 'strtoupper'; }
    public static function eval() { return 'strtoupper'; }
    public static function exit() { return 'strtoupper'; }
    public static function declare() { return 'strtoupper'; }
    public function m() { return [static::fn()('i'), self::list()('j')]; }
}
$h = 'H';
echo H::fn()('a'), ' ', H::function()('b'), ' ', H::use()('c'), "\n";
echo H::isset()('d'), ' ', H::empty()('e'), ' ', H::list()('f'), "\n";
echo H::eval()('g'), ' ', H::exit()('h'), ' ', H::declare()('k'), "\n";
echo $h::fn()('l'), ' ', $h::list()('m'), "\n";
echo implode(" ", (new H)->m()), "\n";
