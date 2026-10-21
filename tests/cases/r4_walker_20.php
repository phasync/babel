<?php
$f = fn() => 'return "strtoupper";'; $s = 'strtoupper'; $code = 'return "Orig\\\\Thing";';
echo 1, (eval($f()))('a'), "\n";
echo 2, (eval("{$f()}"))('a'), "\n";
echo 3, (eval($code))::who(), "\n";
echo 4, eval("return {$s('x')};" === 'x' ? '' : 'return 4;'), "\n";
echo 5, eval('return ' . var_export($s('y'), true) . ';'), "\n";
echo 6, eval(<<<X
return '{$s('z')}';
X), "\n";
