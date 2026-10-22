<?php
// Constants: positions where PHP requires a constant expression (no function call allowed) are left
// untouched -- global const, class const, enum case value, property default (plain and static),
// parameter default, attribute argument. A local static variable initializer is NOT in this list:
// since PHP 8.3 it accepts arbitrary expressions (see r3_dynclass_20.php, already relying on this for
// dynamic class resolution there), so a mapped constant is rewritten there too, like any other
// run time position. Each position below still evaluates to the real PHP_SAPI value at run time,
// which must differ from a bare (rewritten) usage elsewhere.
const GLOBAL_X = PHP_SAPI;
echo GLOBAL_X, "\n";

class C {
    const CLS_X = PHP_SAPI;
    public $prop = PHP_SAPI;
    public static $staticProp = PHP_SAPI;
}
echo C::CLS_X, "\n";
echo (new C())->prop, "\n";
echo C::$staticProp, "\n";

enum E: string {
    case A = PHP_SAPI;
}
echo E::A->value, "\n";

function withDefault($x = PHP_SAPI) { return $x; }
echo withDefault(), "\n";

#[\Orig\Attr(PHP_SAPI)]
function attributed() {}
$ref = new ReflectionFunction('attributed');
echo $ref->getAttributes()[0]->newInstance()->v, "\n";

echo GLOBAL_X === PHP_SAPI ? 'same (BUG)' : 'different (correct)', "\n";
