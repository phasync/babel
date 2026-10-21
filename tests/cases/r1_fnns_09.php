<?php
namespace Other { function usleep($x) { return "o"; } }
namespace {
use function sleep as nap;
use function fopen;
use function Other\usleep;
function s($x) { return 'g-' . $x; }
echo nap(1), fopen('x'), sleep(2), usleep(3), s(1), "\n";
}
