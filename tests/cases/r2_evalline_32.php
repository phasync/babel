<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
echo 'a',
  eval(
'L(__FILE__);' . ''
  ),
 'b';
