<?php
$d = __DIR__ . '/fixtures/';
$t = true; $f = false; $n = null;
echo include $t ? $d . 'r2_c2_a.php' : $d . 'r2_c2_b.php', "\n";
echo include $f ? $d . 'r2_c2_a.php' : $d . 'r2_c2_b.php', "\n";
echo include $n ?? $d . 'r2_c2_b.php', "\n";
echo include $n ?: $d . 'r2_c2_a.php', "\n";
echo (include $d . 'r2_c2_a.php') . '|tail', "\n";
echo include ($d) . 'r2_c2_b.php', "\n";
echo include $t ? (include $d . 'r2_c2_path.php') : 'nope', "\n";
echo include $f ? 'nope' : include $d . 'r2_c2_path.php', "\n";
echo include $t ? ($f ? 'x' : $d . 'r2_c2_a.php') : 'y', "\n";
echo include $t ? $f ? 'x' : $d . 'r2_c2_b.php' : 'y', "\n";
