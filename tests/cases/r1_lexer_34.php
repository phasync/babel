<?php
declare(strict_types=1);
namespace One {
    use Orig\Thing;
    use function Hook\fopen_alt as fopen;
    function t(Thing $t) { return fopen('one') . sleep(1); }
    echo t(new Thing), "\n";
    echo namespace\t(new Thing), "\n";
    class X { function m() { return fopen('m'); } }
    echo (new X)->m(), "\n";
}
namespace Two {
    function sleep($x) { return 'two-own'; }
    function t(Thing $t) { return fopen('two') . sleep(1); }
    class Thing {}
    echo t(new Thing), "\n";
    echo \One\t(new \Repl\Thing), "\n";
    echo (new \ReflectionFunction('Two\t'))->getParameters()[0]->getType(), "\n";
}
namespace {
    use Orig\Thing as T;
    function t(T $t) { return fopen('glob') . sleep(2); }
    echo t(new T), "\n";
    $x = new class { function sleep() { return 's'; } };
    echo $x->sleep(), "\n";
    echo (new ReflectionFunction('t'))->getParameters()[0]->getType(), "\n";
}
