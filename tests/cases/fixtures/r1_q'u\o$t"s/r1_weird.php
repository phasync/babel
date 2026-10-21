<?php
$n = basename(__DIR__);
$e = eval('return [basename(__DIR__), basename(__FILE__), fopen(1)];');
$ev = eval('return __FILE__;');
return [$n, basename(__FILE__), $e, preg_replace('~^.*/(r1_q)~', '$1', $ev), fopen('w'), __LINE__, (include __DIR__ . '/r1_weird2.php')];
