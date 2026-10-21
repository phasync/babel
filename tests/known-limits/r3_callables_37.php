<?php
// Closure::fromCallable with argument unpacking or as a first-class callable
$args = ['fopen'];
echo Closure::fromCallable(...$args)('x'), "\n";
$from = Closure::fromCallable(...);
echo $from('fopen')('x'), "\n";
echo $from(['Orig\Thing', 'who'])(), "\n";
