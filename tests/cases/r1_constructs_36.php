<?php
class M {
    public function __FILE__() { return 'method-named-file:' . fopen(1); }
    public static function __DIR__() { return 'static-method-named-dir'; }
    public function __LINE__() { return 'line'; }
    const __CLASS__X = 1;
}
$m = new M;
echo $m->__FILE__(), ' ', M::__DIR__(), ' ', $m->__file__(), ' ', $m->__LINE__(), "\n";
echo basename(__FILE__), "\n";
