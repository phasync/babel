<?php
// method calls by variable name stay method calls; [$this, 'm']() and static::$n()
class R3cb27 {
    function fopen() { return 'M::fopen'; }
    static function sleep() { return 'M::sleep'; }
    function run() {
        $m = 'fopen';
        $n = 'sleep';
        echo $this->$m(), "\n";
        echo $this?->$m(), "\n";
        echo $this->{$m}(), "\n";
        echo [$this, 'fopen'](), "\n";
        echo [$this, $m](), "\n";
        echo static::$n(), ' ', self::$n(), ' ', $this::$n(), "\n";
        echo [static::class, $n](), "\n";
        echo call_user_func([$this, 'fopen']), ' ', call_user_func('R3cb27::sleep'), "\n";
        $fc = $this->$m(...);
        echo $fc(), "\n";
    }
}
(new R3cb27)->run();
