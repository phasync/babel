<?php
namespace n3 {
    use function is_a;
    use function class_exists as ce;
    $r = new \Repl\Thing;
    echo var_export(is_a($r, 'Orig\Thing'), true), var_export(ce('Orig\Thing'), true), var_export(\is_a($r, 'Orig\Thing'), true), "\n";
}
namespace n3b {
    function is_a($o, $c) { return "own($c)"; }
    echo is_a(new \Repl\Thing, 'Orig\Thing'), ' ', var_export(\is_a(new \Repl\Thing, 'Orig\Thing'), true), "\n";
}
namespace n4 {
    function is_subclass_of($o, $c) { return "own-iss($c)"; }
    echo is_subclass_of(1, 'Orig\Thing'), ' ', var_export(\is_subclass_of(new \Repl\Err, 'Exception'), true), "\n";
    echo is_a(new \Repl\Thing, 'Orig\Thing') ? 'Y' : 'N', "\n";
}
namespace n5 {
    use function n4\is_subclass_of;
    echo is_subclass_of(1, 'Orig\Thing'), "\n";
    use function Other\is_a;
    echo is_a(1, 'Orig\Thing'), "\n";
}
namespace Other { function is_a($a, $b) { return "other($b)"; } }
