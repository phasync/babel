<?php
$GLOBALS['s'] = 'strtoupper'; $GLOBALS['c'] = 'Orig\Thing';
function f() { static $x = $GLOBALS['s']('a'), $y = $GLOBALS['c']::who(), $z = "{$GLOBALS['s']('b')}"; return "$x $y $z"; }
echo f(), "\n";
class K { function m() { static $q = ($GLOBALS['s'])('c'); return $q; } }
echo (new K)->m(), "\n";
$fn = function () { static $w = [$GLOBALS['c']][0]::$p; return $w; };
echo $fn(), "\n";
