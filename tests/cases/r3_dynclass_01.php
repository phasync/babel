<?php
// A class name returned by a call through a variable: $f()::m()
$f = fn () => 'Orig\Thing';
echo $f()::who(), "\n";
$a = ['k' => fn () => 'Orig\Thing'];
echo $a['k']()::who(), "\n";
echo $a['k']()::X, "\n";
