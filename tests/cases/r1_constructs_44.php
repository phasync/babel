<?php
$s = "æøå ✓";
echo fopen("a"), strlen($s), "\n";
$r = eval(
  "return sleep(1) . __LINE__;"
);
echo $r, "\n";
$all = implode("", file(__FILE__));
echo json_encode(substr($all, __COMPILER_HALT_OFFSET__)), "\n";
echo strlen($all) - __COMPILER_HALT_OFFSET__, "\n";
__halt_compiler() ?>
CR
LF fopen(1)
