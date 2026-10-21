<?php
echo fopen('a'), "\n";
echo __COMPILER_HALT_OFFSET__ > 0 ? "off\n" : "zero\n";
$d = substr(implode("", file(__FILE__)), __COMPILER_HALT_OFFSET__);
echo strlen(trim($d)), ' ', trim($d), "\n";
__halt_compiler(); fopen('data') {{ <?php echo "never"; ?>
