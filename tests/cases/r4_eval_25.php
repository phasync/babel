<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
$b = \phasync\Babel\Runtime::babel();
$src = 'namespace App; $f = "strtoupper"; $c = "Orig\Thing"; echo $f("x"), fopen("y"), $c::who(), "\n"; L(__FILE__);';
$t = $b->translate($src, __FILE__ . "(3) : eval()'d code");
eval($t);
eval(" " . $t);
eval(str_replace($b->marker, '', $t));
eval(str_replace($b->marker, '', $t) . ' ');
eval($b->translate($t, 'x'));
