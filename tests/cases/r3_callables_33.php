<?php
// legacy register_globals emulation wipes every global it does not know, then interpolates calls
foreach (array_keys($GLOBALS) as $k) {
    if (!in_array($k, ['GLOBALS', '_GET', '_POST', '_COOKIE', '_SERVER', '_ENV', '_FILES', '_REQUEST'], true)) {
        unset($GLOBALS[$k]);
    }
}
$f = 'strtoupper';
echo "{$f('x')}\n";
$c = 'Orig\Thing';
echo "{$c::who()}\n";
