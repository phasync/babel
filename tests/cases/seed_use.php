<?php
namespace d;
use function \fopen as fopen;
use function sleep as nap;
use function Other\usleep;
echo fopen('x'), nap(1), usleep(1), "\n";
namespace Other;
function usleep($x) { return 'other'; }
