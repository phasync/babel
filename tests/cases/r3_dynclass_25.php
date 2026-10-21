<?php
// Anonymous classes around dynamic class expressions
$c = 'Orig\Thing';
echo (new class { const X = 'Orig\Thing'; })::X::who(), "\n";
echo (new class { public static $p = 'Orig\Thing'; })::$p::who(), "\n";
$o = new class($c) {
    public function __construct(public $c) {}
    public function m() { return $this->c::who() . '/' . $this::class; }
    public static function s() { return static::class; }
};
echo $o->m() === 'Repl\Thing/' . get_class($o) ? 'ok' : 'bad', "\n";
echo $o::s() === get_class($o) ? 'ok' : 'bad', "\n";
echo (new class extends Orig\Thing {})::who(), "\n";
echo get_parent_class(new (get_class(new class extends Orig\Base {}))), "\n";
