<?php
declare(strict_types=1);
// strict_types applies to the run time checked call exactly as to the original call
namespace App;
require __DIR__ . '/fixtures/r3_fallback_strict.php';
echo sleep(2), "\n";
try {
    echo sleep('3'), "\n";
} catch (\TypeError $e) {
    echo explode(', called in', $e->getMessage())[0], ' @', $e->getLine(), "\n";
}
function g() { return func_get_args(); }
echo json_encode(g(sleep(...))), "\n";
