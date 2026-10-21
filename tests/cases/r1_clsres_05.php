<?php
namespace n1;
$r = new \Repl\Thing;
$j = fn($v) => var_export($v, true);
// named arguments
echo $j(is_a(object_or_class: $r, class: 'Orig\Thing')), "\n";
echo $j(is_a(class: 'Orig\Thing', object_or_class: $r)), "\n";
echo $j(is_a($r, class: 'Orig\Thing')), "\n";
echo $j(is_a(object_or_class: 'Repl\Err', class: 'Orig\Err', allow_string: true)), "\n";
echo $j(is_a(allow_string: true, class: "Orig\\Err", object_or_class: 'Repl\Err')), "\n";
echo $j(is_subclass_of(object_or_class: 'Repl\Err', class: 'Exception', allow_string: true)), "\n";
