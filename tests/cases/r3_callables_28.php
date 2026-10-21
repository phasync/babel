<?php
// callable-taking functions and mapped functions imported with 'use function' aliases
namespace R3cb28;
use function call_user_func as cuf;
use function array_filter as af;
use function Hook\fopen_alt as fopen;
use function \usort as sorter;
echo fopen('x'), "\n";
echo cuf('fopen', 'x'), "\n";
echo cuf(fopen(...), 'x'), "\n";
echo implode(',', af(['a'], 'curl_exec')), "\n";
$u = [2, 1];
sorter($u, 'curl_exec');
echo implode(',', $u), "\n";
echo \call_user_func('sleep', 1), ' ', namespace\cuf2(), "\n";
function cuf2() { return call_user_func('usleep', 1); }
