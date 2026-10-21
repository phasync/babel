<?php
// a first-class callable of an internal function checks scalar arguments in the mode of the file
// that CALLS it, not of the file that created it: is_a(...) made in a strict_types file and called
// here coerces, and is_a(...) made here and called from a strict_types file is strict
require __DIR__ . '/../cases/fixtures/r5_fuzz4_strictfcc.php';
var_dump($g('stdClass', 'stdClass', 1));
var_dump($c(1));
var_dump($g(new \Orig\Thing, 'Orig\Thing', 1));
var_dump(strictCall($g, 'stdClass', 'stdClass', 1));
$h = is_a(...);
$e = class_exists(...);
var_dump($h('stdClass', 'stdClass', 1));
var_dump(strictCall($h, 'stdClass', 'stdClass', 1));
var_dump(strictCall($e, 1));
