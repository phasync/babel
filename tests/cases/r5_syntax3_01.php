<?php declare(strict_types=0x1);
$f = is_a(...);
try { var_dump($f('Orig\Thing', 'Orig\Thing', 1)); } catch (\TypeError $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
$g = class_exists(...);
try { var_dump($g('Orig\Thing', 0)); } catch (\TypeError $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
eval('declare(strict_types=0b1); $h = is_a(...); try { var_dump($h("Orig\\\\Thing", "Orig\\\\Thing", 1)); } catch (\TypeError $e) { echo $e->getMessage(), "\n"; }');
