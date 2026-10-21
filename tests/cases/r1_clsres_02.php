<?php
namespace app {
    class Thing { public static function who() { return 'app\Thing'; } }
    class PDO { public static function who() { return 'app\PDO'; } }
    function f(Thing $t, PDO $p, \PDO $g, ?\pdo $h = null) {}
    echo Thing::class, ' ', PDO::class, ' ', \PDO::class, ' ', \pdo::class, ' ', Thing::who(), ' ', PDO::who(), "\n";
    foreach ((new \ReflectionFunction('app\f'))->getParameters() as $p) { echo $p->getType(), "\n"; }
    var_dump(new \stdClass instanceof PDO, new \stdClass instanceof \PDO);
    try { f(new Thing, new PDO, \Pdo\Sqlite::connect('sqlite::memory:')); } catch (\TypeError $e) { echo "TE1\n"; }
    try { f(new Thing, new PDO, new \Repl\PDO); echo "ok\n"; } catch (\TypeError $e) { echo "TE2\n"; }
}
namespace other {
    use PDO;
    function g(PDO $p) { return get_class($p); }
    echo g(new \Repl\PDO), "\n";
    try { g(\Pdo\Sqlite::connect('sqlite::memory:')); } catch (\TypeError $e) { echo "TE3\n"; }
    echo PDO::class, "\n";
}
namespace {
    function h(PDO $p) { return 1; }
    try { h(\Pdo\Sqlite::connect('sqlite::memory:')); } catch (TypeError $e) { echo "TE4\n"; }
    echo h(new Repl\PDO), "\n";
    echo PDO::class, ' ', \PDO::class, ' ', pdo::class, "\n";
}
