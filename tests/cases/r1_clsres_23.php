<?php
namespace Orig {
    // code living inside the namespace of the mapped classes
    function probe() {
        $o = new Thing;
        $ns = __NAMESPACE__;
        return [get_class($o), Thing::class, namespace\Base::class, \Orig\Err::class, is_a($o, __NAMESPACE__ . '\Thing'), is_a($o, "$ns\\Thing"), is_a($o, 'Thing'), $o instanceof Thing, $o instanceof namespace\Thing, class_exists('Orig\Err')];
    }
    echo json_encode(probe()), "\n";
}
namespace Orig\Sub {
    class Thing {}
    echo Thing::class, ' ', \Orig\Thing::class, ' ', namespace\Thing::class, ' ', get_class(new Thing), ' ', get_class(new \Orig\Thing), "\n";
    var_dump(is_a(new Thing, 'Orig\Sub\Thing'), is_a(new Thing, 'Orig\Thing'), is_a(new \Orig\Thing, 'Orig\Thing'));
}
namespace app {
    class Thing {}
    class Base extends \Orig\Base {}
    $t = new Thing; $b = new Base;
    var_dump(is_a($t, 'app\Thing'), is_a($t, 'Orig\Thing'), is_a($b, 'Orig\Base'), is_a($b, 'app\Base'), $b instanceof \Orig\Base, class_exists('app\Thing'), class_exists('Thing'));
    echo get_parent_class($b), ' ', get_class($t), "\n";
}
