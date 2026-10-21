<?php
namespace Other {
    function usleep($x) { return 'O-usleep'; }
    function strtoupper($x) { return 'O-up'; }
    function file_get_contents($x) { return 'O-fgc'; }
    function curl_exec() { return 'O-curl'; }
    function fopen($x) { return 'O-fopen'; }
}
namespace a {
    use function Other\usleep;
    use function Other\{file_get_contents, curl_exec as ce};
    use function Other\fopen as of;
    use function sleep as nap, strtoupper;
    echo fopen('x'), nap(1), usleep(1), strtoupper('a'), file_get_contents('f'), ce(), sleep(1), of('z'), "\n";
}
namespace b {
    echo fopen('x'), usleep(1), strtoupper('q'), file_get_contents('f'), "\n";
}
