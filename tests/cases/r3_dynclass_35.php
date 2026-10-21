<?php
// Methods named with reserved words, returning class names, followed by '::'
class H {
    public static function new() { return 'Orig\Thing'; }
    public static function list() { return 'Orig\Thing'; }
    public function array() { return ['Orig\Thing']; }
    public function print() { return 'Orig\Thing'; }
    public static function static() { return 'Orig\Thing'; }
    public function match() { return 'Orig\Thing'; }
    public function fn() { return 'Orig\Thing'; }
    public function include() { return 'Orig\Thing'; }
    public function isset() { return 'Orig\Thing'; }
}
$h = new H();
$c = 'H';
echo H::new()::who(), "\n";
echo $c::list()::who(), "\n";
echo $h->array()[0]::who(), "\n";
echo $h->print()::X, "\n";
echo H::static()::who(), "\n";
echo $h->match()::who(), "\n";
echo $h?->fn()::who(), "\n";
echo $h->include()::$p, "\n";
echo $h->isset()::who(), "\n";
