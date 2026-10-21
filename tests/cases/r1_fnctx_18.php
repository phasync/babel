<?php
namespace t;
use Orig\Tr;
trait A { public function fopen() { return 'A::fopen'; } public function sleep() { return 'A::sleep'; } }
trait B { public function fopen() { return 'B::fopen'; } }
class C {
    use A, B { A::fopen insteadof B; B::fopen as protected bfopen; sleep as public usleep; }
    use Tr { who as whoTr; }
    public function t() { return $this->bfopen() . ' ' . $this->usleep() . ' ' . $this->fopen() . ' ' . $this->whoTr(); }
}
echo (new C)->t(), ' ', fopen('x'), ' ', \usleep(1), "\n";
$fopen = 1; $sleep = 2;
$c = function ($a) use ($fopen, &$sleep): int { return $a + $fopen + $sleep; };
echo $c(1), ' ', (function () use ($fopen): string { return fopen('z') . $fopen; })(), "\n";
$d = $fopen ? function () use ($sleep) { return sleep(1); } : fn() => fopen('n');
echo $d(), "\n";
echo (new class { use Tr; use A; public function go() { return $this->who() . $this->fopen() . usleep(1); } })->go(), "\n";
