<?php
try {
    include fn() => 'x.php';
} catch (Error $e) {
    echo get_class($e), ': ', $e->getMessage(), "\n";
}
try {
    include function (): string { return 'x.php'; };
} catch (Error $e) {
    echo get_class($e), ': ', $e->getMessage(), "\n";
}
try {
    include static fn(): string => 'x.php';
} catch (Error $e) {
    echo get_class($e), ': ', $e->getMessage(), "\n";
}
