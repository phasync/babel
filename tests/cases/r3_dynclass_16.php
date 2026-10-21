<?php
// Code that cleans up $GLOBALS (legacy "unregister globals" routines) before interpolating a static call
function cleanGlobals() {
    foreach (array_keys($GLOBALS) as $k) {
        if ($k !== 'GLOBALS' && $k !== 'c' && $k[0] === '_') {
            unset($GLOBALS[$k]);
        }
    }
}
$c = 'Orig\Thing';
cleanGlobals();
echo "{$c::who()}\n";
$f = 'strtoupper';
echo "{$f('x')}\n";
