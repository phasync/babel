<?php
namespace A {
    use Orig\Thing;
    echo Thing::class, "\n";
}
namespace B {
    echo Thing::class, "\n";
    class Thing {}
}
namespace C {
    use Orig\Thing as Orig;
    use Orig\Base;
    echo Orig::class, ' ', Base::class, "\n";
}
namespace D {
    echo Base::class, ' ', \Orig\Base::class, "\n";
}
