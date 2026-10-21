<?php
// Usage: php tests/e2e/compare-out.php <stdout a> <stdout b> - compares Pest's per-test status lines
// (the JUnit log records Pest warnings, "!", as passes), with durations stripped and names cut
// to 60 characters.
function lines(string $f): array
{
    $r = [];
    $cls = '';
    foreach (file($f, FILE_IGNORE_NEW_LINES) as $l) {
        $l = preg_replace('/\e\[[0-9;]*m/', '', $l);
        if (preg_match('/^\s+(PASS|FAIL|WARN)\s+(\S+)/', $l, $m)) {
            $cls = $m[2];
        } elseif (preg_match('/^\s+([✓!⨯\-…])\s+(.*?)(\s+[0-9.]+s)?\s*$/u', $l, $m)) {
            // the console truncates long names at a width that depends on the duration shown
            $r[] = "$cls: $m[1] " . mb_substr(rtrim($m[2], '…'), 0, 60);
        }
    }
    sort($r);
    return $r;
}
[$a, $b] = [lines($argv[1]), lines($argv[2])];
printf("A: %d status lines, B: %d\n", count($a), count($b));
foreach (array_diff($a, $b) as $l) { echo "- $l\n"; }
foreach (array_diff($b, $a) as $l) { echo "+ $l\n"; }
