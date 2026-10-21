<?php
namespace dyn2;
class Holder { public static $cls = 'Orig\Thing'; public static array $list = []; public static $n = 0; }
$cls = 'Orig\Thing'; $h = 'dyn2\Holder';
$cls::$p = 'changed';
echo \Repl\Thing::$p, "\n";
$cls::$p .= '!'; echo \Repl\Thing::$p, ' ', \Orig\Thing::$p, "\n";
unset($h::$list['a']); $h::$list[] = 1; $h::$n++; ++$h::$n; $h::$n += 5;
echo json_encode($h::$list), $h::$n, "\n";
[$h::$n, $h::$list] = [100, [1, 2]];
echo json_encode($h::$list), $h::$n, "\n";
foreach ([7, 8] as $h::$n) {}
echo $h::$n, "\n";
$ref = &$h::$n; $ref = 9; echo Holder::$n, isset($h::$n) ? 'set' : 'unset', isset($h::$zzz) ? 'set' : 'unset', "\n";
echo $h::$cls, "\n";
$name = 'who'; echo $cls::$name(), ' ', $cls::{'who'}(), "\n";
$k = static fn(string $c): string => $c::who(); echo $k('Orig\Thing'), $k('\ORIG\THING'), "\n";
function mk(string $c, ...$a) { return new $c(...$a); } echo get_class(mk('Orig\Base')), "\n";
