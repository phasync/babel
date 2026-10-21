<?php
// Usage: php tests/e2e/counts.php counts.jsonl - sums the hook calls of every process of a run.
$tot = []; $procs = 0;
foreach (file($argv[1]) as $l) {
    $d = json_decode($l, true);
    ++$procs;
    foreach ($d['n'] as $k => $v) { $tot[$k] = ($tot[$k] ?? 0) + $v; }
}
arsort($tot);
printf("processes=%d hooked_calls=%d distinct_functions=%d\ntop: %s\n", $procs, array_sum($tot), count($tot),
    implode(' ', array_map(fn ($k) => "$k=$tot[$k]", array_slice(array_keys($tot), 0, 12))));
