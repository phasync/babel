<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
$x = 'X';
$X = 'got X';
echo "{${eval('return "x";')}}", "\n";
echo "{${eval('return strtolower("X");')}}", "\n";
echo "<{$X}|{${eval(
'L(__FILE__); return "X";'
)}}>", "\n";
echo <<<EOT
  a {${eval('L(__FILE__); return "X";')}} b
  EOT;
echo "\n";
$arr = ['k' => 'L(__FILE__);'];
eval("{$arr['k']}");
eval("$arr[k]");
