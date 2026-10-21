<?php
namespace Support;

// Named arguments whose names are keywords: retry(fn: ...), Cache::remember(function: ...).
function retry(int $times, callable $fn, mixed $sleep = 0): mixed
{
    return $fn($times);
}

$cb = static fn (int $n): string => "try$n";
echo retry(3, fn: $cb), "\n";
echo strtoupper(file_get_contents('x')), "\n";
echo retry(times: 1, fn: $cb, sleep: usleep(sleep(1))), "\n";
echo strtoupper(fopen('y', 'r')), "\n";
