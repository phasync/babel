<?php
// no strict_types: calls made from here coerce scalar arguments of internal functions
function weak_call(callable $f, ...$a) { return $f(...$a); }
$GLOBALS['weak_fcc'] = class_exists(...);
