<?php
// Usage: php tests/e2e/compare.php <junit a.xml> <junit b.xml> - per-test status and assertion counts.
function load(string $f): array
{
    $r = [];
    $x = simplexml_load_file($f);
    foreach ($x->xpath('//testcase') as $t) {
        $s = 'pass';
        foreach (['failure', 'error', 'skipped', 'warning'] as $k) {
            if (isset($t->$k)) {
                $s = $k . ': ' . trim(strtok((string) ($t->$k['message'] ?? $t->$k), "\n"));
                break;
            }
        }
        $r[(string) $t['class'] . '::' . (string) $t['name']] = [$s, (int) $t['assertions']];
    }
    return $r;
}
[$a, $b] = [load($argv[1]), load($argv[2])];
$st = fn ($r) => array_count_values(array_map(fn ($v) => strtok($v[0], ':'), $r));
echo 'A: ', count($a), ' tests ', json_encode($st($a)), ' assertions=', array_sum(array_column($a, 1)), "\n";
echo 'B: ', count($b), ' tests ', json_encode($st($b)), ' assertions=', array_sum(array_column($b, 1)), "\n";
foreach ($a + $b as $k => $_) {
    if (($a[$k] ?? null) !== ($b[$k] ?? null)) {
        echo "DIFF $k\n  A: ", json_encode($a[$k] ?? null), "\n  B: ", json_encode($b[$k] ?? null), "\n";
    }
}
