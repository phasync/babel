<?php
// r4 (probe): a nullsafe chain before '::' with a computed method name ($a?->b::{$m}()) keeps the plain
// Runtime::cls($a?->b) wrapper instead of the conditional form: when $a is null PHP short-circuits the whole
// chain to null, the translation calls Runtime::cls(null)::{$m}() and throws "Class name must be a valid
// object or a string".
class Box { public $b = 'Orig\Thing'; }
$m = 'who';
$a = new Box;
echo $a?->b::{$m}(), "\n";
$n = null;
var_dump($n?->b::{$m}());
