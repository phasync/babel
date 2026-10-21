<?php
// traits with typed static properties, constants and abstract methods using mapped classes
namespace s23;
use Orig\Thing;
use Orig\Tr;
trait T {
    public static ?Thing $sp = null;
    protected static Thing|false $sq = false;
    public const ?Thing NONE = null;
    abstract public function req(Thing $t): Thing;
    public static function init(): static { static::$sp = new Thing; static::$sq = new Thing; return new static; }
}
class U {
    use T, Tr { Tr::who as protected trWho; }
    public function req(Thing $t): Thing { return $t; }
    public function both() { return $this->trWho(); }
}
$u = U::init();
echo U::$sp::who(), ' ', $u->req(new Thing)::who(), ' ', $u->both(), ' ', var_export(U::NONE, true), "\n";
echo (new \ReflectionProperty(U::class, 'sq'))->getType(), "\n";
