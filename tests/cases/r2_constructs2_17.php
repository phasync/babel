<?php
namespace A\B;
function off() { return __COMPILER_HALT_OFFSET__; }
echo strtoupper("x"), "\n";
echo json_encode(substr(implode("", file(__FILE__)), off())), "\n";
echo json_encode(substr(implode("", file(__FILE__)), \__COMPILER_HALT_OFFSET__)), "\n";
__HALT_COMPILER() ?>
DATA1
