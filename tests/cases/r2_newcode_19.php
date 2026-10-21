<?php
// classArg: mixed positional/named, trailing commas, nested calls, ternaries, comments.
$o = unserialize('O:10:"Orig\\Thing":0:{}');
$r = new Repl\Thing;
$yes = true;
var_dump(is_a($r, 'Orig\Thing',));
var_dump(is_a($r, class: 'Orig\Thing', allow_string: false,));
var_dump(is_a(object_or_class: $r, class: $yes ? 'Orig\Thing' : 'Orig\Base'));
var_dump(is_a($r, /* c */ class /* d */ : /* e */ implode('\\', ['Orig', 'Thing'])));
var_dump(method_exists(object_or_class: 'Orig\Thing', method: 'who'));
var_dump(property_exists('Orig\Thing', 'p'), get_parent_class(object_or_class: 'Orig\Err'));
var_dump(is_subclass_of(new Repl\Err, class: strtolower('ORIG\\ERR') === 'orig\err' ? 'Exception' : 'x'));
var_dump(class_exists(true ? 'Orig\Thing' : 'x', autoload: false));
var_dump(is_a($r, $o instanceof Orig\Thing ? 'Orig\Thing' : 'Nope'));
