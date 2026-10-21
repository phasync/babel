<?php
namespace App;
use Orig\Thing as Enum;

function enum() { return 'App\enum'; }
function readonly() { return 'App\readonly'; }
class Mixed_ {
    public $enum = 'pe';
    public $readonly = 'pr';
    const CLASS_ = 1;
    public static function match($x) { return 'match:' . $x; }
    public function fn() { return fopen('fn'); }
    public function exit() { return 'exit'; }
    public static function new() { return new static; }
    public function list() { return [enum(), Enum::who()]; }
}
echo enum(), ' ', Enum::class, ' ', Enum::who(), "\n";
$m = Mixed_::new();
echo $m->enum, ' ', $m->readonly, ' ', Mixed_::match(strtoupper('x')), ' ', $m->fn(), ' ', $m->exit(), "\n";
echo implode(',', $m->list()), "\n";
$e = new Enum;
echo $e instanceof Enum ? 'yes' : 'no', ' ', $e::class, ' ', Enum::X, ' ', Enum::$p, "\n";
echo \strlen(...)('abc'), ' ', \App\enum(...)(), "\n";
