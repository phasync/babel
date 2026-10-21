<?php
// A namespaced function declared inside alternative-syntax control blocks (if: ... endif;) is conditional, not top level.
namespace App;
if (\getenv('R3_NEWCODE2_NOPE') !== false):
    function strtoupper($s) { return 'App\strtoupper'; }
endif;
while (false):
    function fopen(...$a) { return 'App\fopen'; }
endwhile;
foreach ([] as $x):
    function usleep($n) { return 'App\usleep'; }
endforeach;
switch (1):
    case 2:
        function sleep($n) { return 'App\sleep'; }
endswitch;
echo strtoupper('a'), ' ', fopen('a', 'r'), ' ', usleep(1), ' ', sleep(1), "\n";
