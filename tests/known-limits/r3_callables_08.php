<?php
// callable-taking functions called with argument unpacking, as a first-class callable, or through a variable
$args = ['fopen', 'x'];
echo call_user_func(...$args), "\n";
$cuf = call_user_func(...);
echo $cuf('fopen', 'x'), "\n";
$g = 'call_user_func';
echo $g('fopen', 'x'), "\n";
echo call_user_func('call_user_func', 'fopen', 'x'), "\n";
echo implode(',', array_filter(...[['a'], 'curl_exec'])), "\n";
