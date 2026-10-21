<?php
namespace Registry;

// Static registries written through a class held in a variable (Laravel booted models, facades).
$x = 'Orig\Thing';
$x::$p = 'w';
$x::$p .= '1';
$x::$p ??= 'z';
var_dump(isset($x::$p));
$r = &$x::$p;
$r .= 'r';
[$x::$p, $y] = [$x::$p . 'l', 2];
foreach (['f'] as $k => $x::$p) {}
echo \Repl\Thing::$p, ' ', unserialize('O:10:"Orig\\Thing":0:{}')::$p, "\n";

class Model { public static array $booted = []; public static array $instances = []; }
$m = 'Orig\Thing';
$cls = Model::class;
$cls::$booted[$m] = true;
$cls::$instances[$m] ??= new $m;
$cls::$instances[$m] ??= new \stdClass;
echo get_class(Model::$instances['Orig\Thing']), ' ', implode(',', array_keys($cls::$booted)), "\n";
$o = new $m;
$o::$p = 'via-object';
echo \Repl\Thing::$p, "\n";
