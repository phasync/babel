<?php
// parentheses around only the first part of a chain base: ($b)::$next?->c::who()
class Box { public static $next; public $c = 'Box'; public static function who() { return 'Box'; } }
$b = new Box;
Box::$next = new Box;
Box::$next->c = 'Orig\Thing';
echo ($b)::$next?->c::who(), "\n";
echo (($b))::$next?->c::$p, "\n";
eval('echo ($b)::$next?->c::who(), "\n";');
$f = fn () => ($b)::$next?->c::who();
echo $f(), "\n";
Box::$next = null;
var_export(($b)::$next?->c::who());
echo "\n";
