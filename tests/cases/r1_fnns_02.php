<?php
namespace a;
echo fopen('x'), "\n";
echo later(), "\n";
function later() { return sleep(1) . '|' . usleep(2); }
function usleep($x) { return 'a-usleep'; }
if (!function_exists('a\file_get_contents')) {
    function file_get_contents($x) { return 'cond-own'; }
}
echo file_get_contents('x'), "\n";
