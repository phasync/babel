<?php
// is_a()/is_subclass_of() with allow_string: the FIRST argument is a class name too.
var_dump(is_a('Orig\Base', 'Orig\Base', true));
$c = 'Orig\Err';
var_dump(is_a($c, 'Orig\Err', true));
var_dump(is_subclass_of('Orig\Err', 'Repl\Err') === is_subclass_of('Repl\Err', 'Repl\Err'));
