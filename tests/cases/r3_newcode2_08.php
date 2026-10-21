<?php
// b-prefixed, escaped and \u{} / octal / hex encoded string literals naming mapped classes and functions.
echo b'Orig\Thing'::who(), ' ', B"Orig\\Thing"::who(), ' ', "\x4frig\\Thing"::who(), ' ', "Orig\u{5C}Thing"::who(), ' ', "\117rig\Thing"::X, "\n";
echo \call_user_func(b"Orig\\Thing::who"), ' ', \call_user_func([B'\Orig\Thing', 'who']), ' ', \call_user_func(b'fopen', 'a', 'r'), ' ', \call_user_func("\x66open"), "\n";
echo \constant(B'Orig\Thing::X'), ' ', \constant("\\Orig\\Thing::X"), ' ', \defined(b"Orig\x5cThing::X") ? 'y' : 'n', "\n";
echo (new ReflectionClass("Orig\u{5C}Thing"))->getName(), ' ', (ReflectionMethod::createFromMethodName(b'Orig\Thing::who'))->class, ' ', \is_a(new Repl\Thing, b'Orig\Thing') ? 'y' : 'n', "\n";
echo b'fopen'('a', 'r'), ' ', ("\x66\x6fpen")('a', 'r'), ' ', B"strtoupper"('a'), ' ', \class_exists(b"\\Orig\\Thing") ? 'y' : 'n', "\n";
echo \array_reduce([1], b'strtoupper', ''), ' ', \array_reduce([1], "Orig\\Thing::who"), ' ', \is_callable(b'Orig\Thing::who') ? 'y' : 'n', "\n";
