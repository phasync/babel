<?php declare(strict_types=1); namespace a;
use function fopen;use function sleep as s;  use function usleep; echo fopen('x'), s(1), usleep(1), "\n";
