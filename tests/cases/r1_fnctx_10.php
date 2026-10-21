<?php
// first-class callables and spellings
$a = fopen(...);
$b = \fopen(...);
$c = FOPEN(...);
$d = \SlEeP(...);
$e = namespace\usleep(...);
$f = strtoupper /* c */ (...);
$g = fopen
  (...);
echo $a(), $b(), $c(), $d(), $e(), $f(), $g(), "\n";
echo FoPeN('x'), \STRTOUPPER('y'), usleep   (1), sleep
/* gap */
(2), "\n";
echo (new ReflectionFunction($a))->getName(), "\n";
