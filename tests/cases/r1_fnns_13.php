<?php
namespace Other { function sleep($x) { return 'O-sleep'; } function fopen($x) { return 'O-fopen'; } }
namespace p\q {
    use function Other\sleep;
    use function Other\fopen as FO;
    function usleep($x) { return 'pq-usleep'; }
    echo usleep(1), sleep(1), FO(1), "\n";
    eval('echo sleep(1), usleep(2), fopen("x"), "|", __NAMESPACE__, "\n";');
    eval('namespace ev; function sleep($x) { return "ev-sleep"; } echo sleep(1), fopen("q"), usleep(1), "\n";');
    eval('namespace ev3; echo fopen("q"), sleep(1), "\n"; ');
}
