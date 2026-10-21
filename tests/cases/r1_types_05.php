<?php
namespace Lib;

use Orig\Err;
use Orig\Thing as T;
use Orig\Base;
use Orig\Contract;
use Orig\Tr;

function orig(string $c) { return unserialize('O:' . strlen($c) . ':"' . $c . '":0:{}'); }

interface I1 extends Contract, \Countable {}
interface I2 extends \Orig\Contract {}
trait Loc { public function who() { return 'Loc'; } }
trait Mine { use Tr; }
class A extends Base implements I1, I2 {
    use Loc, \Orig\Tr { \Orig\Tr::who insteadof Loc; Loc::who as public locWho; Tr::who as protected trWho; }
    public function count(): int { return 0; }
}
class B2 extends \Orig\Base {}
class C3 extends namespace\A {}
enum E: string implements Contract {
    use Tr;
    case X = 'x';
    const THING = T::class;
    
}
enum E2 implements \Orig\Contract { case Q; }
abstract class D extends Base {}
final class F extends D implements \Orig\Contract {}

echo get_parent_class(A::class), ' ', get_parent_class(B2::class), ' ', get_parent_class(F::class), "\n";
$a = new A;
echo $a->name(), ' ', $a->who(), ' ', $a->locWho(), "\n";
var_dump($a instanceof Contract, $a instanceof \Orig\Contract, $a instanceof \Repl\Contract, $a instanceof Base, $a instanceof T);
echo implode(',', class_implements(A::class)), "\n";
echo implode(',', class_implements(E::class)), "\n";
echo implode(',', class_uses(A::class)), ' ', implode(',', class_uses(E::class)), ' ', implode(',', class_uses(Mine::class)), "\n";
echo implode(',', class_implements(E2::class)), ' ', E::THING, "\n";
echo implode(',', class_implements(I1::class)), "\n";
echo (E::X instanceof Contract ? 'y' : 'n'), (new F instanceof T ? 'y' : 'n'), (new F instanceof Base ? 'y' : 'n'), "\n";
echo (new \ReflectionClass(A::class))->getParentClass()->getName(), "\n";
echo implode(',', (new \ReflectionClass(F::class))->getInterfaceNames()), "\n";
echo implode(',', (new \ReflectionClass(Mine::class))->getTraitNames()), "\n";
