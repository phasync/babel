<?php
// unpacking a non-iterable throws the same TypeError from the same line, also for by-reference functions
$n = 5;
foreach ([fn () => usort(...$n), fn () => is_a(...$n), fn () => array_map(...$n), fn () => preg_match(...$n)] as $f) {
    try {
        $f();
    } catch (Throwable $e) {
        echo get_class($e), ': ', $e->getMessage(), ' @ ', basename($e->getFile()), ':', $e->getLine(), "\n";
    }
}
