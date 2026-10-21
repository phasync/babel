<?php
namespace Lib { function sleep($x) { return 'lib-sleep'; } function usleep($x) { return 'lib-usleep'; } function fopen($x) { return 'lib-fopen'; } function strtoupper($x) { return 'lib-strtoupper'; } }
namespace Lib\Sub { function sleep($x) { return 'sub-sleep'; } function usleep($x) { return 'sub-usleep'; } function fopen($x) { return 'sub-fopen'; } function strtoupper($x) { return 'sub-strtoupper'; } }
namespace Lib\Sub\Deep { function sleep($x) { return 'deep-sleep'; } function usleep($x) { return 'deep-usleep'; } function fopen($x) { return 'deep-fopen'; } function strtoupper($x) { return 'deep-strtoupper'; } }
namespace C\D {  class O0 { function id($x) { return $x; } } $o = new O0;
echo 1, ':', (function () { yield strtoupper(1); })()->current(), "\n";
echo 2, ':', [SLEEP(1)][0], "\n";
echo 3, ':', (fn() => usleep(1))(), "\n";
echo 4, ':', (function () { yield \fopen(1); })()->current(), "\n";
echo 5, ':', (function () { yield STRTOUPPER(1); })()->current(), "\n";
echo 6, ':', [\sleep(1)][0], "\n";
}
namespace B { use function Lib\{usleep as g10, Sub\usleep as g20}; class O1 { function id($x) { return $x; } } $o = new O1;
function sleep($x) { return 'own-B-sleep'; }
function strtoupper($x) { return 'own-B-strtoupper'; }
echo 7, ':', (function () { yield \Lib\Sub\strtoupper(1); })()->current(), "\n";
echo 8, ':', (fn() => strtoupper(1))(), "\n";
echo 9, ':', (fn() => (FOPEN(...))(1))(), "\n";
}
namespace  { use Lib\Sub as Dp; class O2 { function id($x) { return $x; } } $o = new O2;
echo 10, ':', $o->id(
   (Usleep(...))(1)
), "\n";
echo 11, ':', match (true) { default => strtoupper(1) }, "\n";
echo 12, ':', (static fn() => [\Usleep(1)])()[0], "\n";
echo 13, ':', (function () { yield usleep(1); })()->current(), "\n";
echo 14, ':', (static fn() => [Sleep(1)])()[0], "\n";
}
namespace A { use function Lib\strtoupper as x0strtoupper; use function Lib\{strtoupper as g11, Sub\usleep as g21}; class O3 { function id($x) { return $x; } } $o = new O3;
function sleep($x) { return 'own-A-sleep'; }
echo 15, ':', (function () { yield Usleep(1); })()->current(), "\n";
echo 16, ':', [USLEEP(1)][0], "\n";
echo 17, ':', "[{$o->id(\Lib\strtoupper(1))}]", "\n";
echo 18, ':', match (true) { default => strtoupper(1) }, "\n";
echo 19, ':', [Strtoupper(1)][0], "\n";
}
namespace C\D {  class O4 { function id($x) { return $x; } } $o = new O4;
echo 20, ':', (sleep(1) ?: 'x'), "\n";
echo 21, ':', (fn() => \usleep(1))(), "\n";
echo 22, ':', (SLEEP(1) ?: 'x'), "\n";
echo 23, ':', (fn() => usleep(1))(), "\n";
echo 24, ':', (function () { yield Usleep(1); })()->current(), "\n";
echo 25, ':', (fopen(1) ?: 'x'), "\n";
echo 26, ':', (static fn() => [(STRTOUPPER(...))(1)])()[0], "\n";
echo 27, ':', [strtoupper(1)][0], "\n";
}
namespace A {  class O5 { function id($x) { return $x; } } $o = new O5;
echo 28, ':', (function () { yield \Lib\Sub\Deep\fopen(1); })()->current(), "\n";
echo 29, ':', match (true) { default => Sleep(1) }, "\n";
echo 30, ':', (static fn() => [Strtoupper(1)])()[0], "\n";
echo 31, ':', $o->id(
   (USLEEP(...))(1)
), "\n";
echo 32, ':', (function () { return (strtoupper(...))(1); })(), "\n";
echo 33, ':', $o->id(
   STRTOUPPER(1)
), "\n";
echo 34, ':', (function () { return (usleep(...))(1); })(), "\n";
echo 35, ':', sleep(1), "\n";
}
namespace A { use Lib\Sub\Deep as L; class O6 { function id($x) { return $x; } } $o = new O6;
echo 36, ':', (l\fopen(1) ?: 'x'), "\n";
echo 37, ':', (static fn() => [l\sleep(1)])()[0], "\n";
echo 38, ':', (function () { yield (\Strtoupper(...))(1); })()->current(), "\n";
echo 39, ':', (function () { yield Usleep(1); })()->current(), "\n";
echo 40, ':', (fn() => usleep(1))(), "\n";
echo 41, ':', match (true) { default => USLEEP(1) }, "\n";
echo 42, ':', (fn() => fopen(1))(), "\n";
echo 43, ':', (function () { return (STRTOUPPER(...))(1); })(), "\n";
}
namespace A { use function Lib\{sleep as g10, Sub\usleep as g20}; class O7 { function id($x) { return $x; } } $o = new O7;
echo 44, ':', $o->id(
   \Usleep(1)
), "\n";
echo 45, ':', [g10(1)][0], "\n";
echo 46, ':', (function () { return fopen(1); })(), "\n";
echo 47, ':', (\Lib\sleep(1) ?: 'x'), "\n";
echo 48, ':', "[{$o->id(namespace\sleep(1))}]", "\n";
echo 49, ':', (static fn() => [usleep(1)])()[0], "\n";
echo 50, ':', g10(1), "\n";
}
namespace B {  class O8 { function id($x) { return $x; } } $o = new O8;
echo 51, ':', $o->id(
   STRTOUPPER(1)
), "\n";
echo 52, ':', match (true) { default => USLEEP(1) }, "\n";
echo 53, ':', Usleep(1), "\n";
echo 54, ':', "[{$o->id(strtoupper(1))}]", "\n";
echo 55, ':', [(\Sleep(...))(1)][0], "\n";
echo 56, ':', (function () { return \usleep(1); })(), "\n";
echo 57, ':', (function () { yield Strtoupper(1); })()->current(), "\n";
echo 58, ':', (function () { return usleep(1); })(), "\n";
}
namespace A { use function Lib\Sub\strtoupper; class O9 { function id($x) { return $x; } } $o = new O9;
echo 59, ':', namespace\sleep(1), "\n";
echo 60, ':', "[{$o->id(\Lib\Sub\Deep\sleep(1))}]", "\n";
echo 61, ':', (strtoupper(...))(1), "\n";
echo 62, ':', "[{$o->id(usleep(1))}]", "\n";
echo 63, ':', match (true) { default => Sleep(1) }, "\n";
echo 64, ':', (sleep(1) ?: 'x'), "\n";
echo 65, ':', match (true) { default => FOPEN(1) }, "\n";
echo 66, ':', (strtoupper(1) ?: 'x'), "\n";
}
namespace E {  class O10 { function id($x) { return $x; } } $o = new O10;
function usleep($x) { return 'own-E-usleep'; }
echo 67, ':', ((fopen(...))(1) ?: 'x'), "\n";
echo 68, ':', "[{$o->id(sleep(1))}]", "\n";
echo 69, ':', (function () { return FOPEN(1); })(), "\n";
}
namespace  { use Lib as Dp; class O11 { function id($x) { return $x; } } $o = new O11;
echo 70, ':', (USLEEP(...))(1), "\n";
echo 71, ':', $o->id(
   (strtoupper(...))(1)
), "\n";
echo 72, ':', (function () { yield dp\usleep(1); })()->current(), "\n";
echo 73, ':', (fopen(1) ?: 'x'), "\n";
echo 74, ':', ((sleep(...))(1) ?: 'x'), "\n";
}
namespace  { use function strtoupper as STRTOUPPER; use Lib\Sub\Deep as L; class O12 { function id($x) { return $x; } } $o = new O12;
echo 75, ':', match (true) { default => (fopen(...))(1) }, "\n";
echo 76, ':', \sleep(1), "\n";
echo 77, ':', (\Lib\Sub\Deep\fopen(1) ?: 'x'), "\n";
echo 78, ':', (function () { yield (strtoupper(...))(1); })()->current(), "\n";
echo 79, ':', (USLEEP(...))(1), "\n";
echo 80, ':', (function () { yield (\USLEEP(...))(1); })()->current(), "\n";
echo 81, ':', (fn() => l\fopen(1))(), "\n";
echo 82, ':', (fn() => strtoupper(1))(), "\n";
echo 83, ':', strtoupper(1), "\n";
}
namespace E { use function Lib\Sub\strtoupper; use function Lib\sleep; use function Lib\{fopen as g13, Sub\usleep as g23}; class O13 { function id($x) { return $x; } } $o = new O13;
echo 84, ':', (\STRTOUPPER(...))(1), "\n";
echo 85, ':', (fn() => usleep(1))(), "\n";
echo 86, ':', $o->id(
   (Sleep(...))(1)
), "\n";
echo 87, ':', (function () { return Sleep(1); })(), "\n";
}
namespace A {  class O14 { function id($x) { return $x; } } $o = new O14;
echo 88, ':', [FOPEN(1)][0], "\n";
echo 89, ':', (function () { return (Sleep(...))(1); })(), "\n";
echo 90, ':', match (true) { default => \Lib\Sub\fopen(1) }, "\n";
echo 91, ':', (function () { yield sleep(1); })()->current(), "\n";
echo 92, ':', (static fn() => [SLEEP(1)])()[0], "\n";
echo 93, ':', $o->id(
   (\sleep(...))(1)
), "\n";
echo 94, ':', (fn() => \usleep(1))(), "\n";
echo 95, ':', (fopen(...))(1), "\n";
echo 96, ':', (function () { return namespace\sleep(1); })(), "\n";
echo 97, ':', match (true) { default => sleep(1) }, "\n";
}
namespace  { use Lib as Dp; use function Lib\sleep as SLEEP; class O15 { function id($x) { return $x; } } $o = new O15;
echo 98, ':', \Strtoupper(1), "\n";
echo 99, ':', $o->id(
   (SLEEP(...))(1)
), "\n";
echo 100, ':', (function () { return (namespace\sleep(...))(1); })(), "\n";
echo 101, ':', Fopen(1), "\n";
echo 102, ':', (fn() => SLEEP(1))(), "\n";
echo 103, ':', $o->id(
   sleep(1)
), "\n";
echo 104, ':', (fn() => (usleep(...))(1))(), "\n";
echo 105, ':', (\USLEEP(1) ?: 'x'), "\n";
echo 106, ':', (static fn() => [\Lib\Sub\fopen(1)])()[0], "\n";
}
namespace E {  class O16 { function id($x) { return $x; } } $o = new O16;
echo 107, ':', (fopen(...))(1), "\n";
echo 108, ':', (fn() => \Lib\Sub\Deep\sleep(1))(), "\n";
echo 109, ':', \usleep(1), "\n";
}
namespace E { use Lib\Sub as L; use function \SLEEP as SLEEP; use function Lib\{strtoupper as g12, Sub\usleep as g22}; class O17 { function id($x) { return $x; } } $o = new O17;
echo 110, ':', USLEEP(1), "\n";
echo 111, ':', (sleep(...))(1), "\n";
echo 112, ':', (sleep(1) ?: 'x'), "\n";
echo 113, ':', match (true) { default => USLEEP(1) }, "\n";
echo 114, ':', (\Lib\Sub\Deep\fopen(1) ?: 'x'), "\n";
echo 115, ':', $o->id(
   sleep(1)
), "\n";
echo 116, ':', (function () { yield Strtoupper(1); })()->current(), "\n";
echo 117, ':', $o->id(
   \Lib\sleep(1)
), "\n";
echo 118, ':', "[{$o->id(sleep(1))}]", "\n";
echo 119, ':', "[{$o->id(fopen(1))}]", "\n";
}
namespace C\D { use Lib\Sub\Deep as Dp; use function Lib\{strtoupper as g11, Sub\usleep as g21}; use function Lib\strtoupper as x2strtoupper; use function SLEEP as x3sleep; class O18 { function id($x) { return $x; } } $o = new O18;
echo 120, ':', dp\sleep(1), "\n";
echo 121, ':', (static fn() => [fopen(1)])()[0], "\n";
echo 122, ':', (fn() => sleep(1))(), "\n";
echo 123, ':', (static fn() => [Strtoupper(1)])()[0], "\n";
echo 124, ':', [\Lib\Sub\Deep\fopen(1)][0], "\n";
echo 125, ':', "[{$o->id(strtoupper(1))}]", "\n";
echo 126, ':', (static fn() => [SLEEP(1)])()[0], "\n";
echo 127, ':', (function () { return \Usleep(1); })(), "\n";
echo 128, ':', (fn() => Strtoupper(1))(), "\n";
echo 129, ':', (dp\strtoupper(1) ?: 'x'), "\n";
}
namespace A { use function Lib\{strtoupper as g10, Sub\usleep as g20}; use function Lib\sleep as x1sleep; use function Lib\{sleep as g13, Sub\usleep as g23}; class O19 { function id($x) { return $x; } } $o = new O19;
echo 130, ':', (g10(1) ?: 'x'), "\n";
echo 131, ':', $o->id(
   usleep(1)
), "\n";
echo 132, ':', [usleep(1)][0], "\n";
echo 133, ':', $o->id(
   \Lib\Sub\sleep(1)
), "\n";
}
namespace B {  class O20 { function id($x) { return $x; } } $o = new O20;
echo 134, ':', (fn() => strtoupper(1))(), "\n";
echo 135, ':', match (true) { default => (usleep(...))(1) }, "\n";
echo 136, ':', (function () { yield sleep(1); })()->current(), "\n";
echo 137, ':', match (true) { default => usleep(1) }, "\n";
echo 138, ':', $o->id(
   fopen(1)
), "\n";
echo 139, ':', (function () { yield Usleep(1); })()->current(), "\n";
echo 140, ':', \Lib\usleep(1), "\n";
echo 141, ':', $o->id(
   Sleep(1)
), "\n";
echo 142, ':', (function () { yield (namespace\sleep(...))(1); })()->current(), "\n";
}
namespace  { use function Lib\strtoupper; use function Lib\sleep; use function \USLEEP as USLEEP; class O21 { function id($x) { return $x; } } $o = new O21;
echo 143, ':', (function () { yield \Fopen(1); })()->current(), "\n";
echo 144, ':', "[{$o->id(strtoupper(1))}]", "\n";
echo 145, ':', USLEEP(1), "\n";
echo 146, ':', (\sleep(1) ?: 'x'), "\n";
}
namespace A { use function Lib\Sub\fopen; use function \usleep as USLEEP; use Lib as L; use function Lib\Sub\sleep as x3sleep; class O22 { function id($x) { return $x; } } $o = new O22;
echo 147, ':', match (true) { default => usleep(1) }, "\n";
echo 148, ':', (\sleep(1) ?: 'x'), "\n";
echo 149, ':', (function () { yield (fopen(...))(1); })()->current(), "\n";
echo 150, ':', match (true) { default => Strtoupper(1) }, "\n";
echo 151, ':', $o->id(
   fopen(1)
), "\n";
echo 152, ':', (function () { return usleep(1); })(), "\n";
echo 153, ':', (sleep(1) ?: 'x'), "\n";
echo 154, ':', (function () { return \Lib\sleep(1); })(), "\n";
echo 155, ':', $o->id(
   usleep(1)
), "\n";
echo 156, ':', $o->id(
   \Fopen(1)
), "\n";
}
namespace C\D { use Lib\Sub as Sub; use function Lib\sleep; class O23 { function id($x) { return $x; } } $o = new O23;
echo 157, ':', [Sleep(1)][0], "\n";
echo 158, ':', [Strtoupper(1)][0], "\n";
echo 159, ':', (fn() => \Lib\strtoupper(1))(), "\n";
echo 160, ':', Sleep(1), "\n";
}
namespace E { use Lib\Sub\Deep as L; use function Lib\Sub\sleep; use function \usleep as x3usleep; class O24 { function id($x) { return $x; } } $o = new O24;
echo 161, ':', [\USLEEP(1)][0], "\n";
echo 162, ':', (Strtoupper(1) ?: 'x'), "\n";
echo 163, ':', (static fn() => [STRTOUPPER(1)])()[0], "\n";
echo 164, ':', (function () { return l\sleep(1); })(), "\n";
echo 165, ':', [sleep(1)][0], "\n";
echo 166, ':', (fn() => \Lib\Sub\Deep\usleep(1))(), "\n";
}
namespace C\D { use Lib\Sub\Deep as L; use function Lib\Sub\fopen; use function Lib\{sleep as g12, Sub\usleep as g22}; use function \USLEEP; class O25 { function id($x) { return $x; } } $o = new O25;
echo 167, ':', (static fn() => [FOPEN(1)])()[0], "\n";
echo 168, ':', (function () { return STRTOUPPER(1); })(), "\n";
echo 169, ':', (fn() => \Lib\Sub\fopen(1))(), "\n";
echo 170, ':', (fn() => g12(1))(), "\n";
}
namespace C\D { use function \SLEEP as SLEEP; use function Lib\Sub\strtoupper; use function Lib\{usleep as g13, Sub\usleep as g23}; class O26 { function id($x) { return $x; } } $o = new O26;
echo 171, ':', sleep(1), "\n";
echo 172, ':', (fn() => usleep(1))(), "\n";
echo 173, ':', (function () { return \Lib\Sub\Deep\fopen(1); })(), "\n";
echo 174, ':', match (true) { default => fopen(1) }, "\n";
echo 175, ':', (fn() => sleep(1))(), "\n";
echo 176, ':', (function () { return Usleep(1); })(), "\n";
echo 177, ':', match (true) { default => FOPEN(1) }, "\n";
echo 178, ':', [sleep(1)][0], "\n";
}
namespace A { use function Lib\{fopen as g10, Sub\usleep as g20}; use Lib\Sub\Deep as Sub; class O27 { function id($x) { return $x; } } $o = new O27;
echo 179, ':', (static fn() => [USLEEP(1)])()[0], "\n";
echo 180, ':', (function () { return sub\fopen(1); })(), "\n";
echo 181, ':', match (true) { default => \usleep(1) }, "\n";
}
namespace A { use function Lib\Sub\sleep as x0sleep; use function Lib\Sub\usleep as USLEEP; use function \SLEEP as x2sleep; class O28 { function id($x) { return $x; } } $o = new O28;
echo 182, ':', match (true) { default => sleep(1) }, "\n";
echo 183, ':', (function () { yield fopen(1); })()->current(), "\n";
echo 184, ':', (function () { yield namespace\sleep(1); })()->current(), "\n";
}
namespace  { use Lib\Sub\Deep as Sub; use function Lib\usleep; use function Lib\sleep as SLEEP; class O29 { function id($x) { return $x; } } $o = new O29;
echo 185, ':', match (true) { default => usleep(1) }, "\n";
echo 186, ':', (function () { return (strtoupper(...))(1); })(), "\n";
echo 187, ':', (fn() => fopen(1))(), "\n";
echo 188, ':', (function () { return sub\sleep(1); })(), "\n";
echo 189, ':', match (true) { default => \fopen(1) }, "\n";
}
namespace A { use function Lib\{strtoupper as g10, Sub\usleep as g20}; use Lib as Dp; class O30 { function id($x) { return $x; } } $o = new O30;
echo 190, ':', (fn() => strtoupper(1))(), "\n";
echo 191, ':', match (true) { default => dp\usleep(1) }, "\n";
echo 192, ':', (function () { yield fopen(1); })()->current(), "\n";
echo 193, ':', match (true) { default => g20(1) }, "\n";
echo 194, ':', [g10(1)][0], "\n";
echo 195, ':', sleep(1), "\n";
echo 196, ':', [strtoupper(1)][0], "\n";
echo 197, ':', [usleep(1)][0], "\n";
echo 198, ':', FOPEN(1), "\n";
}
namespace A { use function Lib\strtoupper as x0strtoupper; class O31 { function id($x) { return $x; } } $o = new O31;
echo 199, ':', (fn() => strtoupper(1))(), "\n";
echo 200, ':', match (true) { default => strtoupper(1) }, "\n";
echo 201, ':', (fn() => Strtoupper(1))(), "\n";
echo 202, ':', match (true) { default => x0strtoupper(1) }, "\n";
echo 203, ':', (function () { yield fopen(1); })()->current(), "\n";
echo 204, ':', (function () { yield fopen(1); })()->current(), "\n";
echo 205, ':', match (true) { default => (fopen(...))(1) }, "\n";
echo 206, ':', [fopen(1)][0], "\n";
echo 207, ':', "[{$o->id(\FOPEN(1))}]", "\n";
}
