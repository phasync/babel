<?php
namespace kinds {
    use function Orig\Thing;
    use const Orig\Thing as TH;
    use function Orig\Base as BB;
    echo Thing::class, ' ', TH::class, ' ', BB::class, "\n";
}
namespace kinds2 {
    use Orig\Thing as PDO;
    use Orig\Base as ThingX;
    use orig\tr as Thing;
    echo PDO::class, ' ', ThingX::class, ' ', Thing::class, ' ', \PDO::class, "\n";
    var_dump(new \Repl\Thing instanceof PDO, new \Repl\PDO instanceof \PDO);
}
namespace kinds3 {
    use Orig\{Thing as T1, Base, };
    use \Orig\Err, \Orig\Attr as AT, Foo\Bar;
    use Orig\{Contract, function who, const X};
    echo T1::class, Base::class, Err::class, AT::class, Bar::class, Contract::class, "\n";
}
