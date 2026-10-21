<?php
declare(strict_types=1);
use Orig\Thing;
use Orig\Contract;
use Orig\Tr;
use Orig\Base;

function orig(string $c) { return unserialize('O:' . strlen($c) . ':"' . $c . '":0:{}'); }

interface HasConst { const Thing|int ID = 7; public function make(): Thing; }
enum Level: int implements HasConst, Contract {
    use Tr;
    case Low = 1;
    case High = 2;
    const DEFAULT = self::Low;
    const TYPE = Thing::class;
    public function make(): Thing { return new Thing; }
    public static function fromThing(Thing|self $t): self { return $t instanceof self ? $t : self::DEFAULT; }
    public function with(Base ...$b): static { return $this; }
}
echo Level::fromThing(new Thing)->name, ' ', Level::fromThing(Level::High)->name, ' ', get_class(Level::High->make()), ' ', Level::TYPE, ' ', Level::ID, ' ', Level::High->who(), "\n";
var_dump(Level::Low instanceof Contract, Level::Low instanceof \Orig\Contract, Level::Low instanceof \Repl\Contract, Level::Low instanceof HasConst);
try { Level::fromThing(orig('Orig\Thing')); } catch (TypeError $e) { echo "enum static rejects Orig\n"; }
$re = new ReflectionEnum(Level::class);
echo implode(',', $re->getInterfaceNames()), ' ', $re->getBackingType(), ' ', implode(',', $re->getTraitNames()), "\n";
$m = $re->getMethod('fromThing'); echo $m->getParameters()[0]->getType(), ' ', $m->getReturnType(), ' ', $re->getMethod('with')->getParameters()[0]->getType(), "\n";
echo $re->getReflectionConstant('ID')->getType() ?? 'untyped', "\n";
echo $re->getMethod('make')->getReturnType(), "\n";
