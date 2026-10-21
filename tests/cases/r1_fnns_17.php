<?php
namespace A { function sleep($x) { return 'A-sleep'; } function fopen($x) { return 'A-fopen'; } }
namespace B {
    use function A\sleep as fopen;
    use function fopen as sleep;
    use function A\fopen as usleep;
    echo fopen(1), sleep('x'), usleep(1), "\n";
}
namespace C {
    use A\Thing as sleep;
    use Orig\Thing as fopen;
    echo sleep(1), fopen('x'), \A\sleep(1), "\n";
}
