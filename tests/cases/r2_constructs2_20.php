<?php
echo strtoupper("x"), "\n";
echo json_encode(substr(implode("", file(__FILE__)), __COMPILER_HALT_OFFSET__)), "\n";
__halt_compiler();