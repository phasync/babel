<?php
echo fopen("a"), sleep(1), strtoupper("x"), "\n";
$d = file_get_contents(__FILE__, false, null, __COMPILER_HALT_OFFSET__);
echo $d, "|\n";
$all = implode("", file(__FILE__));
echo substr($all, __COMPILER_HALT_OFFSET__), "|\n";
echo __COMPILER_HALT_OFFSET__ === strlen($all) - strlen(substr($all, __COMPILER_HALT_OFFSET__)) ? "off-ok\n" : "off-bad\n";
$o = new SplFileObject(__FILE__); $o->fseek(__COMPILER_HALT_OFFSET__); echo $o->fgets();


__halt_compiler(); fopen("data") <?php sleep(1); ?> 
line2 usleep(1) __FILE__ __COMPILER_HALT_OFFSET__
