<?php
// output buffer callbacks given as literals and through variables
ob_start('strtoupper');
echo "one";
ob_end_flush();
echo "\n";
$cb = 'strtoupper';
ob_start($cb, 0);
echo "two";
ob_end_flush();
echo "\n";
ob_start(callback: ['Orig\Thing', 'who']);
echo "three";
ob_end_flush();
echo "\n";
ob_start('strtoupper');
echo "at shutdown\n";
