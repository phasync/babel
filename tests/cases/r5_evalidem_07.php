<?php
// a nullsafe chain ended by ::CONST: translating the translation again must not change it
$n = null;
$o = new stdClass;
$o->x = 'Orig\Thing';
echo $o?->x::who()::X, "\n";
try {
    echo $n?->x::who()::X, "\n";
} catch (Error $e) {
    echo $e->getMessage(), "\n";
}
