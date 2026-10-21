<?php
set_error_handler(function ($n, $m, $f, $l) { echo preg_replace("~^.*?(\\(\\d+\\) : eval)~", "$1", $f), " line $l\n"; return true; });
// eval line numbers: PHP reports different lines for different argument shapes
eval(
  'echo $a;'
);
eval('echo $a;'
);
eval(
  'echo $a;
   '
);
eval(
  'echo $a;'
  . 'echo $a;'
);
$v = 'echo $a;';
eval(
  $v
  . $v
);
eval(
  $v
);
$x = [
 1,
 eval(
  $v
  . $v
 ),
];
$x = [
 1,
 eval('echo $a;'
 ),
];
echo
  eval('echo $a;
  '),
  2;
echo "\n";
foo(
 eval($v
 ),
 eval(
 $v . $v
 )
);
function foo() {}
