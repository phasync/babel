<?php
$d = __DIR__ . '/fixtures/';
$f = $d . 'r1_inc_ret.php';
$g = $d . 'r1_inc_ret2.php';
$c = true;
echo include $c ? $f : $g, "\n";
echo include ($c ? $g : $f), "\n";
echo include $d . ($c ? 'r1_inc_ret2.php' : 'x'), "\n";
echo include $f ?: $g, "\n";
echo include $undefined ?? $g, "\n";
echo $c ? include $f : include $g, "\n";
echo !$c ? include $f : include $g, "\n";
echo (include (function () use ($g) { return $g; })()), "\n";
echo include [$f, $g][1], "\n";
echo include $d . match (true) { default => 'r1_inc_ret2.php' }, "\n";
foreach ([include $f => 1, include $g => 2] as $k => $v) echo "$k=$v ";
echo "\n";
