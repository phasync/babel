<?php
namespace App;
use Orig\Tr;
use Orig\Thing;

trait Other { public function who() { return 'Other'; } public function new() { return 'new'; } public function fopen() { return 'm-fopen'; } }
class C {
    use Tr, Other {
        Tr::who insteadof Other;
        Other::who as protected list;
        Other::new as public PDO;
        fopen as private Thing;
        Other::fopen as public function;
    }
    public function all() { return $this->list() . ' ' . $this->Thing() . ' ' . $this->function(); }
}
function named(...$a) { $o = []; foreach ($a as $k => $v) { $o[] = "$k=$v"; } return implode(',', $o); }
$c = new C;
echo $c->who(), ' ', $c->PDO(), ' ', $c->all(), "\n";
echo named(class: 1, fopen: 2, PDO: 3, new: 4, fn: 5, array: fopen('x'), function: strtoupper(...)('y'), list: Thing::X), "\n";
$i = 0;
fopen:
$i++;
if ($i < 3) goto fopen;
PDO:
echo $i, ' ', (fn() => goto_target())(), "\n";
function goto_target() { goto Thing; Thing: return 'gt'; }
echo (new class { public function __call($n, $a) { return $n; } })->fopen(), ' ', (new class { public static function __callStatic($n, $a) { return $n; } })::PDO(), "\n";
