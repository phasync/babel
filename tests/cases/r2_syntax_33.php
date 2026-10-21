<?php
// named arguments labelled function/fn must not start a parameter list
namespace s33;
function g(...$a) { return implode(',', array_keys($a)) . '=' . implode(',', $a); }
echo g(function: 1, x: strtoupper(fopen('y'))), "\n";
echo g(fn: 1, x: 0 ? sleep(1) : usleep(2)), "\n";
echo g(fn: 1, x: (2), y: true ? 3 : fopen('z')), "\n";
