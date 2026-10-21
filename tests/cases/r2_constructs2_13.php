<?php
$d = __DIR__ . '/fixtures/';
$a = [include $d . 'r2_c2_p.php', 'k' => include $d . 'r2_c2_q.php', include $d . 'r2_c2_p.php'];
echo json_encode($a), "\n";
$a = ['x' => include $d . 'r2_c2_p.php'];
echo json_encode($a), "\n";
echo match (1) { 1 => include $d . 'r2_c2_q.php', default => 'no' }, "\n";
echo match (include $d . 'r2_c2_p.php') { 'P' => include $d . 'r2_c2_q.php' }, "\n";
echo str_repeat(include $d . 'r2_c2_p.php', include $d . 'r2_c2_two.php'), "\n";
echo implode(',', [...(include $d . 'r2_c2_arr.php')]), "\n";
print include $d . 'r2_c2_p.php';
print "\n";
function g($d) { yield include $d . 'r2_c2_p.php'; yield 'k' => include $d . 'r2_c2_q.php'; return include $d . 'r2_c2_p.php'; }
$gen = g($d);
foreach ($gen as $k => $v) echo "$k=$v\n";
echo $gen->getReturn(), "\n";
echo include (function () use ($d) { $x = 'r2_c2_p.php'; return $d . $x; })(), "\n";
echo include call_user_func(function () use ($d) { $x = 'r2_c2_q.php'; return $d . $x; }), "\n";
$files = [$d . 'r2_c2_p.php', $d . 'r2_c2_q.php'];
$i = 0;
echo include $files[$i++], include $files[$i++], $i, "\n";
echo include <<<EOT
{$d}r2_c2_p.php
EOT, "\n";
echo include <<<'EOT'
fixtures/r2_c2_q.php
EOT . '', "\n";
foreach (include $d . 'r2_c2_arr.php' as $v) echo $v;
echo "\n";
