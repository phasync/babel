<?php
class K {
    public static function eval($c) { return "static:" . $c; }
    public function __call($n, $a) { return "call:$n:" . $a[0]; }
    public static function __callStatic($n, $a) { return "cs:$n:" . $a[0]; }
    const EVAL = 'const';
}
$o = new K;
echo K::eval('x'), "\n";
echo K::EVAL, "\n";
echo $o->eval('y'), "\n";
echo $o?->eval('z'), "\n";
$k = 'K';
echo $k::eval('w'), "\n";
echo (new K)::eval('v'), "\n";
echo K::{'eval'}('u'), "\n";
$c = K::eval(...);
echo $c('t'), "\n";
