<?php
$d = __DIR__ . '/fixtures'; $o = new stdClass; $o->p = 'r1_inc_ret2.php'; $a = ['k' => 'r1_inc_ret2.php', 3 => ['r1_inc_ret.php']];
echo include "{$d}/{$o->p}", "\n";
echo include "$d/{$a['k']}", "\n";
echo include "$d/$a[k]", "\n";
echo include "$d/" . $a[3][0], "\n";
echo include include "$d/r1_inc_pathret.php", "\n";
echo include(include("$d/r1_inc_pathret.php")), "\n";
echo include "$d/" . (function () { $x = ['r1_inc_ret2.php', 'b']; return $x[0]; })(), "\n";
echo include $d . '/' . match (true) { false => 'x', default => 'r1_inc_ret2.php', }, "\n";
echo include $d . '/' . ($o->p ?? 'x') . ($o?->missing ?? ''), "\n";
echo include $d . '/' . [1, 2, 'r1_inc_ret2.php'][2], "\n";
$list = [include "$d/r1_inc_ret2.php", include "$d/r1_inc_ret2.php",];
echo count($list), "\n";
function f(string $x, string $y) { return $x . $y; }
echo f(y: include "$d/r1_inc_ret2.php", x: include "$d/r1_inc_ret2.php"), "\n";
echo f(...[include "$d/r1_inc_ret2.php", 'z']), "\n";
