<?php
// a namespaced function that may shadow the callable-taking function receives the original string
namespace R3cb12;
if (!function_exists('R3cb12\call_user_func')) {
    function call_user_func($f) { return "local:$f"; }
}
echo call_user_func('fopen'), "\n";
echo call_user_func('Orig\Thing::who'), "\n";
