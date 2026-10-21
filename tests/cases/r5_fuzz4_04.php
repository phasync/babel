<?php
// '::class' / '::CONST' after a nullsafe chain with a static access (the end of the short circuit):
// translating the translation again must not wrap it in another Runtime::cls()
namespace NA;
class H { public $nx = null; public $o; public static function sc() { return new \stdClass; } public static function cn() { return 'Orig\Thing'; } }
$h = new H; $h->o = $h;
var_dump($h?->o::sc()::class);
try { var_dump($h?->nx::sc()::class); } catch (\Error $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
var_dump($h?->o::cn()::X);
$f = fn() => $h?->o::cn()::X;
var_dump($f());
