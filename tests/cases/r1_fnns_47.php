<?php
namespace Lib; function sleep($x) { return 'lib-sleep'; } function usleep($x) { return 'lib-usleep'; } function fopen($x) { return 'lib-fopen'; } function strtoupper($x) { return 'lib-strtoupper'; }
namespace Lib\Sub; function sleep($x) { return 'sub-sleep'; } function usleep($x) { return 'sub-usleep'; } function fopen($x) { return 'sub-fopen'; } function strtoupper($x) { return 'sub-strtoupper'; }
namespace Lib\Sub\Deep; function sleep($x) { return 'deep-sleep'; } function usleep($x) { return 'deep-usleep'; } function fopen($x) { return 'deep-fopen'; } function strtoupper($x) { return 'deep-strtoupper'; }
namespace E; use function SLEEP as x0sleep; use Lib as Sub; class O0 { function id($x) { return $x; } } $o = new O0;
function sleep($x) { return 'own-E-sleep'; }
echo 1, ':', "[{$o->id(usleep(1))}]", "\n";
echo 2, ':', (function () { return (fopen(...))(1); })(), "\n";
echo 3, ':', (static fn() => [USLEEP(1)])()[0], "\n";
echo 4, ':', (function () { yield SLEEP(1); })()->current(), "\n";
echo 5, ':', [sub\sleep(1)][0], "\n";
echo 6, ':', [(\Fopen(...))(1)][0], "\n";
echo 7, ':', "[{$o->id(USLEEP(1))}]", "\n";
echo 8, ':', (static fn() => [usleep(1)])()[0], "\n";
namespace B;  class O1 { function id($x) { return $x; } } $o = new O1;
function sleep($x) { return 'own-B-sleep'; }
echo 9, ':', (FOPEN(1) ?: 'x'), "\n";
echo 10, ':', "[{$o->id((\Lib\Sub\fopen(...))(1))}]", "\n";
echo 11, ':', (fn() => fopen(1))(), "\n";
echo 12, ':', (function () { yield Usleep(1); })()->current(), "\n";
echo 13, ':', \SLEEP(1), "\n";
echo 14, ':', (Strtoupper(1) ?: 'x'), "\n";
echo 15, ':', (\Lib\usleep(1) ?: 'x'), "\n";
echo 16, ':', (static fn() => [(Usleep(...))(1)])()[0], "\n";
echo 17, ':', (static fn() => [(Sleep(...))(1)])()[0], "\n";
echo 18, ':', (function () { yield strtoupper(1); })()->current(), "\n";
namespace B; use function sleep as x0sleep; class O2 { function id($x) { return $x; } } $o = new O2;
echo 19, ':', "[{$o->id((usleep(...))(1))}]", "\n";
echo 20, ':', $o->id(
   usleep(1)
), "\n";
echo 21, ':', (function () { return \Lib\Sub\Deep\fopen(1); })(), "\n";
echo 22, ':', (static fn() => [x0sleep(1)])()[0], "\n";
echo 23, ':', "[{$o->id(\STRTOUPPER(1))}]", "\n";
echo 24, ':', [strtoupper(1)][0], "\n";
namespace A; use function FOPEN as x0fopen; use function Lib\{strtoupper as g11, Sub\usleep as g21}; class O3 { function id($x) { return $x; } } $o = new O3;
function strtoupper($x) { return 'own-A-strtoupper'; }
echo 25, ':', (fn() => Fopen(1))(), "\n";
echo 26, ':', (function () { yield fopen(1); })()->current(), "\n";
echo 27, ':', (static fn() => [(fopen(...))(1)])()[0], "\n";
echo 28, ':', namespace\strtoupper(1), "\n";
echo 29, ':', [FOPEN(1)][0], "\n";
echo 30, ':', Sleep(1), "\n";
namespace E; use Lib\Sub\Deep as Sub; use Lib as L; class O4 { function id($x) { return $x; } } $o = new O4;
echo 31, ':', strtoupper(1), "\n";
echo 32, ':', (function () { yield sleep(1); })()->current(), "\n";
echo 33, ':', match (true) { default => sub\sleep(1) }, "\n";
