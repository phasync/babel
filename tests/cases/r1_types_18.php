<?php
namespace One {
    function before(Thing $x, PDO $p) {}
    use Orig\Thing;
    use Other\PDO;
    function after(Thing $x, PDO $p, \PDO $g) {}
    echo (new \ReflectionFunction('One\before'))->getParameters()[0]->getType(), ' ', (new \ReflectionFunction('One\before'))->getParameters()[1]->getType(), "\n";
    echo (new \ReflectionFunction('One\after'))->getParameters()[0]->getType(), ' ', (new \ReflectionFunction('One\after'))->getParameters()[1]->getType(), ' ', (new \ReflectionFunction('One\after'))->getParameters()[2]->getType(), "\n";
}
namespace Two {
    // imports of namespace One do not leak into Two
    function f(Thing $x, PDO $p) {}
    use Orig\Base as Thing;
    function g(Thing $x) {}
    foreach (['f', 'g'] as $n) {
        foreach ((new \ReflectionFunction("Two\\$n"))->getParameters() as $p) echo $p->getType(), ' ';
    }
    echo "\n";
}
namespace {
    // global namespace after namespaces: no imports from before
    function h(Thing $x, PDO $p, Base $b): PDO { return $p; }
    foreach ((new ReflectionFunction('h'))->getParameters() as $p) echo $p->getType(), ' ';
    echo (new ReflectionFunction('h'))->getReturnType(), "\n";
}
