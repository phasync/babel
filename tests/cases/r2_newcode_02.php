<?php
// A named argument called extends/implements/insteadof must not switch the translator into a class-name list.
function f($extends = 0, $implements = 0, $insteadof = 0, $x = '') { return $x; }
echo f(extends: 1, x: strtoupper('a')), "\n";
echo f(implements: 1, x: fopen('x', 'r')), "\n";
echo f(insteadof: 1, x: sleep(0)), "\n";
