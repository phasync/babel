<?php
namespace Lib { function sleep($x) { return 'lib-sleep'; } function usleep($x) { return 'lib-usleep'; } function fopen($x) { return 'lib-fopen'; } function strtoupper($x) { return 'lib-strtoupper'; } }
namespace Lib\Sub { function sleep($x) { return 'sub-sleep'; } function usleep($x) { return 'sub-usleep'; } function fopen($x) { return 'sub-fopen'; } function strtoupper($x) { return 'sub-strtoupper'; } }
namespace Lib\Sub\Deep { function sleep($x) { return 'deep-sleep'; } function usleep($x) { return 'deep-usleep'; } function fopen($x) { return 'deep-fopen'; } function strtoupper($x) { return 'deep-strtoupper'; } }
namespace C\D { use Lib\Sub\Deep as Sub; use function Lib\Sub\usleep as x1usleep; class O0 { function id($x) { return $x; } } $o = new O0;
function sleep($x) { return 'own-C_D-sleep'; }
echo 1, ':', $o->id(
   usleep(1)
), "\n";
echo 2, ':', ((x1usleep(...))(1) ?: 'x'), "\n";
echo 3, ':', "[{$o->id(\Lib\Sub\Deep\sleep(1))}]", "\n";
}
namespace A { use function Lib\fopen; class O1 { function id($x) { return $x; } } $o = new O1;
echo 4, ':', "[{$o->id(FOPEN(1))}]", "\n";
echo 5, ':', $o->id(
   FOPEN(1)
), "\n";
echo 6, ':', usleep(1), "\n";
echo 7, ':', (static fn() => [sleep(1)])()[0], "\n";
echo 8, ':', sleep(1), "\n";
}
namespace B { use function Lib\{fopen as g10, Sub\usleep as g20}; class O2 { function id($x) { return $x; } } $o = new O2;
function usleep($x) { return 'own-B-usleep'; }
echo 9, ':', (static fn() => [USLEEP(1)])()[0], "\n";
echo 10, ':', [(g10(...))(1)][0], "\n";
echo 11, ':', [namespace\usleep(1)][0], "\n";
echo 12, ':', (sleep(1) ?: 'x'), "\n";
}
namespace B { use function Lib\fopen as x0fopen; class O3 { function id($x) { return $x; } } $o = new O3;
echo 13, ':', (static fn() => [\Lib\Sub\Deep\sleep(1)])()[0], "\n";
echo 14, ':', (function () { return usleep(1); })(), "\n";
echo 15, ':', [x0fopen(1)][0], "\n";
echo 16, ':', (static fn() => [FOPEN(1)])()[0], "\n";
}
namespace A { use function \USLEEP; use function \SLEEP as x1sleep; class O4 { function id($x) { return $x; } } $o = new O4;
echo 17, ':', [fopen(1)][0], "\n";
echo 18, ':', (static fn() => [x1sleep(1)])()[0], "\n";
echo 19, ':', "[{$o->id(SLEEP(1))}]", "\n";
echo 20, ':', "[{$o->id(SLEEP(1))}]", "\n";
echo 21, ':', $o->id(
   sleep(1)
), "\n";
echo 22, ':', [Strtoupper(1)][0], "\n";
echo 23, ':', [usleep(1)][0], "\n";
echo 24, ':', match (true) { default => (Sleep(...))(1) }, "\n";
echo 25, ':', (static fn() => [strtoupper(1)])()[0], "\n";
}
namespace E { use function \USLEEP as USLEEP; use function Lib\Sub\sleep; use function Lib\{usleep as g13, Sub\usleep as g23}; class O5 { function id($x) { return $x; } } $o = new O5;
function fopen($x) { return 'own-E-fopen'; }
echo 26, ':', match (true) { default => Usleep(1) }, "\n";
echo 27, ':', (function () { yield (USLEEP(...))(1); })()->current(), "\n";
echo 28, ':', namespace\fopen(1), "\n";
echo 29, ':', (namespace\fopen(1) ?: 'x'), "\n";
echo 30, ':', \Lib\Sub\Deep\sleep(1), "\n";
echo 31, ':', (function () { return namespace\fopen(1); })(), "\n";
echo 32, ':', sleep(1), "\n";
echo 33, ':', fopen(1), "\n";
echo 34, ':', [(STRTOUPPER(...))(1)][0], "\n";
}
namespace A { use function Lib\sleep as x0sleep; use function Lib\{usleep as g11, Sub\usleep as g21}; class O6 { function id($x) { return $x; } } $o = new O6;
echo 35, ':', match (true) { default => (FOPEN(...))(1) }, "\n";
echo 36, ':', "[{$o->id(FOPEN(1))}]", "\n";
echo 37, ':', (static fn() => [FOPEN(1)])()[0], "\n";
echo 38, ':', (function () { return sleep(1); })(), "\n";
echo 39, ':', "[{$o->id(sleep(1))}]", "\n";
echo 40, ':', "[{$o->id(\Lib\Sub\fopen(1))}]", "\n";
echo 41, ':', (Fopen(1) ?: 'x'), "\n";
echo 42, ':', $o->id(
   fopen(1)
), "\n";
}
namespace C\D { use function Lib\usleep as x0usleep; use Lib as Sub; use function Lib\usleep; class O7 { function id($x) { return $x; } } $o = new O7;
echo 43, ':', \Lib\Sub\Deep\sleep(1), "\n";
echo 44, ':', [Strtoupper(1)][0], "\n";
echo 45, ':', (strtoupper(1) ?: 'x'), "\n";
echo 46, ':', "[{$o->id(usleep(1))}]", "\n";
echo 47, ':', (Strtoupper(1) ?: 'x'), "\n";
echo 48, ':', "[{$o->id((Sleep(...))(1))}]", "\n";
echo 49, ':', (fn() => fopen(1))(), "\n";
echo 50, ':', (sleep(...))(1), "\n";
}
namespace  {  class O8 { function id($x) { return $x; } } $o = new O8;
echo 51, ':', (namespace\sleep(1) ?: 'x'), "\n";
echo 52, ':', [fopen(1)][0], "\n";
echo 53, ':', (function () { yield fopen(1); })()->current(), "\n";
echo 54, ':', \SLEEP(1), "\n";
echo 55, ':', (function () { return (STRTOUPPER(...))(1); })(), "\n";
echo 56, ':', $o->id(
   sleep(1)
), "\n";
echo 57, ':', (function () { yield Fopen(1); })()->current(), "\n";
echo 58, ':', match (true) { default => sleep(1) }, "\n";
}
namespace  { use function Lib\Sub\usleep; class O9 { function id($x) { return $x; } } $o = new O9;
echo 59, ':', (fn() => usleep(1))(), "\n";
echo 60, ':', (\FOPEN(1) ?: 'x'), "\n";
echo 61, ':', match (true) { default => (\Lib\usleep(...))(1) }, "\n";
echo 62, ':', match (true) { default => usleep(1) }, "\n";
echo 63, ':', $o->id(
   (\fopen(...))(1)
), "\n";
echo 64, ':', (function () { return Fopen(1); })(), "\n";
echo 65, ':', (static fn() => [usleep(1)])()[0], "\n";
echo 66, ':', \Lib\usleep(1), "\n";
echo 67, ':', (static fn() => [\SLEEP(1)])()[0], "\n";
}
namespace C\D { use function \STRTOUPPER as x0strtoupper; use function Lib\{strtoupper as g11, Sub\usleep as g21}; use Lib as Dp; class O10 { function id($x) { return $x; } } $o = new O10;
echo 68, ':', (function () { return Usleep(1); })(), "\n";
echo 69, ':', (static fn() => [usleep(1)])()[0], "\n";
echo 70, ':', (static fn() => [\Lib\usleep(1)])()[0], "\n";
echo 71, ':', $o->id(
   SLEEP(1)
), "\n";
echo 72, ':', (function () { return usleep(1); })(), "\n";
echo 73, ':', \Lib\Sub\Deep\usleep(1), "\n";
echo 74, ':', \strtoupper(1), "\n";
}
namespace  { use function Lib\Sub\fopen as x0fopen; use function SLEEP; class O11 { function id($x) { return $x; } } $o = new O11;
echo 75, ':', $o->id(
   \fopen(1)
), "\n";
echo 76, ':', (function () { yield namespace\usleep(1); })()->current(), "\n";
echo 77, ':', $o->id(
   Usleep(1)
), "\n";
echo 78, ':', namespace\strtoupper(1), "\n";
echo 79, ':', (function () { yield USLEEP(1); })()->current(), "\n";
echo 80, ':', (function () { return \Lib\sleep(1); })(), "\n";
echo 81, ':', (sleep(1) ?: 'x'), "\n";
echo 82, ':', $o->id(
   \Lib\Sub\usleep(1)
), "\n";
echo 83, ':', "[{$o->id(FOPEN(1))}]", "\n";
echo 84, ':', (fn() => strtoupper(1))(), "\n";
}
namespace A { use function \STRTOUPPER as x0strtoupper; class O12 { function id($x) { return $x; } } $o = new O12;
echo 85, ':', (static fn() => [(usleep(...))(1)])()[0], "\n";
echo 86, ':', $o->id(
   \Lib\Sub\strtoupper(1)
), "\n";
echo 87, ':', $o->id(
   \Lib\Sub\usleep(1)
), "\n";
echo 88, ':', $o->id(
   Fopen(1)
), "\n";
echo 89, ':', (fn() => (sleep(...))(1))(), "\n";
echo 90, ':', $o->id(
   \fopen(1)
), "\n";
}
namespace E { use function \sleep as SLEEP; class O13 { function id($x) { return $x; } } $o = new O13;
echo 91, ':', (STRTOUPPER(1) ?: 'x'), "\n";
echo 92, ':', (fn() => Usleep(1))(), "\n";
echo 93, ':', (strtoupper(1) ?: 'x'), "\n";
echo 94, ':', (strtoupper(1) ?: 'x'), "\n";
echo 95, ':', (fn() => fopen(1))(), "\n";
echo 96, ':', "[{$o->id(strtoupper(1))}]", "\n";
echo 97, ':', (sleep(1) ?: 'x'), "\n";
echo 98, ':', (function () { yield fopen(1); })()->current(), "\n";
}
namespace E { use function Lib\sleep as x0sleep; use Lib\Sub as Sub; use function Lib\{fopen as g12, Sub\usleep as g22}; class O14 { function id($x) { return $x; } } $o = new O14;
echo 99, ':', (static fn() => [Usleep(1)])()[0], "\n";
echo 100, ':', (function () { return fopen(1); })(), "\n";
echo 101, ':', (fn() => g12(1))(), "\n";
echo 102, ':', [USLEEP(1)][0], "\n";
}
namespace  { use function Lib\usleep; use function Lib\{usleep as g11, Sub\usleep as g21}; use function Lib\{strtoupper as g12, Sub\usleep as g22}; class O15 { function id($x) { return $x; } } $o = new O15;
echo 103, ':', $o->id(
   sleep(1)
), "\n";
echo 104, ':', (static fn() => [strtoupper(1)])()[0], "\n";
echo 105, ':', (fn() => strtoupper(1))(), "\n";
echo 106, ':', [strtoupper(1)][0], "\n";
}
namespace B { use function fopen as x0fopen; use function \STRTOUPPER as x3strtoupper; class O16 { function id($x) { return $x; } } $o = new O16;
echo 107, ':', (\Lib\Sub\usleep(1) ?: 'x'), "\n";
echo 108, ':', (fn() => \Fopen(1))(), "\n";
echo 109, ':', "[{$o->id((Sleep(...))(1))}]", "\n";
echo 110, ':', (static fn() => [STRTOUPPER(1)])()[0], "\n";
echo 111, ':', $o->id(
   USLEEP(1)
), "\n";
echo 112, ':', $o->id(
   (sleep(...))(1)
), "\n";
echo 113, ':', match (true) { default => (Sleep(...))(1) }, "\n";
echo 114, ':', (FOPEN(1) ?: 'x'), "\n";
echo 115, ':', (function () { yield SLEEP(1); })()->current(), "\n";
echo 116, ':', match (true) { default => \Lib\Sub\Deep\sleep(1) }, "\n";
}
namespace  { use function strtoupper; class O17 { function id($x) { return $x; } } $o = new O17;
echo 117, ':', (function () { return strtoupper(1); })(), "\n";
echo 118, ':', match (true) { default => strtoupper(1) }, "\n";
echo 119, ':', $o->id(
   \Sleep(1)
), "\n";
echo 120, ':', (namespace\fopen(1) ?: 'x'), "\n";
echo 121, ':', (function () { yield strtoupper(1); })()->current(), "\n";
echo 122, ':', (fn() => sleep(1))(), "\n";
echo 123, ':', (fn() => FOPEN(1))(), "\n";
echo 124, ':', (\Lib\fopen(1) ?: 'x'), "\n";
echo 125, ':', SLEEP(1), "\n";
}
namespace  { use function SLEEP as SLEEP; use function Lib\strtoupper; class O18 { function id($x) { return $x; } } $o = new O18;
echo 126, ':', "[{$o->id(Fopen(1))}]", "\n";
echo 127, ':', strtoupper(1), "\n";
echo 128, ':', (function () { return \Strtoupper(1); })(), "\n";
echo 129, ':', match (true) { default => strtoupper(1) }, "\n";
echo 130, ':', match (true) { default => (\Lib\Sub\Deep\usleep(...))(1) }, "\n";
echo 131, ':', match (true) { default => (namespace\sleep(...))(1) }, "\n";
echo 132, ':', (function () { return namespace\strtoupper(1); })(), "\n";
echo 133, ':', $o->id(
   strtoupper(1)
), "\n";
echo 134, ':', (static fn() => [Fopen(1)])()[0], "\n";
}
namespace A {  class O19 { function id($x) { return $x; } } $o = new O19;
echo 135, ':', "[{$o->id(FOPEN(1))}]", "\n";
echo 136, ':', (USLEEP(...))(1), "\n";
echo 137, ':', (function () { yield fopen(1); })()->current(), "\n";
echo 138, ':', (function () { return \sleep(1); })(), "\n";
echo 139, ':', match (true) { default => (fopen(...))(1) }, "\n";
}
namespace A { use function Lib\sleep; use Lib\Sub\Deep as L; use function Lib\{strtoupper as g12, Sub\usleep as g22}; class O20 { function id($x) { return $x; } } $o = new O20;
echo 140, ':', l\usleep(1), "\n";
echo 141, ':', match (true) { default => \Lib\sleep(1) }, "\n";
echo 142, ':', (static fn() => [Fopen(1)])()[0], "\n";
echo 143, ':', (fn() => sleep(1))(), "\n";
echo 144, ':', [usleep(1)][0], "\n";
echo 145, ':', [l\sleep(1)][0], "\n";
echo 146, ':', $o->id(
   sleep(1)
), "\n";
}
namespace B { use function Lib\Sub\sleep as SLEEP; use function Lib\strtoupper; class O21 { function id($x) { return $x; } } $o = new O21;
echo 147, ':', [(sleep(...))(1)][0], "\n";
echo 148, ':', (fn() => SLEEP(1))(), "\n";
echo 149, ':', match (true) { default => \Lib\Sub\strtoupper(1) }, "\n";
echo 150, ':', (strtoupper(1) ?: 'x'), "\n";
echo 151, ':', match (true) { default => FOPEN(1) }, "\n";
echo 152, ':', (function () { yield Sleep(1); })()->current(), "\n";
}
namespace  { use function \fopen; use function STRTOUPPER as x1strtoupper; use function \strtoupper; class O22 { function id($x) { return $x; } } $o = new O22;
echo 153, ':', "[{$o->id(strtoupper(1))}]", "\n";
echo 154, ':', (namespace\usleep(1) ?: 'x'), "\n";
echo 155, ':', (static fn() => [(FOPEN(...))(1)])()[0], "\n";
echo 156, ':', (function () { yield strtoupper(1); })()->current(), "\n";
echo 157, ':', "[{$o->id(usleep(1))}]", "\n";
echo 158, ':', (static fn() => [(FOPEN(...))(1)])()[0], "\n";
echo 159, ':', (function () { yield Strtoupper(1); })()->current(), "\n";
echo 160, ':', (STRTOUPPER(1) ?: 'x'), "\n";
}
namespace B {  class O23 { function id($x) { return $x; } } $o = new O23;
echo 161, ':', (function () { return SLEEP(1); })(), "\n";
echo 162, ':', "[{$o->id(Usleep(1))}]", "\n";
echo 163, ':', $o->id(
   (FOPEN(...))(1)
), "\n";
echo 164, ':', $o->id(
   Strtoupper(1)
), "\n";
echo 165, ':', usleep(1), "\n";
}
namespace  { use function Lib\Sub\usleep as USLEEP; class O24 { function id($x) { return $x; } } $o = new O24;
echo 166, ':', "[{$o->id(Sleep(1))}]", "\n";
echo 167, ':', (function () { yield Strtoupper(1); })()->current(), "\n";
echo 168, ':', \Lib\Sub\usleep(1), "\n";
echo 169, ':', (function () { return usleep(1); })(), "\n";
echo 170, ':', (\strtoupper(1) ?: 'x'), "\n";
echo 171, ':', (function () { yield usleep(1); })()->current(), "\n";
echo 172, ':', $o->id(
   \sleep(1)
), "\n";
echo 173, ':', (fn() => (STRTOUPPER(...))(1))(), "\n";
echo 174, ':', (sleep(1) ?: 'x'), "\n";
echo 175, ':', "[{$o->id(usleep(1))}]", "\n";
}
namespace B { use function Lib\Sub\sleep; use function Lib\{strtoupper as g11, Sub\usleep as g21}; use function Lib\fopen as x2fopen; class O25 { function id($x) { return $x; } } $o = new O25;
echo 176, ':', $o->id(
   \Lib\Sub\fopen(1)
), "\n";
echo 177, ':', (function () { yield \Lib\strtoupper(1); })()->current(), "\n";
echo 178, ':', (function () { yield sleep(1); })()->current(), "\n";
echo 179, ':', $o->id(
   sleep(1)
), "\n";
echo 180, ':', match (true) { default => x2fopen(1) }, "\n";
echo 181, ':', (function () { yield strtoupper(1); })()->current(), "\n";
echo 182, ':', (fn() => sleep(1))(), "\n";
}
namespace A { use function Lib\Sub\strtoupper as STRTOUPPER; use Lib\Sub\Deep as Sub; use function \STRTOUPPER as x2strtoupper; class O26 { function id($x) { return $x; } } $o = new O26;
echo 183, ':', (function () { yield \fopen(1); })()->current(), "\n";
echo 184, ':', usleep(1), "\n";
echo 185, ':', "[{$o->id((strtoupper(...))(1))}]", "\n";
echo 186, ':', (static fn() => [\Lib\Sub\Deep\strtoupper(1)])()[0], "\n";
echo 187, ':', (function () { yield (strtoupper(...))(1); })()->current(), "\n";
echo 188, ':', [SLEEP(1)][0], "\n";
echo 189, ':', (fn() => sub\usleep(1))(), "\n";
}
namespace E { use Lib as L; use function Lib\Sub\usleep as USLEEP; class O27 { function id($x) { return $x; } } $o = new O27;
echo 190, ':', (function () { return fopen(1); })(), "\n";
echo 191, ':', SLEEP(1), "\n";
echo 192, ':', (fn() => strtoupper(1))(), "\n";
}
namespace A { use function \sleep as x0sleep; class O28 { function id($x) { return $x; } } $o = new O28;
echo 193, ':', match (true) { default => (\FOPEN(...))(1) }, "\n";
echo 194, ':', (function () { return x0sleep(1); })(), "\n";
echo 195, ':', $o->id(
   x0sleep(1)
), "\n";
echo 196, ':', (function () { yield FOPEN(1); })()->current(), "\n";
echo 197, ':', "[{$o->id(fopen(1))}]", "\n";
echo 198, ':', (static fn() => [\Lib\Sub\Deep\usleep(1)])()[0], "\n";
}
namespace A { use function \USLEEP; class O29 { function id($x) { return $x; } } $o = new O29;
echo 199, ':', ((usleep(...))(1) ?: 'x'), "\n";
echo 200, ':', "[{$o->id(Strtoupper(1))}]", "\n";
echo 201, ':', [FOPEN(1)][0], "\n";
echo 202, ':', [Fopen(1)][0], "\n";
echo 203, ':', "[{$o->id(strtoupper(1))}]", "\n";
echo 204, ':', (strtoupper(...))(1), "\n";
echo 205, ':', (static fn() => [Strtoupper(1)])()[0], "\n";
echo 206, ':', (fn() => fopen(1))(), "\n";
}
namespace E { use Lib as Dp; class O30 { function id($x) { return $x; } } $o = new O30;
echo 207, ':', dp\strtoupper(1), "\n";
echo 208, ':', match (true) { default => strtoupper(1) }, "\n";
echo 209, ':', (fn() => FOPEN(1))(), "\n";
echo 210, ':', fopen(1), "\n";
echo 211, ':', (Sleep(1) ?: 'x'), "\n";
echo 212, ':', (static fn() => [strtoupper(1)])()[0], "\n";
echo 213, ':', (fopen(1) ?: 'x'), "\n";
echo 214, ':', match (true) { default => Fopen(1) }, "\n";
echo 215, ':', (fn() => \Lib\sleep(1))(), "\n";
echo 216, ':', (static fn() => [\Lib\Sub\Deep\strtoupper(1)])()[0], "\n";
}
namespace  {  class O31 { function id($x) { return $x; } } $o = new O31;
echo 217, ':', (fopen(1) ?: 'x'), "\n";
echo 218, ':', (function () { return namespace\usleep(1); })(), "\n";
echo 219, ':', $o->id(
   \Lib\Sub\Deep\fopen(1)
), "\n";
echo 220, ':', (function () { yield SLEEP(1); })()->current(), "\n";
}
