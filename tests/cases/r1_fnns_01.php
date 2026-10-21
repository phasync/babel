<?php
declare(strict_types=1);
namespace A {
    function sleep($x) { return 'A-own'; }
    echo fopen('x'), ' ', sleep(1), ' ', \sleep(1), ' ', namespace\sleep(1), "\n";
}
namespace B {
    echo fopen('x'), ' ', sleep(1), ' ', \A\sleep(1), "\n";
}
namespace {
    echo fopen('x'), ' ', sleep(1), ' ', FOPEN('y'), ' ', Sleep(1), ' ', namespace\usleep(1), "\n";
}
