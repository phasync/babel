<?php
use \Orig\Thing;
USE ORIG\BASE AS bb;
use Orig\{Contract as CC, Err, Attr as at};
use Orig\Tr as TR1;

class Spec extends bb implements CC {
    use TR1;
    public function a(self $s, parent|null $p, Self|null $q = null, MIXED $m = 1, iterable|Callable $i = [], OBJECT|NULL $o = null): static { return $this; }
    public static function b(int|FLOAT|String|array $x = 1, false|null $f = null): ?self { return null; }
    public function c(): never { throw new ERR('never'); }
    public function d(): void {}
    public function e(thing|BB $t, tHiNg ...$more): Spec|thing { return $this; }
    #[AT(1), at(thing::class)]
    public function f(): iterable { return []; }
}
foreach (['a', 'b', 'c', 'd', 'e', 'f'] as $m) {
    $rm = new ReflectionMethod(Spec::class, $m);
    echo $m, ': ';
    foreach ($rm->getParameters() as $p) echo $p->getType(), ' ';
    echo '=> ', $rm->getReturnType(), "\n";
}
$at = (new ReflectionMethod(Spec::class, 'f'))->getAttributes();
foreach ($at as $a) echo $a->getName(), json_encode($a->getArguments()), ' ';
echo "\n", get_parent_class(Spec::class), ' ', implode(',', class_implements(Spec::class)), ' ', implode(',', class_uses(Spec::class)), "\n";
try { (new Spec)->c(); } catch (Orig\Err $e) { echo get_class($e), "\n"; }
