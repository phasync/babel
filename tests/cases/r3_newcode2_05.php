<?php
// Multi-constant and typed-constant declarations (class, interface, enum, global) mixing keyword names and mapped classes.
namespace App;
use Orig\Thing;
use Orig\Thing as T2;
const A = 1, B = __FILE__, C = Thing::X, D = [T2::X, \Orig\Thing::X], E2 = Thing::class;
interface I { const string include = Thing::X, eval = __DIR__; const ?Thing NONE = null, N2 = null; }
enum En { case A; const En|Thing|null X = En::A, Y = null; }
class K implements I {
    final public const string|int|null LIST = T2::X, DEFAULT = self::include, ARRAY = __FILE__;
    const (\Countable&Thing)|null Z = null, W = null;
    const Thing|int NEW = 5, CLASS_ = 7;
}
echo A, ' ', basename(B), ' ', C, ' ', \implode(',', D), ' ', E2, "\n";
echo I::include, ' ', I::eval === __DIR__ ? 'y' : 'n', ' ', \var_export(I::NONE, true), "\n";
echo En::X->name, ' ', K::LIST, K::DEFAULT, basename(K::ARRAY), ' ', \var_export(K::Z, true), \var_export(K::W, true), K::NEW, K::CLASS_, "\n";
foreach ([new \ReflectionClassConstant(I::class, 'NONE'), new \ReflectionClassConstant(K::class, 'Z'), new \ReflectionClassConstant(En::class, 'X'), new \ReflectionClassConstant(K::class, 'NEW')] as $r) {
    echo $r->getType(), "\n";
}
