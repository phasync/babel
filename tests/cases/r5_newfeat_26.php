<?php
// Unpacking a Traversable whose keys are neither int nor string throws
// "Keys must be of type int|string during argument unpacking", also into class-name and callable functions.
function show($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; } }
function g2() { yield null => new Repl\Thing; yield 1 => 'Orig\Thing'; }
function g3() { yield 1.5 => new Repl\Thing; yield 2 => 'Orig\Thing'; }
function g4() { yield new stdClass => new Repl\Thing; }
function g5() { yield true => 'strtoupper'; }
show(fn() => is_a(...g2()));
show(fn() => is_a(...g3()));
show(fn() => is_a(...g4()));
show(fn() => call_user_func(...g5()));
