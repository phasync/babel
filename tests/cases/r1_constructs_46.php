<?php
namespace Hz;

const G = __COMPILER_HALT_OFFSET__;
class K {
    const C = __COMPILER_HALT_OFFSET__;
    const D = self::C + 1;
    public static $s = __COMPILER_HALT_OFFSET__;
    public $p = [__COMPILER_HALT_OFFSET__ => 1];
    function m($x = __COMPILER_HALT_OFFSET__) { return $x; }
}
enum E: int { case A = __COMPILER_HALT_OFFSET__; }
define('Hz\DEF', __COMPILER_HALT_OFFSET__);
$len = strlen(implode('', file(__FILE__)));
$data = strlen("\nDATA\n");
$want = $len - $data;
echo json_encode([
    G === $want, K::C === $want, K::D === $want + 1, K::$s === $want, key((new K)->p) === $want,
    (new K)->m() === $want, E::A->value === $want, DEF === $want, \__COMPILER_HALT_OFFSET__ === $want,
    __COMPILER_HALT_OFFSET__ === $want,
    match (true) { __COMPILER_HALT_OFFSET__ === $want => 'm', default => 'x' },
    fopen('z'),
]), "\n";
__halt_compiler();
DATA
