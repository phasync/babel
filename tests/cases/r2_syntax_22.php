<?php
// interfaces extending several mapped interfaces; abstract classes with abstract typed methods
namespace s22;
use Orig\Contract;
use Orig\{Thing, Base};
interface Two extends \Countable, Contract, \Stringable {}
interface Three extends Two, \Orig\Contract {
    public function make(Thing|Base $x, (Contract&\Countable)|null $y = null): Thing|Base;
}
abstract class Abs extends Base implements Three, Contract {
    abstract protected function inner(?Thing $t): ?Thing;
    abstract public static function st(Thing ...$t): static;
    public function count(): int { return 1; }
    public function __toString(): string { return 's'; }
}
final class Done extends Abs {
    protected function inner(?Thing $t): ?Thing { return $t; }
    public static function st(Thing ...$t): static { return new static; }
    public function make(Thing|Base $x, (Contract&\Countable)|null $y = null): Thing|Base { return $this->inner(new Thing); }
}
$d = Done::st(new Thing);
echo $d->make(new Base, $d)::who(), ' ', $d instanceof Contract ? 'C' : '-', ' ', implode(',', class_implements($d)), "\n";
