<?php
namespace A\B;
function viaFn() {
    $local = 'L';
    $r = include __DIR__ . '/fixtures/r1_inc_a.php';
    return $r;
}
echo json_encode(viaFn()), "\n";
echo include __DIR__ . '/fixtures/r1_inc_ns.php', "\n";
echo \R1\Inc\who(), "\n";
echo __NAMESPACE__, "\n";
include 'fixtures/r1_inc_html.php';
echo "\n";
$counter = 5;
function inc() { $counter = 10; $x = include __DIR__ . '/fixtures/r1_inc_vars.php'; return [$x, $counter, $added]; }
echo json_encode(inc()), "\n";
echo $counter, "\n";
$x = include __DIR__ . '/fixtures/r1_inc_vars.php';
echo $x, $counter, $added, "\n";
