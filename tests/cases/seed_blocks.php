<?php
namespace b {
    echo fopen('x'), ' ', sleep(1), "\n";
    $f = fopen(...);
    echo $f('x'), "\n";
}
namespace c {
    function sleep($x) { return 'c-own'; }
    echo fopen('x'), ' ', sleep(1), "\n";
}
