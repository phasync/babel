<?php
namespace App;
// First-class callables of every class-name function in a weak file: mapping, named args, coercion, errors.
class Kid extends \Orig\Base implements \Orig\Contract { use \Orig\Tr; }
function show($f) { try { var_dump($f()); } catch (\Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; } }
show(fn() => class_exists(...)('Orig\Thing'));
show(fn() => interface_exists(...)('Orig\Contract', true));
show(fn() => trait_exists(...)(trait: 'Orig\Tr'));
show(fn() => enum_exists(...)('Orig\Thing'));
show(fn() => is_a(...)(new Kid, 'Orig\Base'));
show(fn() => is_subclass_of(...)('App\Kid', 'Orig\Base'));
show(fn() => is_subclass_of(...)(class: 'Orig\Base', object_or_class: new Kid));
show(fn() => method_exists(...)('Orig\Thing', 'WHO'));
show(fn() => property_exists(...)('Orig\Thing', 'p'));
show(fn() => get_parent_class(...)(new Kid));
show(fn() => class_implements(...)('App\Kid'));
show(fn() => class_parents(...)(new Kid, false));
show(fn() => class_uses(...)('App\Kid'));
show(fn() => is_a(...)());
show(fn() => class_exists(...)('a', true, 3));
show(fn() => class_exists(...)(1.0));
show(fn() => class_exists(...)([]));
show(fn() => is_a(...)('Orig\Thing', 'Orig\Thing', 'yes'));
show(fn() => \is_a(...)('Orig\Thing', 'Orig\Thing', allow_string: true));
show(fn() => array_map(class_exists(...), ['Orig\Thing', 'Nope']));
show(fn() => array_filter(['Orig\Thing', 'Nope'], class_exists(...)));
