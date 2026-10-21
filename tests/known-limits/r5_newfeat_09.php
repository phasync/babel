<?php
// Unpacking an undefined variable into a by-reference function warns "Undefined variable" and
// throws TypeError; the variable is not created.
function f() {
    try { usort(...$undef); } catch (Throwable $e) { echo get_class($e), ': ', $e->getMessage(), "\n"; }
    var_dump(array_key_exists('undef', get_defined_vars()));
    try { preg_replace_callback(...$nope); } catch (Throwable $e) { echo get_class($e), "\n"; }
    var_dump(array_keys(get_defined_vars()));
}
f();
