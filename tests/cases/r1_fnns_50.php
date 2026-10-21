<?php
namespace Lib; function sleep($x) { return 'lib-sleep'; } function usleep($x) { return 'lib-usleep'; } function fopen($x) { return 'lib-fopen'; } function strtoupper($x) { return 'lib-strtoupper'; }
namespace Lib\Sub; function sleep($x) { return 'sub-sleep'; } function usleep($x) { return 'sub-usleep'; } function fopen($x) { return 'sub-fopen'; } function strtoupper($x) { return 'sub-strtoupper'; }
namespace Lib\Sub\Deep; function sleep($x) { return 'deep-sleep'; } function usleep($x) { return 'deep-usleep'; } function fopen($x) { return 'deep-fopen'; } function strtoupper($x) { return 'deep-strtoupper'; }
namespace E; use function Lib\{sleep as g10, Sub\usleep as g20}; class O0 { function id($x) { return $x; } } $o = new O0;
function fopen($x) { return 'own-E-fopen'; }
echo 1, ':', (FOPEN(1) ?: 'x'), "\n";
echo 2, ':', "[{$o->id((\Lib\Sub\fopen(...))(1))}]", "\n";
echo 3, ':', (fn() => fopen(1))(), "\n";
echo 4, ':', (function () { yield Usleep(1); })()->current(), "\n";
echo 5, ':', \SLEEP(1), "\n";
echo 6, ':', (Strtoupper(1) ?: 'x'), "\n";
echo 7, ':', (\Lib\usleep(1) ?: 'x'), "\n";
echo 8, ':', (static fn() => [(Usleep(...))(1)])()[0], "\n";
echo 9, ':', (static fn() => [(Sleep(...))(1)])()[0], "\n";
echo 10, ':', (function () { yield strtoupper(1); })()->current(), "\n";
namespace B; use function sleep as x0sleep; use function Lib\sleep as SLEEP; class O1 { function id($x) { return $x; } } $o = new O1;
echo 11, ':', "[{$o->id((usleep(...))(1))}]", "\n";
echo 12, ':', $o->id(
   usleep(1)
), "\n";
echo 13, ':', (function () { return \Lib\Sub\Deep\fopen(1); })(), "\n";
echo 14, ':', (static fn() => [sleep(1)])()[0], "\n";
echo 15, ':', "[{$o->id(\STRTOUPPER(1))}]", "\n";
echo 16, ':', [strtoupper(1)][0], "\n";
namespace B; use function FOPEN as x0fopen; use function Lib\{strtoupper as g11, Sub\usleep as g21}; class O2 { function id($x) { return $x; } } $o = new O2;
echo 17, ':', (fn() => Fopen(1))(), "\n";
echo 18, ':', (function () { yield fopen(1); })()->current(), "\n";
echo 19, ':', (static fn() => [(fopen(...))(1)])()[0], "\n";
echo 20, ':', Strtoupper(1), "\n";
echo 21, ':', (function () { return x0fopen(1); })(), "\n";
echo 22, ':', match (true) { default => (Sleep(...))(1) }, "\n";
namespace A; use Lib\Sub\Deep as Dp; use Lib\Sub as L; class O3 { function id($x) { return $x; } } $o = new O3;
echo 23, ':', (function () { yield l\usleep(1); })()->current(), "\n";
echo 24, ':', (l\fopen(...))(1), "\n";
echo 25, ':', (strtoupper(1) ?: 'x'), "\n";
echo 26, ':', (static fn() => [Sleep(1)])()[0], "\n";
echo 27, ':', $o->id(
   l\strtoupper(1)
), "\n";
echo 28, ':', ((usleep(...))(1) ?: 'x'), "\n";
echo 29, ':', ((strtoupper(...))(1) ?: 'x'), "\n";
namespace E; use function Lib\{fopen as g10, Sub\usleep as g20}; use Lib\Sub as Dp; use function \strtoupper as STRTOUPPER; class O4 { function id($x) { return $x; } } $o = new O4;
echo 30, ':', (static fn() => [dp\usleep(1)])()[0], "\n";
echo 31, ':', (function () { yield Usleep(1); })()->current(), "\n";
echo 32, ':', g20(1), "\n";
echo 33, ':', (function () { return usleep(1); })(), "\n";
echo 34, ':', (function () { yield fopen(1); })()->current(), "\n";
namespace A;  class O5 { function id($x) { return $x; } } $o = new O5;
echo 35, ':', [FOPEN(1)][0], "\n";
echo 36, ':', "[{$o->id(strtoupper(1))}]", "\n";
echo 37, ':', (fn() => Usleep(1))(), "\n";
echo 38, ':', $o->id(
   (fopen(...))(1)
), "\n";
echo 39, ':', [usleep(1)][0], "\n";
echo 40, ':', ((strtoupper(...))(1) ?: 'x'), "\n";
echo 41, ':', (function () { yield \Fopen(1); })()->current(), "\n";
namespace C\D; use function Lib\usleep as x0usleep; class O6 { function id($x) { return $x; } } $o = new O6;
function usleep($x) { return 'own-C_D-usleep'; }
echo 42, ':', (fn() => strtoupper(1))(), "\n";
echo 43, ':', (fn() => SLEEP(1))(), "\n";
echo 44, ':', (fn() => Usleep(1))(), "\n";
namespace B; use function \STRTOUPPER as STRTOUPPER; class O7 { function id($x) { return $x; } } $o = new O7;
echo 45, ':', match (true) { default => (Strtoupper(...))(1) }, "\n";
echo 46, ':', [STRTOUPPER(1)][0], "\n";
echo 47, ':', (Fopen(...))(1), "\n";
echo 48, ':', [\sleep(1)][0], "\n";
namespace C\D; use function \USLEEP as x0usleep; use function Lib\{strtoupper as g11, Sub\usleep as g21}; class O8 { function id($x) { return $x; } } $o = new O8;
echo 49, ':', "[{$o->id(USLEEP(1))}]", "\n";
echo 50, ':', (function () { yield (x0usleep(...))(1); })()->current(), "\n";
echo 51, ':', match (true) { default => sleep(1) }, "\n";
echo 52, ':', (function () { return g11(1); })(), "\n";
echo 53, ':', (Sleep(1) ?: 'x'), "\n";
echo 54, ':', "[{$o->id(\Lib\Sub\Deep\usleep(1))}]", "\n";
namespace A; use function Lib\Sub\fopen as x0fopen; use function \sleep; class O9 { function id($x) { return $x; } } $o = new O9;
echo 55, ':', (function () { yield USLEEP(1); })()->current(), "\n";
echo 56, ':', match (true) { default => \sleep(1) }, "\n";
echo 57, ':', (function () { return FOPEN(1); })(), "\n";
echo 58, ':', "[{$o->id(usleep(1))}]", "\n";
echo 59, ':', "[{$o->id(sleep(1))}]", "\n";
echo 60, ':', [(Fopen(...))(1)][0], "\n";
namespace E; use function Lib\Sub\usleep as x0usleep; use Lib as Dp; use function strtoupper; class O10 { function id($x) { return $x; } } $o = new O10;
echo 61, ':', match (true) { default => namespace\fopen(1) }, "\n";
echo 62, ':', "[{$o->id(Sleep(1))}]", "\n";
echo 63, ':', x0usleep(1), "\n";
echo 64, ':', (namespace\fopen(1) ?: 'x'), "\n";
echo 65, ':', (static fn() => [(dp\fopen(...))(1)])()[0], "\n";
echo 66, ':', (static fn() => [SLEEP(1)])()[0], "\n";
namespace B; use function Lib\{usleep as g10, Sub\usleep as g20}; use function Lib\{strtoupper as g11, Sub\usleep as g21}; class O11 { function id($x) { return $x; } } $o = new O11;
echo 67, ':', (fn() => sleep(1))(), "\n";
echo 68, ':', $o->id(
   Sleep(1)
), "\n";
echo 69, ':', (static fn() => [\Lib\Sub\strtoupper(1)])()[0], "\n";
echo 70, ':', (SLEEP(1) ?: 'x'), "\n";
echo 71, ':', "[{$o->id((usleep(...))(1))}]", "\n";
echo 72, ':', (function () { return (SLEEP(...))(1); })(), "\n";
echo 73, ':', (fn() => Usleep(1))(), "\n";
echo 74, ':', match (true) { default => (\STRTOUPPER(...))(1) }, "\n";
echo 75, ':', [\Lib\Sub\Deep\usleep(1)][0], "\n";
echo 76, ':', (function () { return usleep(1); })(), "\n";
namespace C\D; use function Lib\Sub\strtoupper; use Lib\Sub\Deep as Sub; class O12 { function id($x) { return $x; } } $o = new O12;
echo 77, ':', (static fn() => [sleep(1)])()[0], "\n";
echo 78, ':', $o->id(
   strtoupper(1)
), "\n";
echo 79, ':', match (true) { default => (\FOPEN(...))(1) }, "\n";
echo 80, ':', (Sleep(1) ?: 'x'), "\n";
namespace E; use function Lib\strtoupper as STRTOUPPER; class O13 { function id($x) { return $x; } } $o = new O13;
echo 81, ':', (function () { return \sleep(1); })(), "\n";
echo 82, ':', match (true) { default => fopen(1) }, "\n";
echo 83, ':', \Lib\sleep(1), "\n";
namespace E; use function FOPEN as x1fopen; class O14 { function id($x) { return $x; } } $o = new O14;
echo 84, ':', (\Lib\strtoupper(1) ?: 'x'), "\n";
echo 85, ':', (static fn() => [(USLEEP(...))(1)])()[0], "\n";
echo 86, ':', (static fn() => [Usleep(1)])()[0], "\n";
echo 87, ':', (fn() => sleep(1))(), "\n";
echo 88, ':', (function () { yield \Lib\Sub\usleep(1); })()->current(), "\n";
echo 89, ':', match (true) { default => \Lib\sleep(1) }, "\n";
echo 90, ':', Usleep(1), "\n";
namespace B; use function Lib\Sub\fopen as x0fopen; use Lib as Sub; use function Lib\{usleep as g12, Sub\usleep as g22}; class O15 { function id($x) { return $x; } } $o = new O15;
echo 91, ':', "[{$o->id((g22(...))(1))}]", "\n";
echo 92, ':', (fn() => \Lib\Sub\Deep\strtoupper(1))(), "\n";
echo 93, ':', sub\sleep(1), "\n";
echo 94, ':', match (true) { default => usleep(1) }, "\n";
echo 95, ':', (static fn() => [Strtoupper(1)])()[0], "\n";
echo 96, ':', (function () { yield (\Lib\Sub\Deep\strtoupper(...))(1); })()->current(), "\n";
echo 97, ':', (g12(1) ?: 'x'), "\n";
echo 98, ':', "[{$o->id(\Sleep(1))}]", "\n";
echo 99, ':', sleep(1), "\n";
namespace A; use Lib\Sub\Deep as Sub; use function \usleep as USLEEP; use function USLEEP as x2usleep; class O16 { function id($x) { return $x; } } $o = new O16;
echo 100, ':', (static fn() => [Sleep(1)])()[0], "\n";
echo 101, ':', (function () { yield FOPEN(1); })()->current(), "\n";
echo 102, ':', (\sleep(1) ?: 'x'), "\n";
echo 103, ':', [sub\fopen(1)][0], "\n";
echo 104, ':', (static fn() => [Sleep(1)])()[0], "\n";
echo 105, ':', (fopen(1) ?: 'x'), "\n";
namespace A;  class O17 { function id($x) { return $x; } } $o = new O17;
echo 106, ':', (fn() => usleep(1))(), "\n";
echo 107, ':', (usleep(1) ?: 'x'), "\n";
echo 108, ':', [USLEEP(1)][0], "\n";
echo 109, ':', [USLEEP(1)][0], "\n";
echo 110, ':', (function () { yield Strtoupper(1); })()->current(), "\n";
echo 111, ':', match (true) { default => USLEEP(1) }, "\n";
echo 112, ':', (function () { yield FOPEN(1); })()->current(), "\n";
echo 113, ':', match (true) { default => fopen(1) }, "\n";
namespace C\D;  class O18 { function id($x) { return $x; } } $o = new O18;
echo 114, ':', (Fopen(1) ?: 'x'), "\n";
echo 115, ':', (static fn() => [(Strtoupper(...))(1)])()[0], "\n";
echo 116, ':', "[{$o->id(\STRTOUPPER(1))}]", "\n";
echo 117, ':', (static fn() => [strtoupper(1)])()[0], "\n";
echo 118, ':', [\Strtoupper(1)][0], "\n";
echo 119, ':', (function () { yield usleep(1); })()->current(), "\n";
echo 120, ':', (function () { return Sleep(1); })(), "\n";
echo 121, ':', (function () { return fopen(1); })(), "\n";
echo 122, ':', [\strtoupper(1)][0], "\n";
echo 123, ':', (static fn() => [usleep(1)])()[0], "\n";
namespace A; use function \SLEEP as SLEEP; use function Lib\fopen as x1fopen; class O19 { function id($x) { return $x; } } $o = new O19;
echo 124, ':', (fn() => Strtoupper(1))(), "\n";
echo 125, ':', match (true) { default => Sleep(1) }, "\n";
echo 126, ':', (static fn() => [usleep(1)])()[0], "\n";
namespace C\D; use function \FOPEN; use Lib\Sub as L; class O20 { function id($x) { return $x; } } $o = new O20;
echo 127, ':', (\Lib\Sub\sleep(...))(1), "\n";
echo 128, ':', "[{$o->id((\Lib\Sub\fopen(...))(1))}]", "\n";
echo 129, ':', (fn() => fopen(1))(), "\n";
echo 130, ':', strtoupper(1), "\n";
echo 131, ':', [fopen(1)][0], "\n";
echo 132, ':', "[{$o->id(fopen(1))}]", "\n";
namespace C\D; use function Lib\{strtoupper as g10, Sub\usleep as g20}; class O21 { function id($x) { return $x; } } $o = new O21;
echo 133, ':', Usleep(1), "\n";
echo 134, ':', match (true) { default => (SLEEP(...))(1) }, "\n";
echo 135, ':', "[{$o->id(fopen(1))}]", "\n";
echo 136, ':', $o->id(
   fopen(1)
), "\n";
echo 137, ':', $o->id(
   \sleep(1)
), "\n";
echo 138, ':', match (true) { default => sleep(1) }, "\n";
echo 139, ':', (function () { yield sleep(1); })()->current(), "\n";
echo 140, ':', \Lib\Sub\Deep\fopen(1), "\n";
echo 141, ':', match (true) { default => (\sleep(...))(1) }, "\n";
namespace C\D; use function Lib\sleep as SLEEP; use function Lib\{fopen as g11, Sub\usleep as g21}; use function STRTOUPPER as x2strtoupper; class O22 { function id($x) { return $x; } } $o = new O22;
echo 142, ':', (function () { return usleep(1); })(), "\n";
echo 143, ':', match (true) { default => Strtoupper(1) }, "\n";
echo 144, ':', (function () { yield strtoupper(1); })()->current(), "\n";
echo 145, ':', [strtoupper(1)][0], "\n";
echo 146, ':', (fn() => Usleep(1))(), "\n";
namespace A; use Lib\Sub as L; class O23 { function id($x) { return $x; } } $o = new O23;
echo 147, ':', $o->id(
   sleep(1)
), "\n";
echo 148, ':', l\fopen(1), "\n";
echo 149, ':', match (true) { default => (STRTOUPPER(...))(1) }, "\n";
echo 150, ':', "[{$o->id(l\usleep(1))}]", "\n";
namespace E; use function sleep; use Lib as Dp; class O24 { function id($x) { return $x; } } $o = new O24;
echo 151, ':', sleep(1), "\n";
echo 152, ':', (static fn() => [(fopen(...))(1)])()[0], "\n";
echo 153, ':', "[{$o->id(\Lib\sleep(1))}]", "\n";
echo 154, ':', (fn() => sleep(1))(), "\n";
echo 155, ':', $o->id(
   (SLEEP(...))(1)
), "\n";
echo 156, ':', (function () { yield fopen(1); })()->current(), "\n";
echo 157, ':', (fn() => dp\sleep(1))(), "\n";
echo 158, ':', [FOPEN(1)][0], "\n";
echo 159, ':', $o->id(
   (FOPEN(...))(1)
), "\n";
echo 160, ':', $o->id(
   USLEEP(1)
), "\n";
namespace A; use Lib as Sub; use function FOPEN; class O25 { function id($x) { return $x; } } $o = new O25;
echo 161, ':', (function () { return STRTOUPPER(1); })(), "\n";
echo 162, ':', SLEEP(1), "\n";
echo 163, ':', \usleep(1), "\n";
namespace E; use Lib\Sub\Deep as L; use Lib\Sub\Deep as Sub; class O26 { function id($x) { return $x; } } $o = new O26;
echo 164, ':', "[{$o->id(\Lib\Sub\Deep\usleep(1))}]", "\n";
echo 165, ':', (fn() => sub\usleep(1))(), "\n";
echo 166, ':', (fn() => l\fopen(1))(), "\n";
echo 167, ':', (function () { return \Lib\usleep(1); })(), "\n";
echo 168, ':', (fn() => FOPEN(1))(), "\n";
echo 169, ':', (fn() => STRTOUPPER(1))(), "\n";
echo 170, ':', (namespace\fopen(1) ?: 'x'), "\n";
echo 171, ':', $o->id(
   Strtoupper(1)
), "\n";
echo 172, ':', (static fn() => [strtoupper(1)])()[0], "\n";
namespace B; use function Lib\Sub\sleep as SLEEP; class O27 { function id($x) { return $x; } } $o = new O27;
echo 173, ':', [(\Fopen(...))(1)][0], "\n";
echo 174, ':', $o->id(
   (STRTOUPPER(...))(1)
), "\n";
echo 175, ':', [Fopen(1)][0], "\n";
namespace B; use function strtoupper as STRTOUPPER; use Lib\Sub\Deep as L; use function fopen; use function Lib\{fopen as g13, Sub\usleep as g23}; class O28 { function id($x) { return $x; } } $o = new O28;
echo 176, ':', "[{$o->id(\FOPEN(1))}]", "\n";
echo 177, ':', (function () { return (l\usleep(...))(1); })(), "\n";
echo 178, ':', match (true) { default => strtoupper(1) }, "\n";
echo 179, ':', $o->id(
   \Sleep(1)
), "\n";
echo 180, ':', $o->id(
   \Fopen(1)
), "\n";
echo 181, ':', STRTOUPPER(1), "\n";
echo 182, ':', "[{$o->id(Strtoupper(1))}]", "\n";
echo 183, ':', $o->id(
   (g13(...))(1)
), "\n";
namespace B; use function Lib\Sub\sleep as SLEEP; use function fopen as x1fopen; use function Lib\{usleep as g12, Sub\usleep as g22}; use Lib\Sub\Deep as Dp; class O29 { function id($x) { return $x; } } $o = new O29;
echo 184, ':', "[{$o->id(sleep(1))}]", "\n";
echo 185, ':', ((\Lib\Sub\usleep(...))(1) ?: 'x'), "\n";
echo 186, ':', (function () { return \USLEEP(1); })(), "\n";
echo 187, ':', "[{$o->id((sleep(...))(1))}]", "\n";
echo 188, ':', [sleep(1)][0], "\n";
echo 189, ':', (fn() => dp\sleep(1))(), "\n";
echo 190, ':', (sleep(...))(1), "\n";
echo 191, ':', $o->id(
   strtoupper(1)
), "\n";
echo 192, ':', [fopen(1)][0], "\n";
namespace C\D; use function Lib\{sleep as g10, Sub\usleep as g20}; class O30 { function id($x) { return $x; } } $o = new O30;
echo 193, ':', (function () { yield Usleep(1); })()->current(), "\n";
echo 194, ':', (function () { return usleep(1); })(), "\n";
echo 195, ':', "[{$o->id(namespace\usleep(1))}]", "\n";
echo 196, ':', (function () { yield USLEEP(1); })()->current(), "\n";
echo 197, ':', (fn() => (\FOPEN(...))(1))(), "\n";
echo 198, ':', (fn() => sleep(1))(), "\n";
echo 199, ':', (fn() => fopen(1))(), "\n";
echo 200, ':', (function () { return (\Lib\Sub\strtoupper(...))(1); })(), "\n";
echo 201, ':', "[{$o->id(FOPEN(1))}]", "\n";
echo 202, ':', "[{$o->id((\Lib\sleep(...))(1))}]", "\n";
namespace B; use Lib as Dp; use function \USLEEP; use function Lib\strtoupper; class O31 { function id($x) { return $x; } } $o = new O31;
echo 203, ':', [USLEEP(1)][0], "\n";
echo 204, ':', "[{$o->id((USLEEP(...))(1))}]", "\n";
echo 205, ':', usleep(1), "\n";
echo 206, ':', match (true) { default => usleep(1) }, "\n";
echo 207, ':', (fn() => \fopen(1))(), "\n";
echo 208, ':', "[{$o->id(USLEEP(1))}]", "\n";
echo 209, ':', match (true) { default => \USLEEP(1) }, "\n";
echo 210, ':', match (true) { default => \Lib\Sub\Deep\fopen(1) }, "\n";
echo 211, ':', (function () { yield (usleep(...))(1); })()->current(), "\n";
namespace C\D;  class O32 { function id($x) { return $x; } } $o = new O32;
echo 212, ':', (Sleep(1) ?: 'x'), "\n";
echo 213, ':', [strtoupper(1)][0], "\n";
echo 214, ':', (\fopen(1) ?: 'x'), "\n";
echo 215, ':', "[{$o->id(Usleep(1))}]", "\n";
echo 216, ':', $o->id(
   (\sleep(...))(1)
), "\n";
echo 217, ':', (function () { return Usleep(1); })(), "\n";
echo 218, ':', (function () { yield (Strtoupper(...))(1); })()->current(), "\n";
echo 219, ':', "[{$o->id(Sleep(1))}]", "\n";
namespace A;  class O33 { function id($x) { return $x; } } $o = new O33;
echo 220, ':', (fn() => \Usleep(1))(), "\n";
echo 221, ':', [(STRTOUPPER(...))(1)][0], "\n";
echo 222, ':', [(Usleep(...))(1)][0], "\n";
namespace C\D; use Lib\Sub as L; use function Lib\Sub\strtoupper; use function Lib\Sub\fopen; class O34 { function id($x) { return $x; } } $o = new O34;
echo 223, ':', (static fn() => [(FOPEN(...))(1)])()[0], "\n";
echo 224, ':', "[{$o->id(Fopen(1))}]", "\n";
echo 225, ':', $o->id(
   usleep(1)
), "\n";
echo 226, ':', (function () { yield l\strtoupper(1); })()->current(), "\n";
namespace C\D; use function \FOPEN as FOPEN; use function Lib\{sleep as g11, Sub\usleep as g21}; use function Lib\{fopen as g12, Sub\usleep as g22}; use function Lib\Sub\strtoupper as x3strtoupper; class O35 { function id($x) { return $x; } } $o = new O35;
echo 227, ':', (function () { return strtoupper(1); })(), "\n";
echo 228, ':', $o->id(
   \Lib\Sub\strtoupper(1)
), "\n";
echo 229, ':', (Sleep(1) ?: 'x'), "\n";
namespace B; use function Lib\usleep as x0usleep; use function Lib\strtoupper; class O36 { function id($x) { return $x; } } $o = new O36;
echo 230, ':', $o->id(
   \Strtoupper(1)
), "\n";
echo 231, ':', strtoupper(1), "\n";
echo 232, ':', "[{$o->id(sleep(1))}]", "\n";
echo 233, ':', $o->id(
   fopen(1)
), "\n";
echo 234, ':', "[{$o->id(usleep(1))}]", "\n";
namespace C\D;  class O37 { function id($x) { return $x; } } $o = new O37;
echo 235, ':', (static fn() => [sleep(1)])()[0], "\n";
echo 236, ':', (function () { return STRTOUPPER(1); })(), "\n";
echo 237, ':', usleep(1), "\n";
echo 238, ':', match (true) { default => strtoupper(1) }, "\n";
echo 239, ':', (static fn() => [sleep(1)])()[0], "\n";
echo 240, ':', "[{$o->id(fopen(1))}]", "\n";
echo 241, ':', [sleep(1)][0], "\n";
echo 242, ':', (static fn() => [\FOPEN(1)])()[0], "\n";
echo 243, ':', match (true) { default => namespace\usleep(1) }, "\n";
namespace A;  class O38 { function id($x) { return $x; } } $o = new O38;
echo 244, ':', usleep(1), "\n";
echo 245, ':', (function () { yield sleep(1); })()->current(), "\n";
echo 246, ':', match (true) { default => Usleep(1) }, "\n";
echo 247, ':', $o->id(
   (sleep(...))(1)
), "\n";
echo 248, ':', (function () { return \sleep(1); })(), "\n";
echo 249, ':', (function () { yield fopen(1); })()->current(), "\n";
namespace B; use Lib as Sub; use function Lib\{usleep as g11, Sub\usleep as g21}; use Lib\Sub as Dp; class O39 { function id($x) { return $x; } } $o = new O39;
echo 250, ':', (function () { return \usleep(1); })(), "\n";
echo 251, ':', (fn() => Fopen(1))(), "\n";
echo 252, ':', (g11(1) ?: 'x'), "\n";
echo 253, ':', [g21(1)][0], "\n";
echo 254, ':', "[{$o->id(g21(1))}]", "\n";
namespace C\D; use Lib\Sub as Sub; use function \fopen as FOPEN; use function \strtoupper as STRTOUPPER; class O40 { function id($x) { return $x; } } $o = new O40;
echo 255, ':', (static fn() => [Fopen(1)])()[0], "\n";
echo 256, ':', (function () { yield (fopen(...))(1); })()->current(), "\n";
echo 257, ':', [sub\sleep(1)][0], "\n";
echo 258, ':', (static fn() => [SLEEP(1)])()[0], "\n";
namespace C\D; use function Lib\sleep; use function \STRTOUPPER; use function fopen; use function Lib\{fopen as g13, Sub\usleep as g23}; class O41 { function id($x) { return $x; } } $o = new O41;
echo 259, ':', [\strtoupper(1)][0], "\n";
echo 260, ':', match (true) { default => usleep(1) }, "\n";
echo 261, ':', match (true) { default => \Lib\usleep(1) }, "\n";
namespace E; use function \FOPEN as x0fopen; use function \usleep as USLEEP; use Lib\Sub\Deep as L; use function Lib\strtoupper; class O42 { function id($x) { return $x; } } $o = new O42;
echo 262, ':', (static fn() => [Strtoupper(1)])()[0], "\n";
echo 263, ':', (function () { yield \Usleep(1); })()->current(), "\n";
echo 264, ':', "[{$o->id(SLEEP(1))}]", "\n";
echo 265, ':', [strtoupper(1)][0], "\n";
echo 266, ':', ((l\strtoupper(...))(1) ?: 'x'), "\n";
echo 267, ':', $o->id(
   SLEEP(1)
), "\n";
echo 268, ':', (static fn() => [l\fopen(1)])()[0], "\n";
echo 269, ':', ((sleep(...))(1) ?: 'x'), "\n";
namespace A; use function Lib\Sub\usleep; class O43 { function id($x) { return $x; } } $o = new O43;
echo 270, ':', (\Lib\Sub\fopen(1) ?: 'x'), "\n";
echo 271, ':', match (true) { default => Sleep(1) }, "\n";
echo 272, ':', $o->id(
   (strtoupper(...))(1)
), "\n";
echo 273, ':', "[{$o->id(fopen(1))}]", "\n";
echo 274, ':', (static fn() => [Strtoupper(1)])()[0], "\n";
echo 275, ':', (usleep(1) ?: 'x'), "\n";
echo 276, ':', (function () { return SLEEP(1); })(), "\n";
echo 277, ':', (function () { yield \Lib\Sub\sleep(1); })()->current(), "\n";
echo 278, ':', match (true) { default => FOPEN(1) }, "\n";
namespace A;  class O44 { function id($x) { return $x; } } $o = new O44;
echo 279, ':', $o->id(
   usleep(1)
), "\n";
echo 280, ':', Usleep(1), "\n";
echo 281, ':', (function () { return Sleep(1); })(), "\n";
echo 282, ':', [strtoupper(1)][0], "\n";
namespace E; use function \sleep; class O45 { function id($x) { return $x; } } $o = new O45;
echo 283, ':', "[{$o->id(strtoupper(1))}]", "\n";
echo 284, ':', (static fn() => [Sleep(1)])()[0], "\n";
echo 285, ':', (function () { yield Sleep(1); })()->current(), "\n";
echo 286, ':', (static fn() => [(FOPEN(...))(1)])()[0], "\n";
echo 287, ':', match (true) { default => sleep(1) }, "\n";
echo 288, ':', (fn() => sleep(1))(), "\n";
echo 289, ':', [SLEEP(1)][0], "\n";
echo 290, ':', ((\sleep(...))(1) ?: 'x'), "\n";
namespace C\D; use Lib as Sub; class O46 { function id($x) { return $x; } } $o = new O46;
echo 291, ':', (fn() => (sleep(...))(1))(), "\n";
echo 292, ':', sleep(1), "\n";
echo 293, ':', $o->id(
   \strtoupper(1)
), "\n";
namespace B; use function Lib\Sub\strtoupper as x0strtoupper; use function Lib\sleep; use function Lib\Sub\fopen as x2fopen; use function Lib\strtoupper as STRTOUPPER; class O47 { function id($x) { return $x; } } $o = new O47;
echo 294, ':', $o->id(
   SLEEP(1)
), "\n";
echo 295, ':', (\Lib\Sub\Deep\usleep(1) ?: 'x'), "\n";
echo 296, ':', (STRTOUPPER(1) ?: 'x'), "\n";
echo 297, ':', strtoupper(1), "\n";
echo 298, ':', (strtoupper(1) ?: 'x'), "\n";
echo 299, ':', (fn() => x0strtoupper(1))(), "\n";
echo 300, ':', (function () { yield (strtoupper(...))(1); })()->current(), "\n";
echo 301, ':', $o->id(
   usleep(1)
), "\n";
namespace B; use Lib as L; use function \FOPEN; use function \USLEEP; use Lib\Sub as Dp; class O48 { function id($x) { return $x; } } $o = new O48;
echo 302, ':', (function () { yield sleep(1); })()->current(), "\n";
echo 303, ':', (fn() => strtoupper(1))(), "\n";
echo 304, ':', "[{$o->id(strtoupper(1))}]", "\n";
namespace A; use function Lib\{usleep as g10, Sub\usleep as g20}; use Lib as Sub; use function usleep; class O49 { function id($x) { return $x; } } $o = new O49;
echo 305, ':', "[{$o->id(\sleep(1))}]", "\n";
echo 306, ':', $o->id(
   (\Lib\Sub\usleep(...))(1)
), "\n";
echo 307, ':', (function () { return sub\strtoupper(1); })(), "\n";
echo 308, ':', (\strtoupper(...))(1), "\n";
echo 309, ':', (fn() => (SLEEP(...))(1))(), "\n";
echo 310, ':', \Lib\Sub\Deep\usleep(1), "\n";
echo 311, ':', (sub\usleep(1) ?: 'x'), "\n";
echo 312, ':', (function () { return (fopen(...))(1); })(), "\n";
