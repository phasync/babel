<?php
namespace Own {
    function is_a($o, $c) { return "own-is_a($c)"; }
    function class_exists($c) { return "own-ce($c)"; }
    $o = new \Repl\Thing;
    echo is_a($o, 'Orig\Thing'), ' ', class_exists('Orig\Thing'), "\n";
    echo \is_a($o, 'Orig\Thing') ? 'Y' : 'N', ' ', \IS_A($o, '\Orig\Thing') ? 'Y' : 'N', ' ', namespace\is_a($o, 'Orig\Thing'), "\n";
}
namespace Use1 {
    use function is_a as ia, class_exists;
    use function Own\is_a as own;
    $o = new \Repl\Thing;
    echo ia($o, 'Orig\Thing') ? 'Y' : 'N', ' ', class_exists('Orig\Thing') ? 'Y' : 'N', ' ', own($o, 'Orig\Thing'), "\n";
}
namespace Use2 {
    use function Own\class_exists;
    $o = new \Repl\Thing;
    echo class_exists('Orig\Thing'), ' ', is_a($o, 'Orig\Thing') ? 'Y' : 'N', ' ', \Own\is_a($o, 'Orig\Thing'), "\n";
    class K { function is_a($x) { return "m-is_a($x)"; } static function class_exists($x) { return "s-ce($x)"; } }
    echo (new K)->is_a('Orig\Thing'), K::class_exists('Orig\Thing'), "\n";
}
namespace {
    $o = new \Repl\Thing;
    echo namespace\is_a($o, 'Orig\Thing') ? 'Y' : 'N', Is_A($o, 'orig\THING') ? 'Y' : 'N', "\n";
}
