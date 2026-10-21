<?php
namespace Illuminate\Support\Facades;

use Orig\Thing;

abstract class Facade
{
    protected static array $resolved = [];
    protected static array $aliases = ['T' => 'Orig\Thing', 'DB' => \PDO::class];

    abstract protected static function getFacadeAccessor(): string;

    public static function getFacadeRoot(): object
    {
        $name = static::getFacadeAccessor();
        return static::$resolved[$name] ??= new $name('sqlite::memory:');
    }

    public static function __callStatic(string $method, array $args): mixed
    {
        $instance = static::getFacadeRoot();
        return $instance::$method(...$args);
    }

    public static function alias(string $k): string
    {
        $cls = static::$aliases[$k];
        return $cls::class ?? '';
    }

    public static function constOf(string $k, string $c): mixed
    {
        $cls = static::$aliases[$k];
        return constant($cls . '::' . $c) . '/' . $cls::X;
    }
}

final class ThingFacade extends Facade
{
    protected static function getFacadeAccessor(): string { return 'Orig\Thing'; }
}

echo ThingFacade::who(), ' ', get_class(ThingFacade::getFacadeRoot()), "\n";
echo Facade::constOf('T', 'X'), "\n";
$m = 'who';
echo Thing::$m(), ' ', Thing::{'who'}(), ' ', [Thing::class, 'who'](), ' ', call_user_func(Thing::class . '::who'), "\n";
$x = 'Orig\Thing';
echo $x::who(), ' ', $x::X, ' ', $x::$p, ' ', $x::{'who'}(), "\n";
$arr = ['c' => 'Orig\Thing'];
echo $arr['c']::who(), ' ', $arr['c']::$p, "\n";
