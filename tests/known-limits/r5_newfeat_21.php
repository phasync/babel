<?php
// Unpacking into class-name and callable functions: named keys, gaps, offsets, generators with keys, errors.
$t = new Repl\Thing;
function show($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; } }
$a = ['class' => 'Orig\Thing', 'object_or_class' => $t]; show(fn() => is_a(...$a));
$a = [$t, 'class' => 'Orig\Thing']; show(fn() => is_a(...$a));
$a = [7 => $t, 3 => 'Orig\Thing']; show(fn() => is_a(...$a));
$a = ['Orig\Thing', 'allow_string' => true]; show(fn() => is_a('Orig\Thing', ...$a));
$a = ['class' => 'Orig\Thing', 0 => $t]; show(fn() => is_a(...$a));
$b = ['Orig\Thing']; show(fn() => is_a($t, ...$b));
show(fn() => is_a(...['class' => 'Orig\Thing'], ...[$t]));
function kg() { yield 'object_or_class' => new Repl\Thing; yield 'class' => 'Orig\Thing'; }
show(fn() => is_a(...kg()));
function ig() { yield 5 => new Repl\Thing; yield 5 => 'Orig\Thing'; }
show(fn() => is_a(...ig()));
$a = ['callback' => 'strtoupper', 'pattern' => '/x/', 'subject' => 'xx']; show(fn() => preg_replace_callback(...$a));
$a = ['/x/', 'subject' => 'xx', 'callback' => 'strtoupper']; show(fn() => preg_replace_callback(...$a));
$a = ['Orig\Thing', 'who']; show(fn() => call_user_func(...$a));
$a = [['Orig\Thing', 'who']]; show(fn() => call_user_func(...$a));
$a = ['strtoupper', 'q']; show(fn() => call_user_func_array($a[0], [...array_slice($a, 1)]));
$a = ['x', 'nope' => 1]; show(fn() => class_exists(...$a));
$a = [new ArrayIterator(['a', 'b']), 'strtoupper']; show(fn() => iterator_apply(...$a));
