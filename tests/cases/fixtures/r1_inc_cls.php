<?php
declare(strict_types=1);
namespace R1\Cls;

use Orig\Thing;
use Orig\{Base, Contract as Ct};

#[\Orig\Attr(5)]
final class C extends Base implements Ct {
    public ?Thing $t = null;
    public function m(Thing|\PDO|null $x, \Orig\Err ...$errs): ?Thing { return $x instanceof Thing ? $x : null; }
    public static function who(): string { return Thing::who() . '/' . self::class . '/' . (new \ReflectionClass(Thing::class))->getName(); }
    public function viaThis() { return $this->name() . ':' . (include __DIR__ . '/r1_inc_ret2.php'); }
}
function typed(Thing $t): string { return get_class($t); }
return [C::class, fn() => 1];
