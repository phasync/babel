<?php
namespace Orig\Thing\Deep { const Base = 'deepconst'; function Thing() { return 'deepfn'; } class Leaf { const Thing = 'leaf'; } }
namespace App {
use Orig\Thing;
use Orig\Base;
use function Orig\Thing\Deep\Thing as thingFn;
use const Orig\Thing\Deep\Base as BaseConst;

function Thing() { return 'fn Thing'; }
const Contract = 'const Contract';

enum Kind { case Thing; case Base; const Err = self::Thing; public static function Attr(): string { return 'static Attr'; } }
class Names {
    const Thing = 'class const';
    const int Base = 5, Err = 6;
    public $Thing = 'prop';
    public ?Thing $typed = null;
    public function Thing(?Thing $x = null): string { return 'method Thing'; }
    public static function Base(): string { return 'method Base'; }
    public function call(Thing ...$args) { return count($args) . Thing() . self::Thing . static::Base() . $this->Thing() . $this->Thing . Kind::Thing->name . Kind::Err->name . Kind::Attr(); }
}
function named(Thing|int $Thing = 1, int ...$Base) { return 'named'; }
echo (new Names)->call(), "\n";
echo named(Thing: 5), ' ', Contract, ' ', BaseConst, ' ', thingFn(), ' ', \Orig\Thing\Deep\Leaf::Thing, ' ', Names::Base, ' ', Names::Err, "\n";
goto Thing;
echo "skipped\n";
Thing:
echo (new \ReflectionProperty(Names::class, 'typed'))->getType(), ' ', (new \ReflectionFunction('App\named'))->getParameters()[0]->getType(), "\n";
$arr = ['Thing' => 1, Thing::class => 2, 'Orig\Thing' => 3];
echo implode(',', array_keys($arr)), "\n";
switch ('Thing') { case 'Thing': echo "str case\n"; break; }
}
