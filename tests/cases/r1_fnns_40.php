<?php
namespace Lib; function sleep($x) { return 'lib-sleep'; } function usleep($x) { return 'lib-usleep'; } function fopen($x) { return 'lib-fopen'; } function strtoupper($x) { return 'lib-strtoupper'; }
namespace Lib\Sub; function sleep($x) { return 'sub-sleep'; } function usleep($x) { return 'sub-usleep'; } function fopen($x) { return 'sub-fopen'; } function strtoupper($x) { return 'sub-strtoupper'; }
namespace Lib\Sub\Deep; function sleep($x) { return 'deep-sleep'; } function usleep($x) { return 'deep-usleep'; } function fopen($x) { return 'deep-fopen'; } function strtoupper($x) { return 'deep-strtoupper'; }
namespace B; use Lib\Sub as Dp; use function \SLEEP as x1sleep; use Lib as L; class O0 { function id($x) { return $x; } } $o = new O0;
function sleep($x) { return 'own-B-sleep'; }
function usleep($x) { return 'own-B-usleep'; }
echo 1, ':', [\USLEEP(1)][0], "\n";
echo 2, ':', $o->id(
   fopen(1)
), "\n";
echo 3, ':', "[{$o->id(\strtoupper(1))}]", "\n";
echo 4, ':', (fopen(1) ?: 'x'), "\n";
echo 5, ':', (function () { return (x1sleep(...))(1); })(), "\n";
echo 6, ':', match (true) { default => \Lib\Sub\Deep\sleep(1) }, "\n";
echo 7, ':', $o->id(
   usleep(1)
), "\n";
echo 8, ':', (function () { yield usleep(1); })()->current(), "\n";
echo 9, ':', match (true) { default => (Usleep(...))(1) }, "\n";
namespace E; use function Lib\strtoupper as STRTOUPPER; use function SLEEP; class O1 { function id($x) { return $x; } } $o = new O1;
echo 10, ':', (function () { yield strtoupper(1); })()->current(), "\n";
echo 11, ':', [usleep(1)][0], "\n";
echo 12, ':', sleep(1), "\n";
echo 13, ':', "[{$o->id(SLEEP(1))}]", "\n";
echo 14, ':', (static fn() => [SLEEP(1)])()[0], "\n";
namespace A; use function Lib\Sub\usleep; use function \SLEEP as SLEEP; class O2 { function id($x) { return $x; } } $o = new O2;
echo 15, ':', (\Lib\usleep(1) ?: 'x'), "\n";
echo 16, ':', \Lib\sleep(1), "\n";
echo 17, ':', "[{$o->id(sleep(1))}]", "\n";
