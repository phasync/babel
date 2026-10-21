<?php
echo __COMPILER_HALT_OFFSET__, "\n";
try { var_dump(eval('return __COMPILER_HALT_OFFSET__;')); } catch (Error $e) { echo $e->getMessage(), "\n"; }
try { var_dump(eval('return \__COMPILER_HALT_OFFSET__;')); } catch (Error $e) { echo $e->getMessage(), "\n"; }
var_dump(eval('return defined("__COMPILER_HALT_OFFSET__");'));
$fn = function () { return __COMPILER_HALT_OFFSET__; };
echo $fn(), "\n";
__halt_compiler();DATA
