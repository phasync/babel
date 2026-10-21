<?php
// A second argument unpacking: the class-name / callable arguments it holds are mapped too (their
// position is only known at run time, after the first unpacking).
$t = new Repl\Thing;
$x = [$t]; $y = ['Orig\Thing'];
var_dump(is_a(...$x, ...$y));
var_dump(is_a(...[$t], ...['class' => 'Orig\Thing']));
var_dump(call_user_func(...[], ...[['Orig\Thing', 'who']]));
var_dump(call_user_func(...[], ...['Orig\Thing::who']));
var_dump(method_exists(...[], ...['Orig\Thing', 'who']));
