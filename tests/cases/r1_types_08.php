<?php
namespace Orig {
    // inside namespace Orig, Thing resolves to Orig\Thing
    function inside(Thing $t, ?Base $b, ?\PDO $p = null, namespace\Contract|null $c = null): Thing|Err { return $t; }
    class Sub extends Base implements Contract { use Tr; public Thing $x; }
    echo (new \ReflectionFunction('Orig\inside'))->getParameters()[0]->getType(), ' ', (new \ReflectionFunction('Orig\inside'))->getReturnType(), "\n";
    echo (new \ReflectionFunction('Orig\inside'))->getParameters()[2]->getType(), ' ', (new \ReflectionFunction('Orig\inside'))->getParameters()[3]->getType(), "\n";
    echo get_parent_class(Sub::class), ' ', Thing::class, ' ', namespace\Thing::class, ' ', \Orig\Thing::class, "\n";
}
namespace Other {
    // Thing here is Other\Thing: NOT mapped
    class Thing {}
    class Base {}
    function f(Thing $t, Base $b, \Orig\Thing $o, ?Sub\Thing $s = null): Thing { return $t; }
    echo (new \ReflectionFunction('Other\f'))->getParameters()[0]->getType(), ' ', (new \ReflectionFunction('Other\f'))->getParameters()[1]->getType(), ' ';
    echo (new \ReflectionFunction('Other\f'))->getParameters()[2]->getType(), ' ', (new \ReflectionFunction('Other\f'))->getParameters()[3]->getType(), ' ', Thing::class, ' ', namespace\Thing::class, "\n";
}
namespace Imp {
    use Orig as O;
    use Orig\Thing as TT;
    use Other\Thing;
    function g(O\Thing $a, TT $b, Thing $c, \Other\Thing $d, tt $e, o\BASE $f, \orig\contract $g): O\Err { throw new O\Err; }
    foreach ((new \ReflectionFunction('Imp\g'))->getParameters() as $p) echo $p->getType(), ' ';
    echo (new \ReflectionFunction('Imp\g'))->getReturnType(), "\n";
    echo Thing::class, ' ', TT::class, ' ', O\Thing::class, ' ', O\Err::class, "\n";
}
namespace {
    use Orig\Thing;
    function gfn(PDO $a, ?\PDO $b, pdo|Thing $c, PDOException|PDOStatement|null $d = null): \PDO|null { return null; }
    foreach ((new ReflectionFunction("gfn"))->getParameters() as $p) echo $p->getType(), ' ';
    echo (new ReflectionFunction("gfn"))->getReturnType(), ' ', PDO::class, ' ', \PDO::class, "\n";
    try { gfn(new Repl\PDO, null, new Repl\PDO); echo "ok\n"; } catch (TypeError) { echo "TypeError\n"; }
    try { gfn(\Pdo\Sqlite::connect('sqlite::memory:'), null, new Thing); echo "accepted real PDO\n"; } catch (TypeError) { echo "rejects real PDO\n"; }
    echo (new Repl\PDO) instanceof PDO ? "y" : "n", \Pdo\Sqlite::connect('sqlite::memory:') instanceof PDO ? "y" : "n", "\n";
}
