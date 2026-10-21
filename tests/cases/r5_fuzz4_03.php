<?php
// the right operand of '|>' is a nullsafe chain with a static access ending in a first-class
// callable: translating the translation again must not change it
namespace NA;
class H { public function c() { return 'Orig\Thing'; } }
$h = new H;
var_dump(1 |> $h?->c()::who(...));
var_dump('x' |> $h->c()::who(...));
