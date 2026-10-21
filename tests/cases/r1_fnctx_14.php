<?php
namespace app\sub {
    use function strtoupper as up;
    function helper() { return 'sub-helper'; }
    $r = match (true) {
        default => fopen('x') . \sleep(1) . namespace\helper() . up('x'),
    };
    echo $r, "\n";
    echo (function () {
        return (fn() => (function () { return [fopen('n'), usleep(1)]; })())();
    })()[1], "\n";
    $c = static fn(int ...$a): string => strtoupper(...)('q') . array_sum($a);
    echo $c(1, 2), "\n";
    echo \app\sub\helper(), namespace\helper(), "\n";
    echo implode(',', [fopen(...)(), \fopen(...)()]), "\n";
}
namespace app\other {
    function fopen($x) { return 'own-fopen'; }
    echo fopen('x'), ' ', \fopen('x'), ' ', namespace\fopen('x'), ' ', sleep(1), "\n";
    $f = fopen(...); echo $f('x'), "\n";
    function g() { return fopen('a') . (fn() => fopen('b'))() . \fopen('c'); }
    echo g(), "\n";
}
namespace {
    echo fopen('x'), namespace\fopen('x'), "\n";
}
