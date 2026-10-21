<?php
class K {
    public function make() { return static::build(fopen('x'), sleep(1)); }
    public static function build(...$a) { return implode(',', $a); }
    public function class() { return static::build(fopen('a')); }
    public function trait() { return static::build(strtoupper('a'), usleep(1)); }
    public function interface() { static $n = 0; return self::build(fopen('i'), ++$n); }
}
$k = new K;
echo $k->make(), "\n", $k->class(), "\n", $k->trait(), "\n", $k->interface(), "\n";
