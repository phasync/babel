<?php
// named arguments labelled implements/extends/insteadof must not switch on class-list mode
namespace s32;
function g(...$a) { return implode(',', array_keys($a)) . '=' . implode(',', $a); }
echo g(implements: 1, x: fopen('x')), "\n";
echo g(extends: 1, y: strtoupper('a')), "\n";
echo g(insteadof: sleep(1)), "\n";
