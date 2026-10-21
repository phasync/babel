<?php
class K { static function m() { return 'K::m'; } }
echo (eval('return "strtoupper";'))('x'), "\n";
echo (eval('return "K";'))::m(), "\n";
echo (eval('return "Orig\Thing";'))::who(), "\n";
echo get_class(new (eval('return "Orig\Thing";'))), "\n";
var_dump(new K instanceof (eval('return "K";')));
echo (eval('return ["k" => "v"];'))['k'], "\n";
echo eval('return null;') ?? 'null', "\n";
$g = (function () { $r = yield eval('return "y1";'); echo $r, "\n"; })();
echo $g->current(), "\n";
$g->send(eval('return "sent";'));
try { throw eval('return new Exception("thrown");'); } catch (Exception $e) { echo $e->getMessage(), "\n"; }
print eval('return "printed\n";');
$o = clone eval('return new stdClass;');
echo get_class($o), "\n";
echo (eval('return fn() => fopen("x");'))(), "\n";
