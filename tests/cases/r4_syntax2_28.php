<?php
// String expressions as class names: literal, interpolated, parenthesised, concatenated, nowdoc in parens.
namespace App;
$c = 'Orig\Thing';
$n = 'Thing';
echo "$c"::who(), ' ', "Orig\\$n"::who(), ' ', "Orig\\{$n}"::$p, ' ', 'Orig\Thing'::X, ' ', "Orig\\Thing"::who(), "\n";
echo ('Orig\\' . $n)::who(), ' ', ("Orig\\" . "Thing")::who(), ' ', (<<<'N'
    Orig\Thing
    N)::who(), ' ', (b'Orig\Thing')::X, "\n";
echo \constant("Orig\\Thing::X"), ' ', \constant('\Orig\Thing::X'), ' ', \defined("Orig\\{$n}::X") ? 'd' : '-', "\n";
