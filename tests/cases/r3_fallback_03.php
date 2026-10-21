<?php
// declarations in both if/else branches: the taken branch decides
namespace App;
if (PHP_INT_SIZE === 1) {
    function fopen() { return 'if-branch'; }
} else {
    function strtoupper($s) { return 'else-branch'; }
}
echo fopen('x'), ' ', strtoupper('x'), "\n";
if (!\function_exists('App\usleep')) {
    function usleep($n) { return 'polyfill'; }
}
echo usleep(1), "\n";
