<?php
// typed class constants whose names are reserved words (DEFAULT, EMPTY, LIST, NEW, ...)
namespace s30;
use Orig\Contract;
use Orig\Thing;
enum E implements Contract { case A; case B; }
class C {
    const Contract DEFAULT = E::A;
    public const ?Contract EMPTY = null;
    final const Contract LIST = E::B, ARRAY = E::A;
    const Contract|false PRINT = false, NEW = E::B;
}
interface I { const ?Contract FUNCTION = E::A; }
echo C::DEFAULT->name, var_export(C::EMPTY, true), C::LIST->name, C::ARRAY->name, var_export(C::PRINT, true), C::NEW->name, I::FUNCTION->name, "\n";
foreach (['DEFAULT', 'EMPTY', 'LIST', 'PRINT'] as $k) echo (new \ReflectionClassConstant(C::class, $k))->getType(), "\n";
