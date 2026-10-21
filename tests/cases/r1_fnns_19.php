<?php
namespace tt;
use Orig\Tr;
trait T1 { function fopen($x) { return 'T1-fopen'; } function who2() { return sleep(1); } }
trait T2 { function fopen($x) { return 'T2-fopen'; } }
class C {
    use T1, T2, Tr {
        T1::fopen insteadof T2;
        T2::fopen as sleep;
        who as protected w;
    }
    function go() { return [$this->fopen(1), $this->sleep(1), fopen('f'), sleep(1), $this->who2(), $this->who(), $this->w()]; }
}
echo json_encode((new C)->go()), "\n";
interface I { public function sleep(); public static function fopen(): int; }
enum E: string implements I {
    case A = 'a';
    public function sleep() { return sleep(2); }
    public static function fopen(): int { return \strlen(fopen('x')); }
    const X = 1;
}
echo E::A->sleep(), E::fopen(), "\n";
