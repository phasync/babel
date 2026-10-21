<?php
namespace kw;
class K {
    public function include(string $f): string { return "inc($f)"; }
    public function eval(string $c): string { return "ev($c)"; }
    public static function require(): string { return 'req'; }
    public function require_once() { return 'ro'; }
}
$k = new K;
echo $k->include('a'), ' ', $k->eval('b'), ' ', K::require(), ' ', $k->require_once(), "\n";
