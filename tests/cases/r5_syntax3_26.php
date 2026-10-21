<?php
// PHP 8.3 static variable initializers are arbitrary expressions (not constant expressions)
namespace N;
use Orig\Thing;
function g($f, $c) {
    static $a = fopen('x'), $b = 'strtoupper'('y');
    static $d = $f('z') . "{$f('w')}";
    static $e = $c::who() . (new $c)::X . Thing::X;
    static $h = [Thing::class, 'who'];
    return "$a $b $d $e " . $h();
}
echo g('strtoupper', 'Orig\Thing'), "\n";
echo g('strrev', 'stdClass'), "\n";
class K {
    public static function m($c) { static $x = $c::$p, $y = \strtoupper(...); return $x . $y('q'); }
}
echo K::m('Orig\Thing'), "\n";
