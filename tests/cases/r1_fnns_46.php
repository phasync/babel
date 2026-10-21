<?php
namespace Lib; function sleep($x) { return 'lib-sleep'; } function usleep($x) { return 'lib-usleep'; } function fopen($x) { return 'lib-fopen'; } function strtoupper($x) { return 'lib-strtoupper'; }
namespace Lib\Sub; function sleep($x) { return 'sub-sleep'; } function usleep($x) { return 'sub-usleep'; } function fopen($x) { return 'sub-fopen'; } function strtoupper($x) { return 'sub-strtoupper'; }
namespace Lib\Sub\Deep; function sleep($x) { return 'deep-sleep'; } function usleep($x) { return 'deep-usleep'; } function fopen($x) { return 'deep-fopen'; } function strtoupper($x) { return 'deep-strtoupper'; }
namespace B; use function Lib\{sleep as g10, Sub\usleep as g20}; class O0 { function id($x) { return $x; } } $o = new O0;
function sleep($x) { return 'own-B-sleep'; }
echo 1, ':', (fn() => STRTOUPPER(1))(), "\n";
echo 2, ':', match (true) { default => Fopen(1) }, "\n";
echo 3, ':', $o->id(
   SLEEP(1)
), "\n";
echo 4, ':', Strtoupper(1), "\n";
echo 5, ':', (static fn() => [sleep(1)])()[0], "\n";
echo 6, ':', [\Fopen(1)][0], "\n";
namespace A; use function \SLEEP as x0sleep; use function Lib\usleep; class O1 { function id($x) { return $x; } } $o = new O1;
echo 7, ':', $o->id(
   (usleep(...))(1)
), "\n";
echo 8, ':', "[{$o->id(\usleep(1))}]", "\n";
echo 9, ':', match (true) { default => Fopen(1) }, "\n";
echo 10, ':', (static fn() => [(SLEEP(...))(1)])()[0], "\n";
echo 11, ':', (fopen(1) ?: 'x'), "\n";
echo 12, ':', (usleep(1) ?: 'x'), "\n";
echo 13, ':', (function () { yield fopen(1); })()->current(), "\n";
echo 14, ':', (sleep(1) ?: 'x'), "\n";
echo 15, ':', (usleep(1) ?: 'x'), "\n";
echo 16, ':', match (true) { default => Sleep(1) }, "\n";
namespace C\D; use function Lib\{fopen as g10, Sub\usleep as g20}; use function Lib\sleep; class O2 { function id($x) { return $x; } } $o = new O2;
function strtoupper($x) { return 'own-C_D-strtoupper'; }
echo 17, ':', (function () { return \usleep(1); })(), "\n";
echo 18, ':', [Usleep(1)][0], "\n";
echo 19, ':', match (true) { default => (Strtoupper(...))(1) }, "\n";
echo 20, ':', (fn() => USLEEP(1))(), "\n";
echo 21, ':', (fn() => (sleep(...))(1))(), "\n";
namespace E; use function STRTOUPPER as STRTOUPPER; class O3 { function id($x) { return $x; } } $o = new O3;
function sleep($x) { return 'own-E-sleep'; }
function usleep($x) { return 'own-E-usleep'; }
echo 22, ':', (static fn() => [strtoupper(1)])()[0], "\n";
echo 23, ':', "[{$o->id((Strtoupper(...))(1))}]", "\n";
echo 24, ':', (\Lib\Sub\Deep\fopen(1) ?: 'x'), "\n";
namespace C\D;  class O4 { function id($x) { return $x; } } $o = new O4;
echo 25, ':', (fn() => fopen(1))(), "\n";
echo 26, ':', (namespace\strtoupper(1) ?: 'x'), "\n";
echo 27, ':', (\strtoupper(1) ?: 'x'), "\n";
echo 28, ':', (fn() => Sleep(1))(), "\n";
echo 29, ':', "[{$o->id(\Usleep(1))}]", "\n";
echo 30, ':', (fn() => Usleep(1))(), "\n";
namespace E; use function Lib\{strtoupper as g10, Sub\usleep as g20}; use function Lib\fopen; use function \strtoupper as STRTOUPPER; class O5 { function id($x) { return $x; } } $o = new O5;
echo 31, ':', (fn() => Strtoupper(1))(), "\n";
echo 32, ':', match (true) { default => (fopen(...))(1) }, "\n";
echo 33, ':', [sleep(1)][0], "\n";
echo 34, ':', $o->id(
   Usleep(1)
), "\n";
echo 35, ':', [STRTOUPPER(1)][0], "\n";
