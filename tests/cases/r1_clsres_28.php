<?php
namespace al {
    use function is_a as isa, class_exists as ce;
    use function \is_subclass_of as iss;
    use function Other\method_exists as me;
    use function Other\{get_parent_class as gpc, property_exists};
    use const Other\is_a;
    $r = new \Repl\Thing;
    echo var_export(isa($r, 'Orig\Thing'), true), var_export(iss('Repl\Err', 'Orig\Err'), true), var_export(isa('Repl\Err', 'Orig\Err', true), true), "\n";
    echo me('Orig\Thing', 'who'), gpc('Orig\Err'), property_exists('Orig\Thing', 'p'), "\n";
    echo var_export(is_a($r, 'Orig\Thing'), true), "\n";
    // method with the same name, static call and property-style access must not be treated as the function
    class Q { function is_a($x, $y) { return "m($y)"; } static function class_exists($x) { return "s($x)"; } }
    $q = new Q; echo $q->is_a(1, 'Orig\Thing'), Q::class_exists('Orig\Thing'), $q?->is_a(1, 'Orig\Err'), "\n";
}
namespace Other {
    function method_exists($a, $b) { return "me($a,$b)"; }
    function get_parent_class($a) { return "gpc($a)"; }
    function property_exists($a, $b) { return "pe($a,$b)"; }
}
