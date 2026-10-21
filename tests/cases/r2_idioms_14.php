<?php
namespace Cfg;

use Orig\Thing;
use Orig\Attr;

const UPPER = strtoupper(...);
const MAKE = static function (string $cls = Thing::class): Thing { return new Thing; };

#[Attr(static function (Thing $t): Thing { return $t; })]
#[Attr(v: strtoupper(...))]
final class Handlers
{
    public const UP = strtoupper(...);
    public const \Closure WHO = static function (): string { return Thing::who() . '|' . strtoupper('x'); };
    public \Closure $factory = static function (?Thing $t = null): Thing { return $t ?? new Thing; };
    public ?Thing $after = null;
    public static \Closure $map = array_map(...);

    public function run(\Closure $f = static function (Thing $t): string { return $t::class . strtoupper('y'); }): string
    {
        return $f(new Thing);
    }
}

echo (UPPER)('a'), ' ', get_class((MAKE)()), "\n";
echo (Handlers::UP)('b'), ' ', (Handlers::WHO)(), "\n";
$h = new Handlers;
echo get_class(($h->factory)()), ' ', get_class(($h->factory)(new Thing)), "\n";
echo (Handlers::$map)(null, []), ' ', $h->run(), "\n";
$attrs = (new \ReflectionClass(Handlers::class))->getAttributes();
$rp = new \ReflectionProperty(Handlers::class, 'after');
echo $rp->getType(), ' ', $attrs[0]->getName(), "\n";
echo get_class($attrs[0]->getArguments()[0](new Thing)), ' ', $attrs[1]->getArguments()['v']('c'), "\n";
