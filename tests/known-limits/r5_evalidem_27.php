<?php
// unpacking an undefined variable into a by-reference function warns and does not create it
function t() {
    try {
        usort(...$undef);
    } catch (Error $e) {
        echo get_class($e), ': ', $e->getMessage(), "\n";
    }
    var_dump(array_key_exists('undef', get_defined_vars()));
    $a = ['x' => [2, 1]];
    try {
        sort(...$a['nope']);
    } catch (Error $e) {
        echo get_class($e), ': ', $e->getMessage(), "\n";
    }
    var_dump(array_key_exists('nope', $a));
}
t();
