<?php
// double quoted literals with escapes in callee, class and callable positions (decoded like PHP does)
echo "\x66open"('a'), ' ', "\146open"('b'), ' ', "\u{66}open"('c'), ' ', "\x46OPEN"('d'), "\n";
echo "\x4frig\\Thing"::who(), ' ', "\117rig\Thing"::who(), ' ', "\u{004F}rig\\Thing"::$p, "\n";
echo "\\Orig\\Thing"::X, ' ', "\x5cOrig\x5cThing"::X, "\n";
var_dump(is_a(new \Orig\Thing, "\x4Frig\x5CThing"), class_exists("Orig\\\Thing"));
echo call_user_func("str\x74oupper", 'e'), ' ', call_user_func(["Orig\Thing", "who"]), ' ', call_user_func("Orig\Thing::w\x68o"), "\n";
echo "\u{1F600}" === "\xF0\x9F\x98\x80" ? 'utf8' : 'no', "\n";
