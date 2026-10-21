<?php
// unpacking a Traversable whose keys are neither int nor string, and string keys from a generator
function g($k) { yield $k => 'Orig\Thing'; yield 'class' => 'Orig\Thing'; }
foreach ([1.5, null, true, new stdClass] as $k) {
    try {
        var_dump(is_a(...g($k)));
    } catch (Throwable $e) {
        echo get_class($e), ': ', $e->getMessage(), "\n";
    }
}
function h() { yield 'object_or_class' => 'Orig\Thing'; yield 'class' => 'Orig\Thing'; yield 'allow_string' => true; }
var_dump(is_a(...h()));
