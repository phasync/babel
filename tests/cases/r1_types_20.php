<?php
// Method signature compatibility is checked by PHP between mapped and unmapped types.
// If any single reference were left as Orig\..., class declaration would be a fatal error.
use Orig\Thing;
use Orig\Base;
use Orig\Contract;

interface Repo {
    public function find(Base $b): ?Base;
    public function all(): iterable;
    public static function create(Thing|Base $x): static;
    public function conn(): PDO;
}
class SubBase extends Base {}
class SubThing extends \Repl\Thing {}
abstract class AbstractRepo implements Repo {
    // contravariant parameter (wider), covariant return (narrower)
    public function find(Base|Thing|null $b): SubBase { return new SubBase; }
    public function all(): array { return []; }
    public function conn(): \Repl\PDO { return new \Repl\PDO; }
}
final class ConcreteRepo extends AbstractRepo {
    public static function create(\Repl\Thing|\Repl\Base|string $x): static { return new static; }
    public function find(mixed $b): SubBase { return parent::find($b); }
}
class Holder { public function __construct(public Base $b) {} }
class SubHolder extends Holder {
    public function __construct(public Base $b = new SubBase) { parent::__construct($b); }
}
trait NeedsThing { abstract public function need(Thing $t): Thing; }
class UsesTrait { use NeedsThing; public function need(\Repl\Thing $t): SubThing { return new SubThing; } }
$r = ConcreteRepo::create('x');
echo get_class($r), ' ', get_class($r->find(null)), ' ', get_class($r->conn()), ' ', get_class((new SubHolder)->b), ' ', get_class((new UsesTrait)->need(new Thing)), "\n";
echo (new ReflectionMethod(Repo::class, 'find'))->getReturnType(), ' ', (new ReflectionMethod(AbstractRepo::class, 'find'))->getParameters()[0]->getType(), ' ', (new ReflectionMethod(Repo::class, 'conn'))->getReturnType(), "\n";
