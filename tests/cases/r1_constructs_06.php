<?php
set_error_handler(function ($n, $m, $f, $l) { echo 'W:', $m, ' @', preg_replace('~^.*?(\\(\\d+\\) : eval)~', '$1', $f), ' line ', $l, "\n"; return true; });
$r = eval(
  'echo $u1;'
  .
  "\n\n" . 'echo fopen(1), $u2; echo __FILE__;'
);
echo "\n";
echo strtoupper(
  eval('echo $w; return 1;')
), "\n";
$z = [
  1,
  eval('echo $q;
   echo $q2;'),
  3
];
