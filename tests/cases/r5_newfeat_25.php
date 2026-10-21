<?php
declare(strict_types=1);
namespace App;
// First-class callables of class-name functions in a strict namespaced file, through use function aliases.
use function class_exists as ce;
use function is_a as isA;
function show($f) { try { var_dump($f()); } catch (\TypeError $e) { echo $e->getMessage(), "\n"; } }
show(fn() => ce(...)(123));
show(fn() => ce(...)('Orig\Thing'));
show(fn() => isA(...)('Orig\Thing', 'Orig\Thing', 1));
show(fn() => isA(...)('Orig\Thing', 'Orig\Thing', true));
show(fn() => class_exists(...)(123));
show(fn() => \class_exists(...)(123));
show(fn() => \is_subclass_of(...)(new \Repl\Thing, 'Orig\Thing', 0));
show(fn() => method_exists(...)('Orig\Thing', 5));
show(fn() => property_exists(...)(5, 'p'));
show(fn() => get_parent_class(...)(5));
show(fn() => class_implements(...)('Orig\Thing', 1));
