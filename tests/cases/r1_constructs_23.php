<?php
class K {
    public static function eval($c) { return "static-eval($c)"; }
    public static function include($p) { return "static-include($p)"; }
}
echo K::eval('x'), "\n";
echo K::include('y'), "\n";
echo [K::class, 'eval']('cb'), "\n";
echo fopen('after'), "\n";
