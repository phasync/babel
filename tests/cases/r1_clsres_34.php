<?php
$cls = 'Or' . 'ig\\' . 'Th' . 'ing';
echo get_class(new $cls), ' ', $cls::who(), ' ', var_export(new stdClass instanceof $cls, true), "\n";
$k = 'Or' . 'ig\\' . 'Ba' . 'se';
echo get_class(new
    $k), ' ', is_a(new Repl\Base, $k) ? 'y' : 'n', "\n";
