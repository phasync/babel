<?php
namespace Symfony\Polyfill\Io;

final class Io
{
    const sleep = 'const-sleep';
    public static function fopen(string $f, string $m = 'r'): string { return 'Io::fopen(' . \fopen($f, $m) . ')'; }
    public function sleep(int $s): string { return 'Io->sleep'; }
    public static function strtoupper(string $s): string { return 'Io::strtoupper/' . strtoupper($s); }
    public static function call(): string { return static::fopen('a') . ' ' . self::strtoupper('b') . ' ' . (new static)->sleep(1) . ' ' . static::sleep; }
    public function __call($n, $a) { return "__call:$n"; }
    public static function __callStatic($n, $a) { return "__callStatic:$n"; }
}

class Child extends Base2 { public static function fopen(...$a): string { return 'Child/' . parent::fopen(...$a); } }
class Base2 { public static function fopen(...$a): string { return 'Base2/' . fopen(...$a); } }

echo Io::call(), "\n";
echo Io::fopen('x'), ' ', Child::fopen('y'), "\n";
$io = new Io;
echo $io->usleep(1), ' ', Io::usleep(2), ' ', $io?->file_get_contents(), ' ', $io->{'curl_exec'}(), "\n";
echo Io::sleep, ' ', \Symfony\Polyfill\Io\Io::sleep, "\n";
$fn = function_exists('Symfony\Polyfill\Io\fopen') ? 'yes' : 'no';
echo $fn, "\n";
goto sleep;
echo "skipped\n";
sleep:
echo named(sleep: 3, fopen: 'x'), "\n";
function named(int $sleep, string $fopen): string { return "$sleep/$fopen/" . sleep($sleep); }
echo usleep(...)(1), ' ', \usleep(...)(1), ' ', namespace\named(1, 'z'), "\n";
