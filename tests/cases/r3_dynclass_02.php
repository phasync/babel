<?php
// The same inside "{$...}" interpolation
$f = fn () => 'Orig\Thing';
echo "{$f()::who()}\n";
echo <<<EOT
[{$f()::who()}]

EOT;
