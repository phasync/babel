<?php
namespace Foo\Bar {
    function fopen($x) { return 'FB-fopen'; }
    function sleep($x) { return 'FB-sleep'; }
}
namespace t {
    use Foo\Bar;
    use Foo\Bar as Baz;
    use Foo;
    echo Bar\fopen('x'), ' ', Baz\sleep(1), ' ', Foo\Bar\fopen('y'), ' ', \Foo\Bar\sleep(1), ' ', fopen('z'), "\n";
    use function Foo\Bar\sleep as s2;
    echo s2(1), "\n";
}
