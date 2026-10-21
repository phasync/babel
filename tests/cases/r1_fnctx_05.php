<?php
class K {
    public static function fn(...$a) { return 'fn:' . implode(',', $a); }
    public static function function(...$a) { return 'function:' . implode(',', $a); }
    public static function new(...$a) { return 'new:' . implode(',', $a); }
}
echo K::fn(1, fopen('x')), "\n";
echo K::function(fopen('y'), sleep(1)), "\n";
echo K::new(strtoupper('a')), "\n";
$k = 'K';
echo $k::fn(fopen('z')), "\n";
