<?php
declare(strict_types=1);
// strict_types TypeErrors raised through wrapped variable calls keep PHP's messages and lines
$f = 'strlen';
try {
    $f(1);
} catch (TypeError $e) {
    echo $e->getMessage(), ' @', $e->getLine(), "\n";
}
$a = ['k' => static fn(int $i): int => $i];
try {
    $a['k']('1');
} catch (TypeError $e) {
    echo strtok(preg_replace('/\{closure[^}]*\}/', '{closure}', $e->getMessage()), ','), "\n";
}
try {
    $n = null;
    $n();
} catch (Error $e) {
    echo $e->getMessage(), "\n";
}
try {
    $u = 'r3cb31_nope';
    $u();
} catch (Error $e) {
    echo $e->getMessage(), "\n";
}
try {
    $s = 'Orig\Thing::nope';
    $s();
} catch (Error $e) {
    echo $e->getMessage(), "\n";
}
echo array_sum(array_filter([1, 2, 3], 'is_int')), "\n";
