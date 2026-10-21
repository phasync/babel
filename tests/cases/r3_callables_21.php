<?php
// array literals with computed elements and interpolated strings as callees
$c = 'Orig\Thing';
$m = 'who';
echo [$c, $m](), "\n";
echo [$c, 'who'](), "\n";
echo "$c::$m"(), "\n";
$x = 'open';
echo "f{$x}"('x'), "\n";
