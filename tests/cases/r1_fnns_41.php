<?php
namespace Lib { function sleep($x) { return 'lib-sleep'; } function usleep($x) { return 'lib-usleep'; } function fopen($x) { return 'lib-fopen'; } function strtoupper($x) { return 'lib-strtoupper'; } }
namespace Lib\Sub { function sleep($x) { return 'sub-sleep'; } function usleep($x) { return 'sub-usleep'; } function fopen($x) { return 'sub-fopen'; } function strtoupper($x) { return 'sub-strtoupper'; } }
namespace Lib\Sub\Deep { function sleep($x) { return 'deep-sleep'; } function usleep($x) { return 'deep-usleep'; } function fopen($x) { return 'deep-fopen'; } function strtoupper($x) { return 'deep-strtoupper'; } }
namespace C\D { use function Lib\{strtoupper as g11, Sub\usleep as g21}; class O0 { function id($x) { return $x; } } $o = new O0;
function sleep($x) { return 'own-C_D-sleep'; }
function usleep($x) { return 'own-C_D-usleep'; }
echo 1, ':', $o->id(
   STRTOUPPER(1)
), "\n";
echo 2, ':', (function () { return SLEEP(1); })(), "\n";
echo 3, ':', match (true) { default => g21(1) }, "\n";
echo 4, ':', (function () { return (usleep(...))(1); })(), "\n";
echo 5, ':', (function () { return \strtoupper(1); })(), "\n";
echo 6, ':', STRTOUPPER(1), "\n";
echo 7, ':', match (true) { default => sleep(1) }, "\n";
}
namespace C\D { use function \STRTOUPPER; use function SLEEP as x2sleep; class O1 { function id($x) { return $x; } } $o = new O1;
echo 8, ':', "[{$o->id(strtoupper(1))}]", "\n";
echo 9, ':', "[{$o->id(Strtoupper(1))}]", "\n";
echo 10, ':', (function () { yield Strtoupper(1); })()->current(), "\n";
echo 11, ':', (fn() => \Lib\Sub\Deep\sleep(1))(), "\n";
echo 12, ':', (static fn() => [usleep(1)])()[0], "\n";
echo 13, ':', [USLEEP(1)][0], "\n";
echo 14, ':', Fopen(1), "\n";
echo 15, ':', (fopen(1) ?: 'x'), "\n";
}
namespace E { use function \USLEEP as USLEEP; use function \FOPEN as FOPEN; use function Lib\Sub\sleep as x3sleep; class O2 { function id($x) { return $x; } } $o = new O2;
function sleep($x) { return 'own-E-sleep'; }
echo 16, ':', (static fn() => [(Usleep(...))(1)])()[0], "\n";
echo 17, ':', "[{$o->id((sleep(...))(1))}]", "\n";
echo 18, ':', (function () { return Sleep(1); })(), "\n";
echo 19, ':', "[{$o->id(fopen(1))}]", "\n";
echo 20, ':', (static fn() => [\sleep(1)])()[0], "\n";
}
namespace B {  class O3 { function id($x) { return $x; } } $o = new O3;
echo 21, ':', (fn() => sleep(1))(), "\n";
echo 22, ':', [sleep(1)][0], "\n";
echo 23, ':', (fn() => \fopen(1))(), "\n";
echo 24, ':', (fn() => Fopen(1))(), "\n";
}
namespace  { use function Lib\Sub\fopen; class O4 { function id($x) { return $x; } } $o = new O4;
echo 25, ':', "[{$o->id((USLEEP(...))(1))}]", "\n";
echo 26, ':', (fn() => sleep(1))(), "\n";
echo 27, ':', (static fn() => [fopen(1)])()[0], "\n";
echo 28, ':', (function () { yield (\Fopen(...))(1); })()->current(), "\n";
echo 29, ':', (fn() => usleep(1))(), "\n";
echo 30, ':', (function () { return \sleep(1); })(), "\n";
echo 31, ':', (static fn() => [sleep(1)])()[0], "\n";
echo 32, ':', (function () { yield \sleep(1); })()->current(), "\n";
echo 33, ':', $o->id(
   STRTOUPPER(1)
), "\n";
}
namespace E { use Lib\Sub\Deep as Dp; use function Lib\fopen as FOPEN; use function Lib\usleep; class O5 { function id($x) { return $x; } } $o = new O5;
echo 34, ':', (fn() => dp\fopen(1))(), "\n";
echo 35, ':', $o->id(
   Sleep(1)
), "\n";
echo 36, ':', $o->id(
   \usleep(1)
), "\n";
echo 37, ':', [usleep(1)][0], "\n";
echo 38, ':', USLEEP(1), "\n";
echo 39, ':', FOPEN(1), "\n";
}
