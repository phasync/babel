<?php
namespace m;
class K {
    public static function make($x) { return $x; }
    public function class() { return static::make(sleep(1)); }
    public static function trait() { return self::make(sleep(2)) . static::make(usleep(3)); }
    public function plain() { return static::make(sleep(4)); }
}
echo (new K)->class(), ' ', K::trait(), ' ', (new K)->plain(), "\n";
