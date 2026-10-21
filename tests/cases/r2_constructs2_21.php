<?php
namespace A {
    function off() { return __COMPILER_HALT_OFFSET__; }
    echo strtoupper('a'), "\n";
}
namespace {
    echo json_encode(substr(implode('', file(__FILE__)), A\off())), "\n";
    echo json_encode(substr(implode('', file(__FILE__)), __COMPILER_HALT_OFFSET__)), "\n";
}
__HALT_COMPILER();?>X<?php echo "never"; ?>
