<?php
namespace Lib; function sleep($x) { return 'lib-sleep'; } function usleep($x) { return 'lib-usleep'; } function fopen($x) { return 'lib-fopen'; } function strtoupper($x) { return 'lib-strtoupper'; }
namespace Lib\Sub; function sleep($x) { return 'sub-sleep'; } function usleep($x) { return 'sub-usleep'; } function fopen($x) { return 'sub-fopen'; } function strtoupper($x) { return 'sub-strtoupper'; }
namespace Lib\Sub\Deep; function sleep($x) { return 'deep-sleep'; } function usleep($x) { return 'deep-usleep'; } function fopen($x) { return 'deep-fopen'; } function strtoupper($x) { return 'deep-strtoupper'; }
namespace E; use function Lib\{sleep as g10, Sub\usleep as g20}; class O0 { function id($x) { return $x; } } $o = new O0;
function fopen($x) { return 'own-E-fopen'; }
echo 1, ':', (function () { return strtoupper(1); })(), "\n";
echo 2, ':', $o->id(
   \STRTOUPPER(1)
), "\n";
echo 3, ':', match (true) { default => \usleep(1) }, "\n";
echo 4, ':', "[{$o->id(FOPEN(1))}]", "\n";
echo 5, ':', \strtoupper(1), "\n";
echo 6, ':', "[{$o->id((\Lib\strtoupper(...))(1))}]", "\n";
namespace A; use function Lib\sleep; use function Lib\fopen as FOPEN; use Lib as L; use Lib as Dp; class O1 { function id($x) { return $x; } } $o = new O1;
echo 7, ':', "[{$o->id(Sleep(1))}]", "\n";
echo 8, ':', (static fn() => [fopen(1)])()[0], "\n";
echo 9, ':', match (true) { default => Sleep(1) }, "\n";
namespace C\D; use function Lib\Sub\strtoupper as x0strtoupper; use function \SLEEP; class O2 { function id($x) { return $x; } } $o = new O2;
echo 10, ':', (function () { return \usleep(1); })(), "\n";
echo 11, ':', "[{$o->id(fopen(1))}]", "\n";
echo 12, ':', $o->id(
   sleep(1)
), "\n";
namespace B; use Lib\Sub\Deep as Dp; use Lib\Sub as Sub; use function \fopen as x2fopen; class O3 { function id($x) { return $x; } } $o = new O3;
function sleep($x) { return 'own-B-sleep'; }
function fopen($x) { return 'own-B-fopen'; }
echo 13, ':', "[{$o->id(sub\sleep(1))}]", "\n";
echo 14, ':', (static fn() => [strtoupper(1)])()[0], "\n";
echo 15, ':', [FOPEN(1)][0], "\n";
echo 16, ':', match (true) { default => sleep(1) }, "\n";
echo 17, ':', (function () { return (\strtoupper(...))(1); })(), "\n";
echo 18, ':', (fn() => namespace\sleep(1))(), "\n";
echo 19, ':', "[{$o->id((strtoupper(...))(1))}]", "\n";
echo 20, ':', [usleep(1)][0], "\n";
echo 21, ':', (static fn() => [fopen(1)])()[0], "\n";
