<?php
// array literal callables called directly
echo ['Orig\Thing', 'who'](), "\n";
echo array('Orig\Thing', 'who')(), "\n";
echo [\Orig\Thing::class, 'who'](), "\n";
echo ['Orig\Thing', 'who'](...)(), "\n";
