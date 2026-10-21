<?php
namespace Fopen\Sleep;
function usleep($x) { return 'ns-usleep'; }
echo usleep(1), \usleep(1), sleep(1), namespace\usleep(1), __NAMESPACE__, "\n";
namespace Sleep;
use Fopen\Sleep as fopen;
use function Fopen\Sleep\usleep as sleep;
echo fopen\usleep(1), sleep(1), fopen(1), \Fopen\Sleep\usleep(1), "\n";
