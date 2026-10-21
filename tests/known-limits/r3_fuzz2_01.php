<?php
// PHP 8.5 first-class callables in constant expressions (global const, class const, attribute
// argument) resolve the namespace fallback at run time, when the constant is evaluated. With a
// conditional declaration of A\strtoupper that is not reached yet, the global (mapped) function is
// used; the plain rewrite of constant expressions must not leave the call unmapped.
namespace A;
class P {
    const F = strtoupper(...);
}
const H = strtoupper(...);
#[\Orig\Attr(strtoupper(...))] function at() {}
echo (H)('x'), "\n", (P::F)('x'), "\n";
echo ((new \ReflectionFunction('A\at'))->getAttributes()[0]->newInstance()->v)('x'), "\n";
if (true) { function strtoupper(...$a) { return 'A:strtoupper'; } }
const I = strtoupper(...);
echo (I)('x'), "\n";
