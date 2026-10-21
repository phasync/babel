<?php
namespace shadow {
    use Foo as Orig;
    use Orig as Real;
    echo Orig\Thing::class, ' ', Real\Thing::class, ' ', \Orig\Thing::class, ' ', namespace\Orig\Thing::class, "\n";
}
namespace shadow2 {
    use Orig\Thing as Foo;
    use Foo\Base;      // Foo here is not an alias for qualified-name purposes of class import (use names are absolute)
    echo Foo::class, ' ', Base::class, ' ', Foo\Bar::class, "\n";
}
namespace shadow3 {
    use Orig;
    use Orig\Thing;
    use Thing\Sub;
    echo Thing::class, ' ', Orig\Thing::class, ' ', Orig\Thing\Sub::class, ' ', Sub::class, ' ', Orig\Base::class, "\n";
}
namespace shadow4 {
    const Thing = 'const';
    function Thing() { return 'fn'; }
    echo Thing, Thing(), \shadow4\Thing(), Thing::class, "\n";
    class Pdo {}
    echo Pdo::class, \Pdo::class, \PDO::class, "\n";
}
