<?php
// String literal class expressions in every spelling, and an include result
echo 'Orig\Thing'::who(), "\n";
echo b'Orig\Thing'::who(), "\n";
echo "Orig\\Thing"::who(), "\n";
echo "\x4frig\\Thing"::who(), "\n";
echo '\Orig\Thing'::X, "\n";
echo 'oRiG\tHiNg'::$p, "\n";
echo (include __DIR__ . '/fixtures/r3_dynclass_cls.php')::who(), "\n";
echo ['Orig\Thing', 'who'][0]::who(), "\n";
