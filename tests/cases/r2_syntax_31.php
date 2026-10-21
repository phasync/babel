<?php
// named arguments labelled with magic-constant keywords __FILE__ / __DIR__
namespace s31;
function g(...$a) { return implode(',', array_keys($a)) . '=' . implode(',', $a); }
echo g(__FILE__: 1, __DIR__: fopen('x')), "\n";
echo basename(__FILE__), "\n";
