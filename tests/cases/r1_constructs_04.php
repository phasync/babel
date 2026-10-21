<?php
eval('namespace Ev; function g() { return fopen("x") . __NAMESPACE__; } class C { function m() { return \Ev\g() . sleep(1); } }');
echo \Ev\g(), "\n";
echo (new \Ev\C)->m(), "\n";
eval('declare(strict_types=1); function s(int $i) { return $i; }');
try { echo s("5"); } catch (\TypeError $e) { echo "TE\n"; }
echo s(5), "\n";
