<?php
// callables naming class-name functions go to the shims, which map the class argument
$o = new Repl\Thing;
var_dump(call_user_func('is_a', $o, 'Orig\Thing'));
$f = 'is_a';
var_dump($f($o, 'Orig\Thing'));
$F = '\IS_A';
var_dump($F($o, 'Orig\Thing'));
$g = is_a(...);
var_dump($g($o, 'Orig\Thing'));
var_dump(call_user_func_array('is_subclass_of', ['object_or_class' => $o, 'class' => 'Orig\Thing']));
var_dump(array_map(...) === null, is_callable('is_a'));
echo implode(',', array_filter([$o, new stdClass], fn($x) => is_a($x, 'Orig\Thing')) ? ['ok'] : []), "\n";
var_dump(call_user_func('method_exists', 'Orig\Thing', 'who'), call_user_func('class_implements', 'Orig\Thing'));
