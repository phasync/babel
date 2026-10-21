<?php
// argument unpacking ignores integer keys: arrays with gaps and generators with repeated keys
namespace App;
$c = 'Orig\Thing';
var_dump(is_a(...[5 => $c, 9 => 'Repl\Thing', 10 => true]));
var_dump(is_a(...(function () use ($c) { yield 1 => $c; yield 1 => 'Repl\Thing'; yield 1 => true; })()));
var_dump(\is_a(...[3 => $c, 1 => 'Repl\Thing', 2 => true]));
var_dump(\is_a(...(function () use ($c) { yield 'object_or_class' => $c; yield 'class' => 'Repl\Thing'; yield 'allow_string' => true; })()));
echo \call_user_func(...[4 => 'strtoupper', 9 => 'x']), "\n";
