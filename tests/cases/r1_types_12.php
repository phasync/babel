<?php
use Orig\Thing;
use Orig\Base;
use Orig\Contract;
use Orig\Tr;

function orig(string $c) { return unserialize('O:' . strlen($c) . ':"' . $c . '":0:{}'); }

// Anonymous class whose constructor argument holds a closure: the class body still has class-member context.
$o = new class(function () { return 1; }) {
    use Tr;
    public Thing $a;
    protected static ?Base $b = null;
    public const Thing|string K = 'k';
    var Thing $legacy;
    public function __construct(public $cb) {}
};
foreach (['a', 'b', 'legacy'] as $p) echo $p, '=', (new ReflectionProperty($o, $p))->getType(), ' ';
echo (new ReflectionClassConstant($o, 'K'))->getType(), ' ', implode(',', class_uses($o)), ' ', $o->who(), "\n";
try { $o->a = orig('Orig\Thing'); echo "accepted\n"; } catch (TypeError) { echo "rejects\n"; }
// Same inside a named class's method, and with a class declared afterwards
class Maker {
    public function m() {
        return new class(['k' => function () { return 2; }]) extends Base implements Contract {
            public ?Thing $t = null;
            public Base|Contract|null $u = null;
            public function __construct(public array $arr) {}
        };
    }
    public ?Thing $after = null;
}
$m = (new Maker)->m();
foreach (['t', 'u'] as $p) echo $p, '=', (new ReflectionProperty($m, $p))->getType(), ' ';
echo (new ReflectionProperty(Maker::class, 'after'))->getType(), "\n";
