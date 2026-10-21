<?php
// Named arguments called class/interface/trait/enum/new/use/namespace/static/const must not disturb the translator.
function k($class = 0, $interface = 0, $trait = 0, $enum = 0, $new = 0, $use = 0, $namespace = 0, $static = 0, $const = 0, $include = 0, $eval = 0, $x = '') { return $x; }
echo k(class: 1, x: strtoupper('a')), k(interface: 1, x: fopen('x', 'r')), k(trait: 1, enum: 2, x: sleep(0)), "\n";
echo k(new: 1, use: 2, namespace: 3, x: strtoupper('b')), k(static: 1, const: 2, x: usleep(1)), "\n";
echo k(include: 'nofile.php', eval: 'x', x: strtoupper('c')), "\n";
class Z { function m() { return k(class: 1, x: fopen('y', 'r')) . k(const: 1, x: strtoupper('d')); } }
echo (new Z)->m(), ' ', basename(__FILE__), "\n";
