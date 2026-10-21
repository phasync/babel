<?php
namespace Lib; function sleep($x) { return 'lib-sleep'; } function usleep($x) { return 'lib-usleep'; } function fopen($x) { return 'lib-fopen'; } function strtoupper($x) { return 'lib-strtoupper'; }
namespace Lib\Sub; function sleep($x) { return 'sub-sleep'; } function usleep($x) { return 'sub-usleep'; } function fopen($x) { return 'sub-fopen'; } function strtoupper($x) { return 'sub-strtoupper'; }
namespace Lib\Sub\Deep; function sleep($x) { return 'deep-sleep'; } function usleep($x) { return 'deep-usleep'; } function fopen($x) { return 'deep-fopen'; } function strtoupper($x) { return 'deep-strtoupper'; }
namespace C\D; use function Lib\Sub\usleep; use function Lib\{usleep as g11, Sub\usleep as g21}; class O0 { function id($x) { return $x; } } $o = new O0;
function sleep($x) { return 'own-C_D-sleep'; }
echo 1, ':', SLEEP(1), "\n";
echo 2, ':', g21(1), "\n";
echo 3, ':', ((sleep(...))(1) ?: 'x'), "\n";
echo 4, ':', $o->id(
   namespace\sleep(1)
), "\n";
echo 5, ':', match (true) { default => \Lib\Sub\Deep\strtoupper(1) }, "\n";
echo 6, ':', (fn() => usleep(1))(), "\n";
echo 7, ':', $o->id(
   (Sleep(...))(1)
), "\n";
namespace B;  class O1 { function id($x) { return $x; } } $o = new O1;
function fopen($x) { return 'own-B-fopen'; }
echo 8, ':', SLEEP(1), "\n";
echo 9, ':', (fn() => fopen(1))(), "\n";
echo 10, ':', (static fn() => [sleep(1)])()[0], "\n";
echo 11, ':', Sleep(1), "\n";
echo 12, ':', (function () { return SLEEP(1); })(), "\n";
echo 13, ':', "[{$o->id(strtoupper(1))}]", "\n";
echo 14, ':', (fn() => \Lib\Sub\usleep(1))(), "\n";
echo 15, ':', "[{$o->id(\Lib\Sub\strtoupper(1))}]", "\n";
namespace C\D;  class O2 { function id($x) { return $x; } } $o = new O2;
echo 16, ':', "[{$o->id(fopen(1))}]", "\n";
echo 17, ':', Usleep(1), "\n";
echo 18, ':', [\Fopen(1)][0], "\n";
echo 19, ':', (function () { return sleep(1); })(), "\n";
echo 20, ':', (fn() => SLEEP(1))(), "\n";
echo 21, ':', (function () { return \Lib\Sub\strtoupper(1); })(), "\n";
echo 22, ':', "[{$o->id(strtoupper(1))}]", "\n";
echo 23, ':', "[{$o->id(strtoupper(1))}]", "\n";
echo 24, ':', (function () { return (fopen(...))(1); })(), "\n";
