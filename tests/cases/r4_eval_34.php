<?php
$code = 'function hd() { return __COMPILER_HALT_OFFSET__ + strlen(fopen("x")) * 0; } echo __COMPILER_HALT_OFFSET__, "\n"; __halt_compiler();DATA';
try { eval($code); echo hd(), "\n"; } catch (Error $e) { echo $e->getMessage(), "\n"; }
echo substr($code, hd()), "\n";
