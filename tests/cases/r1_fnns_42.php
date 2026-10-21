<?php
namespace Lib { function sleep($x) { return 'lib-sleep'; } function usleep($x) { return 'lib-usleep'; } function fopen($x) { return 'lib-fopen'; } function strtoupper($x) { return 'lib-strtoupper'; } }
namespace Lib\Sub { function sleep($x) { return 'sub-sleep'; } function usleep($x) { return 'sub-usleep'; } function fopen($x) { return 'sub-fopen'; } function strtoupper($x) { return 'sub-strtoupper'; } }
namespace Lib\Sub\Deep { function sleep($x) { return 'deep-sleep'; } function usleep($x) { return 'deep-usleep'; } function fopen($x) { return 'deep-fopen'; } function strtoupper($x) { return 'deep-strtoupper'; } }
namespace B { use function FOPEN; use function FOPEN as x3fopen; class O0 { function id($x) { return $x; } } $o = new O0;
function sleep($x) { return 'own-B-sleep'; }
echo 1, ':', (static fn() => [fopen(1)])()[0], "\n";
echo 2, ':', (function () { yield fopen(1); })()->current(), "\n";
echo 3, ':', [usleep(1)][0], "\n";
echo 4, ':', [FOPEN(1)][0], "\n";
echo 5, ':', (fn() => (namespace\sleep(...))(1))(), "\n";
echo 6, ':', match (true) { default => \Lib\Sub\usleep(1) }, "\n";
echo 7, ':', (function () { return SLEEP(1); })(), "\n";
}
namespace E { use function Lib\sleep as x0sleep; class O1 { function id($x) { return $x; } } $o = new O1;
function usleep($x) { return 'own-E-usleep'; }
echo 8, ':', (fn() => Sleep(1))(), "\n";
echo 9, ':', (fn() => USLEEP(1))(), "\n";
echo 10, ':', $o->id(
   USLEEP(1)
), "\n";
echo 11, ':', match (true) { default => fopen(1) }, "\n";
echo 12, ':', [\Lib\Sub\Deep\sleep(1)][0], "\n";
}
namespace B { use function \strtoupper as x0strtoupper; class O2 { function id($x) { return $x; } } $o = new O2;
echo 13, ':', (function () { return (SLEEP(...))(1); })(), "\n";
echo 14, ':', (fn() => usleep(1))(), "\n";
echo 15, ':', $o->id(
   \usleep(1)
), "\n";
echo 16, ':', (Fopen(...))(1), "\n";
echo 17, ':', \fopen(1), "\n";
echo 18, ':', (function () { yield strtoupper(1); })()->current(), "\n";
echo 19, ':', match (true) { default => \Lib\Sub\usleep(1) }, "\n";
echo 20, ':', (static fn() => [Fopen(1)])()[0], "\n";
echo 21, ':', match (true) { default => fopen(1) }, "\n";
}
namespace  { use function Lib\sleep as SLEEP; use Lib as Sub; use Lib as L; class O3 { function id($x) { return $x; } } $o = new O3;
echo 22, ':', ((usleep(...))(1) ?: 'x'), "\n";
echo 23, ':', sleep(1), "\n";
echo 24, ':', (static fn() => [usleep(1)])()[0], "\n";
echo 25, ':', "[{$o->id(sleep(1))}]", "\n";
echo 26, ':', (Strtoupper(1) ?: 'x'), "\n";
}
namespace A { use Lib as Sub; use function Lib\strtoupper as STRTOUPPER; use function Lib\{fopen as g13, Sub\usleep as g23}; class O4 { function id($x) { return $x; } } $o = new O4;
function sleep($x) { return 'own-A-sleep'; }
echo 27, ':', (static fn() => [\STRTOUPPER(1)])()[0], "\n";
echo 28, ':', ((Fopen(...))(1) ?: 'x'), "\n";
echo 29, ':', (static fn() => [usleep(1)])()[0], "\n";
}
namespace  { use function fopen; use function \usleep as USLEEP; use function Lib\{strtoupper as g12, Sub\usleep as g22}; class O5 { function id($x) { return $x; } } $o = new O5;
echo 30, ':', [fopen(1)][0], "\n";
echo 31, ':', [fopen(1)][0], "\n";
echo 32, ':', $o->id(
   (Strtoupper(...))(1)
), "\n";
}
