<?php
class K {
    public function require($p) { return "m-require($p)"; }
    public function __get($n) { return "get:$n"; }
}
$k = new K;
echo "interp: {$k->require('w')}\n";
echo "prop: $k->include\n";
echo $k?->require('n'), "\n";
echo $k->include, $k->eval, $k->__FILE__, $k->__DIR__, "\n";
echo fopen('x'), "\n";
