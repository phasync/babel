<?php
namespace H\I;
function data() {
    $all = implode('', file(__FILE__));
    return [fopen('z'), substr($all, __COMPILER_HALT_OFFSET__), \__COMPILER_HALT_OFFSET__ === __COMPILER_HALT_OFFSET__];
}
return data();
__HALT_COMPILER() ?>
payload fopen('x') <?php echo 1 ?>
tail
