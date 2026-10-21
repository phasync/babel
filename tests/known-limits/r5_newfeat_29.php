<?php
// Errors raised by a class-name function called through its first-class callable report the
// caller's file and line, as without the tool (the shim must not show up as the location).
$f = class_exists(...);
var_dump($f(null));
try {
    $f([]);
} catch (TypeError $e) {
    echo basename($e->getFile()), ':', $e->getLine(), "\n";
}
$g = 'is_a';
try {
    $g();
} catch (ArgumentCountError $e) {
    echo basename($e->getFile()), ':', $e->getLine(), "\n";
}
