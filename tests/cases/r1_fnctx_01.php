<?php
interface HasFopen { public function fopen(string $p): string; public static function &sleep(); }
trait fopenTrait { public function usleep() { return 'trait-usleep'; } }
enum Mode: string { case fopen = 'f'; case Sleep = 's'; const strtoupper = 'c';
    public static function curl_exec(): string { return 'enum-curl'; } }
class fopen { const sleep = 'const-sleep'; public $fopen = 'prop'; public static $usleep = 'sprop';
    public function fopen($x = null) { return 'm-fopen'; }
    public function &array_map() { static $r = 'm-array_map'; return $r; }
    public static function stream_select() { return 's-stream_select'; } }
class Impl extends fopen implements HasFopen {
    public function fopen($x = null): string { return 'impl-fopen:' . parent::fopen(); }
    public static function &sleep() { static $v = 'impl-sleep'; return $v; } }
const file_get_contents = 'CONST';
define('curl_exec', 'DEF');
class fopenUser { use fopenTrait; function go() { return $this->usleep(); } }
$o = new fopen; $n = null; $i = new Impl;
echo $o->fopen(), ' ', $o?->fopen(), ' ', $n?->fopen(), '|', $n?->fopen()->fopen(), "\n";
echo $o->fopen, ' ', fopen::sleep, ' ', fopen::$usleep, ' ', fopen::stream_select(), ' ', $o->array_map(), "\n";
echo $i->fopen(), ' ', Impl::sleep(), ' ', Mode::fopen->value, Mode::Sleep->value, Mode::strtoupper, ' ', Mode::curl_exec(), "\n";
echo file_get_contents, ' ', constant('curl_exec'), ' ', (new fopenUser)->go(), "\n";
goto fopen;
echo "skipped\n";
fopen:
echo "label ok\n";
function named(string $fopen = 'd', string $sleep = 'e') { return "$fopen/$sleep"; }
echo named(fopen: 'A'), ' ', named(sleep: 'B', fopen: 'C'), "\n";
$arr = ['fopen' => 1, 'sleep' => 2]; echo $arr['fopen'] + $arr['sleep'], "\n";
echo 'fopen("x")', " sleep(1) // fopen()\n"; // fopen('x')
/* fopen('x') */ # sleep(2)
echo <<<'N'
fopen('x') sleep(1)
N . "\n";
echo <<<H
plain fopen('x') $o->fopen {$o->fopen()}
H . "\n";
