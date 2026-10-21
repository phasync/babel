<?php
echo fopen('a') ? '' : '', "\n";
echo constant('__COMPILER_HALT_OFFSET__') === __COMPILER_HALT_OFFSET__ ? "same\n" : "different\n";
echo defined('__COMPILER_HALT_OFFSET__') ? "defined\n" : "undefined\n";
$n = '__COMPILER_HALT_OFFSET__';
echo constant($n) === __COMPILER_HALT_OFFSET__ ? "same\n" : "different\n";
__halt_compiler();
data
