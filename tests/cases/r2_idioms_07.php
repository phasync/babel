<?php
namespace Lib;

use Orig\{Thing, Base};
use function strtoupper as up;

class Secret extends Base { private $v = 'hidden'; private static $s = 'static-hidden'; }

$peek = function () { return $this->v . ':' . $this->name(); };
echo \Closure::bind($peek, new Secret, Secret::class)(), "\n";
$st = static function (): string { return static::$s . '/' . self::class . '/' . get_parent_class(self::class); };
echo \Closure::bind($st, null, Secret::class)(), "\n";
echo $peek->call(new Secret), "\n";
$who = static fn () => static::who();
echo \Closure::bind($who, null, Thing::class)(), "\n";
echo $who->bindTo(null, Thing::class)(), "\n";
echo (fn () => static::X)->bindTo(null, \Orig\Thing::class)(), "\n";
$f = \Closure::fromCallable('fopen');
echo gettype($f('php://memory', 'r')), "\n";
$g = \Closure::fromCallable(up(...));
echo $g('a'), ' ', (up(...))('b'), ' ', \Closure::fromCallable([Thing::class, 'who'])(), "\n";
$m = (new \ReflectionClass(Thing::class))->getMethod('who')->getClosure();
echo $m(), "\n";
