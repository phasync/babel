<?php
namespace Lib; function sleep($x) { return 'lib-sleep'; } function usleep($x) { return 'lib-usleep'; } function fopen($x) { return 'lib-fopen'; } function strtoupper($x) { return 'lib-strtoupper'; }
namespace Lib\Sub; function sleep($x) { return 'sub-sleep'; } function usleep($x) { return 'sub-usleep'; } function fopen($x) { return 'sub-fopen'; } function strtoupper($x) { return 'sub-strtoupper'; }
namespace Lib\Sub\Deep; function sleep($x) { return 'deep-sleep'; } function usleep($x) { return 'deep-usleep'; } function fopen($x) { return 'deep-fopen'; } function strtoupper($x) { return 'deep-strtoupper'; }
namespace A; use Lib\Sub as Sub; use function Lib\sleep; use function Lib\{strtoupper as g12, Sub\usleep as g22}; use function strtoupper as STRTOUPPER; class O0 { function id($x) { return $x; } } $o = new O0;
echo 1, ':', [\Lib\Sub\Deep\fopen(1)][0], "\n";
echo 2, ':', strtoupper(1), "\n";
echo 3, ':', (sleep(1) ?: 'x'), "\n";
echo 4, ':', match (true) { default => (fopen(...))(1) }, "\n";
echo 5, ':', $o->id(
   strtoupper(1)
), "\n";
echo 6, ':', (fn() => sub\strtoupper(1))(), "\n";
echo 7, ':', ((\Lib\strtoupper(...))(1) ?: 'x'), "\n";
echo 8, ':', (sub\sleep(1) ?: 'x'), "\n";
echo 9, ':', (function () { return strtoupper(1); })(), "\n";
echo 10, ':', (fn() => g12(1))(), "\n";
namespace C\D;  class O1 { function id($x) { return $x; } } $o = new O1;
function sleep($x) { return 'own-C_D-sleep'; }
echo 11, ':', (function () { return fopen(1); })(), "\n";
echo 12, ':', (fn() => \Usleep(1))(), "\n";
echo 13, ':', (function () { yield STRTOUPPER(1); })()->current(), "\n";
echo 14, ':', match (true) { default => fopen(1) }, "\n";
echo 15, ':', (sleep(1) ?: 'x'), "\n";
echo 16, ':', (function () { return Sleep(1); })(), "\n";
echo 17, ':', (fn() => namespace\sleep(1))(), "\n";
echo 18, ':', (static fn() => [Strtoupper(1)])()[0], "\n";
echo 19, ':', match (true) { default => USLEEP(1) }, "\n";
echo 20, ':', Strtoupper(1), "\n";
namespace C\D; use function \strtoupper as x0strtoupper; use Lib\Sub as Sub; use function Lib\{strtoupper as g13, Sub\usleep as g23}; class O2 { function id($x) { return $x; } } $o = new O2;
echo 21, ':', FOPEN(1), "\n";
echo 22, ':', (STRTOUPPER(1) ?: 'x'), "\n";
echo 23, ':', $o->id(
   Sleep(1)
), "\n";
echo 24, ':', "[{$o->id(Sleep(1))}]", "\n";
namespace B; use function Lib\Sub\usleep; use Lib\Sub as Dp; use function Lib\{strtoupper as g12, Sub\usleep as g22}; class O3 { function id($x) { return $x; } } $o = new O3;
function strtoupper($x) { return 'own-B-strtoupper'; }
echo 25, ':', "[{$o->id(fopen(1))}]", "\n";
echo 26, ':', (fn() => dp\sleep(1))(), "\n";
echo 27, ':', (function () { return dp\fopen(1); })(), "\n";
namespace B;  class O4 { function id($x) { return $x; } } $o = new O4;
echo 28, ':', [\sleep(1)][0], "\n";
echo 29, ':', (static fn() => [Sleep(1)])()[0], "\n";
echo 30, ':', (function () { yield SLEEP(1); })()->current(), "\n";
echo 31, ':', [Fopen(1)][0], "\n";
namespace E; use function Lib\{strtoupper as g10, Sub\usleep as g20}; use Lib as Sub; use Lib\Sub as L; class O5 { function id($x) { return $x; } } $o = new O5;
function fopen($x) { return 'own-E-fopen'; }
echo 32, ':', match (true) { default => \STRTOUPPER(1) }, "\n";
echo 33, ':', (static fn() => [namespace\fopen(1)])()[0], "\n";
echo 34, ':', "[{$o->id(sub\sleep(1))}]", "\n";
echo 35, ':', [(Fopen(...))(1)][0], "\n";
echo 36, ':', (function () { return (g10(...))(1); })(), "\n";
echo 37, ':', sleep(1), "\n";
echo 38, ':', match (true) { default => (\Lib\Sub\Deep\fopen(...))(1) }, "\n";
echo 39, ':', $o->id(
   sleep(1)
), "\n";
echo 40, ':', match (true) { default => fopen(1) }, "\n";
echo 41, ':', sub\strtoupper(1), "\n";
