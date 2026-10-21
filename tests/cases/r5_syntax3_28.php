<?php
// computed classes and callees behind unary operators, casts, keywords and in write contexts
class E extends \Exception {}
$c = 'Orig\Thing'; $f = 'strtoupper'; $e = 'E'; $g = fn() => 'Orig\Thing';
function gen($c, $f) { yield $c::who(); yield $f('y'); yield from [$c::$p]; }
echo implode(',', iterator_to_array(gen($c, $f), false)), "\n";
echo !$c::who() ? 'f' : 't', (int) $c::$p, -strlen($c::X), @$f('a'), (string) $g()::X, "\n";
try { throw new $e($c::who()); } catch (E $x) { echo $x->getMessage(), "\n"; }
print $f('p') . "\n";
$c::$p .= '+';
echo $c::$p, ' ', \Repl\Thing::$p, ' ', \Orig\Thing::$p, "\n";
$r = &$c::$p;
$r = 'ref';
echo \Repl\Thing::$p, "\n";
['a' => $one] = ['a' => $g()::who()];
echo $one, ' ', clone (new $c) instanceof $c ? 'inst' : 'no', ' ', (new $c) instanceof $g ? 'g' : 'no-g', "\n";
$fr = fn&() => $c::$p;
echo $fr(), ' ', isset($c::$p) ? 'set' : 'unset', ' ', empty($c::$nope) ? 'empty' : 'full', "\n";
echo $c::$p ??= 'never', "\n";
