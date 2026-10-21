<?php
// Runs tests/cases/*.php through the harness (in parallel) and compares stdout with the sibling .expect file.
// Usage: php tests/run.php [substring-filter] [--jobs=N]
$dir = __DIR__ . '/cases';
$filter = '';
$jobs = 16;
foreach (array_slice($argv, 1) as $a) {
    if (str_starts_with($a, '--jobs=')) {
        $jobs = max(1, (int) substr($a, 7));
    } else {
        $filter = $a;
    }
}
$queue = [];
foreach (glob($dir . '/*.php') as $case) {
    if ($filter !== '' && !str_contains($case, $filter)) {
        continue;
    }
    if (!is_file(substr($case, 0, -4) . '.expect')) {
        echo "SKIP  ", basename($case), " (no .expect)\n";
        continue;
    }
    $queue[] = $case;
}
$cmd = fn ($case) => 'cd ' . escapeshellarg($dir) . ' && exec php -d display_errors=1 -d error_reporting=-1 -d html_errors=0 -d log_errors=0 '
    . escapeshellarg(__DIR__ . '/harness.php') . ' ' . escapeshellarg($case) . ' 2>&1';
$running = [];
$results = [];
while ($queue || $running) {
    while ($queue && count($running) < $jobs) {
        $case = array_shift($queue);
        $p = proc_open($cmd($case), [1 => ['pipe', 'w']], $pipes);
        $running[] = [$case, $p, $pipes[1], ''];
    }
    $reads = array_map(fn ($r) => $r[2], $running);
    $w = $e = null;
    if (@stream_select($reads, $w, $e, 1) === false) {
        continue;
    }
    foreach ($running as $k => [$case, $p, $out, $buf]) {
        $chunk = fread($out, 65536);
        if ($chunk !== false && $chunk !== '') {
            $running[$k][3] .= $chunk;
        } elseif (feof($out)) {
            fclose($out);
            proc_close($p);
            $results[$case] = $running[$k][3];
            unset($running[$k]);
        }
    }
    $running = array_values($running);
}
ksort($results);
$pass = $fail = 0;
foreach ($results as $case => $got) {
    $got = str_replace($dir, '{DIR}', $got);
    // The test include wrapper's failure for a missing include file reads differently from PHP's own.
    $got = str_replace('Failed to open stream: "phasync\\Babel\\Tests\\IncludeWrapper::stream_open" call failed', 'Failed to open stream: No such file or directory', $got);
    $want = file_get_contents(substr($case, 0, -4) . '.expect');
    if ($got === $want) {
        ++$pass;
    } else {
        ++$fail;
        echo "FAIL  ", basename($case), "\n--- expected\n", $want, "\n--- got\n", $got, "\n";
    }
}
echo "$pass passed, $fail failed\n";
exit($fail ? 1 : 0);
