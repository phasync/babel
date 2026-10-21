<?php
// Braced namespaces named with reserved words.
namespace Function {
    function sleep($x) { return __FUNCTION__; }
    echo sleep(1), ' ', \get_class(new \Orig\Thing), "\n";
}
namespace Class {
    use Orig\Thing;
    echo sleep(1), ' ', Thing::class, ' ', usleep(1), "\n";
}
namespace {
    echo sleep(1), "\n";
}
