<?php
function t($c) { try { eval($c); } catch (\ParseError $e) { echo get_class($e), ': ', $e->getMessage(), ' @', basename($e->getFile()), ':', $e->getLine(), "\n"; } }
t('$x = fopen("a") fopen("b");');
t('$x = strtoupper("a") 1;');
t('new Orig\Thing new Orig\Thing;');
t('$f() 1;');
t('$x = $c::m() 2;');
t('echo PDO::class PDO::class;');
