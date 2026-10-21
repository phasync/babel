<?php
// array(...) literal and interpolated string literal as the class expression
echo array('Orig\Thing')[0]::who(), "\n";
echo array('k' => 'Orig\Thing')['k']::X, "\n";
$n = 'Thing';
echo "Orig\\{$n}"::who(), "\n";
echo "Orig\\$n"::$p, "\n";
