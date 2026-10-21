<?php
namespace A { function sleep($x) { return 'A'; } function fopen($x) { return 'Afopen'; } }
namespace B { use function A\sleep; use function A\fopen as sleep2;  echo sleep(1), sleep2(1), fopen('x'), "\n"; }
namespace C { echo sleep(1), fopen(1), \A\sleep(1), "\n"; }
namespace D { use function A\{sleep, fopen}; echo sleep(1), fopen(1), "\n"; }
namespace E { use A\{function sleep, const X, Y}; echo sleep(1), fopen('x'), "\n"; }
namespace F { echo sleep(1), "\n"; }
