<?php
// a polyfill that is not taken at first: guarded class-name arguments in arrow functions, first-class
// callables and generators follow each call site's own choice once the namespaced function appears
namespace App;
if (\PHP_INT_SIZE === 1) { function is_a($o, $c, $s = false) { return 'never'; } }
$ia = fn ($c) => is_a($c, 'Repl\Thing', true);
$fc = is_a(...);
function g($c) { yield is_a($c, 'Repl\Thing', true); yield is_a(...[$c, 'Repl\Thing', true]); yield is_a(object_or_class: $c, class: 'Repl\Thing', allow_string: true); }
echo json_encode([$ia('Orig\Thing'), $fc('Orig\Thing', 'Repl\Thing', true), iterator_to_array(g('Orig\Thing'))]), "\n";
eval('namespace App; function is_a($object_or_class, $class, $allow_string = false) { return "App:$object_or_class"; }');
$ia2 = fn ($c) => is_a($c, 'Repl\Thing', true);
echo json_encode([$ia('Orig\Thing'), $fc('Orig\Thing', 'Repl\Thing', true), $ia2('Orig\Thing'), is_a(...)('Orig\Thing', 'x'), iterator_to_array(g('Orig\Thing'))]), "\n";
function h($c) { yield is_a($c, 'Repl\Thing', true); yield is_a(...[$c, 'Repl\Thing', true]); yield is_a(object_or_class: $c, class: 'Repl\Thing', allow_string: true); }
echo json_encode(iterator_to_array(h('Orig\Thing'))), "\n";
