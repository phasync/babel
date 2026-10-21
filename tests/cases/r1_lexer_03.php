<?php
// comment fopen
echo fopen("a"),
  sleep(1),
  __LINE__, "\n";
$x = <<<EOT
  a
  EOT;
echo __LINE__, "\n";
/* multi
line */ echo __LINE__, usleep(2), "\n";
echo 1 <=> 2, "\n";