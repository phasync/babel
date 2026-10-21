<?php
// r5 (corpus oracle self-test): the right operand of |> is a computed callee whatever expression it is.
// A static call, a class constant or a constant naming a mapped function must be mapped like `$x |> $o->m()`
// (Pipe operand chainEnd() only follows `::$var`, so `A::m()`, `$o::m()`, `A::B`, `CB` were left alone).
class P {
    const CB = 'strtoupper';
    public static function cb() { return 'strtoupper'; }
    public function m() { return 'strtoupper'; }
}
const CB = 'strtoupper';
$o = new P;
echo 'a' |> $o->m(), "\n";
echo 'b' |> P::cb(), "\n";
echo 'c' |> $o::cb(), "\n";
echo 'd' |> P::CB, "\n";
echo 'e' |> CB, "\n";
echo 'f' |> \CB, "\n";
