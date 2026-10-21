<?php
// PHP 8.5 closures in constant expressions: their bodies run at run time, so they are translated as code.
namespace App;
use Orig\Thing;

const GLOBAL_FN = static function (?Thing $t = null): string { return strtoupper('g') . (new Thing)::who(); };
class K {
    const F = static function (Thing ...$t): string { $f = 'fopen'; return $f('k') . \count($t); };
    public static \Closure $s = static function () { return sleep(1); };
    public function __construct(
        public \Closure $c = static function () { return usleep(1); } {
            get => $this->c;
        },
    ) {}
    public function m(\Closure $d = static function (Thing $x): Thing { return $x; }) { return get_class($d(new Thing)); }
}
function f(\Closure $c = static function (): string { $c = 'Orig\Thing'; return $c::who() . '|' . fopen('def'); }) { return $c(); }
echo (GLOBAL_FN)(), "\n";
echo (K::F)(new Thing, new Thing), "\n";
echo (K::$s)(), ' ', ((new K)->c)(), ' ', (new K)->m(), "\n";
echo f(), "\n";
#[\Orig\Attr(static function () { return array_map(null, []); })]
class L {}
echo ((new \ReflectionClass(L::class))->getAttributes()[0]->newInstance()->v)(), "\n";
