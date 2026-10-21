<?php
class K {
    public static function __callStatic($n, $a) { return "cs:$n(" . implode(',', $a) . ")"; }
    public function __call($n, $a) { return "c:$n(" . implode(',', $a) . ")"; }
}
echo K::eval('x'), "\n";
echo K::include('y'), "\n";
echo K::require_once('y'), "\n";
echo (new K)->eval('x'), "\n";
echo fopen('after'), "\n";
