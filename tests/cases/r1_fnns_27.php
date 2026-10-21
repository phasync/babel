<?php
namespace cond;
if (PHP_VERSION_ID < 50000) {
    function usleep($x) { return 'never-declared'; }
}
if (!function_exists('cond\fopen')) {
    function fopen($x) { return 'declared-at-runtime'; }
}
echo usleep(1), "\n";
echo fopen('x'), "\n";
