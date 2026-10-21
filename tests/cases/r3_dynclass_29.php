<?php
// Static properties with variable names holding class names: A::$$n::m(), $c::${'p'}::m()
class H { public static $p = 'Orig\Thing'; }
$c = 'H';
$n = 'p';
echo $c::$$n::who(), "\n";
echo $c::${'p'}::who(), "\n";
echo H::$$n::who(), "\n";
echo H::${'p'}::X, "\n";
