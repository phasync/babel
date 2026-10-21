<?php
// chain links reached first from a different expression: callees inside the index, the arguments
// or the callee of another computed call; chains split by comments and newlines; interpolation
$f = fn($x = null) => 'strtoupper';
$k = fn($x = null) => 'k';
$c = 'Orig\Thing';
$a = ['k' => 'fopen', 'HOOK:strtoupper' => 'sleep'];
echo $a[$k()]('q'), "\n";
echo $a[$f()('z')]('q'), "\n";
echo $a[$k($f())]('q'), "\n";
echo $f($f())('q'), "\n";
echo $k()[0], $f()($f()('z')), "\n";
echo $c::who(), (new $c())::who(), "\n";
echo strrev($f())[0], "|", strrev("reppuotrts")("q"), "\n";
echo $f()
   // comment
   ('q'), "\n";
echo $f /* c */ ( /* d */ ) ('q'), "\n";
echo "{$f()('q')} {$a[$f()('q')]('w')} {$c::who()}\n";
echo <<<H
  {$f()('q')} {$c::who()} {$a[$k()]('w')}
  H . "\n";
