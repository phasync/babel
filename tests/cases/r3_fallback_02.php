<?php
// alternative-syntax switch/for inside a braced namespace; one branch taken
namespace App {
    switch (2):
        case 1:
            function fopen() { return 'local-fopen'; }
            break;
        case 2:
            function usleep() { return 'local-usleep'; }
            break;
    endswitch;
    for ($i = 0; $i < 0; $i++):
        function curl_exec() { return 'local-curl'; }
    endfor;
    echo fopen('x'), ' ', usleep(1), ' ', curl_exec(1), "\n";
}
