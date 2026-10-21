<?php
// Escapes in class-name and callable literals decode like PHP: \x, octal, \u{}, unknown escapes kept.
echo "Orig\x5cThing"::who(), "\n";
echo "Orig\134Thing"::who(), "\n";
echo "Orig\u{5C}Thing"::who(), "\n";
echo "\117rig\\Thing"::who(), "\n";
echo call_user_func("\x73trtoupper", 'a'), "\n";
echo call_user_func("\163trtoupper", 'a'), "\n";
echo call_user_func("\u{73}trtoupper", 'a'), "\n";
echo call_user_func(b"\x73tr\x74oupper", 'a'), "\n";
echo call_user_func(B'strtoupper', 'a'), "\n";
var_dump(is_callable("strtoupper\x"));
var_dump(class_exists("Orig\\x5cThing"));
var_dump(class_exists("Orig\\\Thing"));
var_dump(class_exists('Orig\\\Thing'));
var_dump(class_exists("\Orig\Thing"));
var_dump(class_exists("\\Orig\\Thing"));
var_dump(class_exists("\x5COrig\x5CThing"));
var_dump(class_exists("Orig\\Thing\0"));
var_dump(class_exists("Orig\Thing\e"));
var_dump(class_exists("Orig\\Thin\x67"));
var_dump(class_exists("Orig\\Thin\x0067"));
var_dump(constant("Orig\\Thing::\x58"));
var_dump(constant("Orig\\Thing\072\072X"));
var_dump(is_a(new Repl\Thing, "orig\\thing"));
var_dump(is_a(new Repl\Thing, "\157rig\\thing"));
var_dump(is_a(new Repl\Thing, "\u{4f}RIG\\THING"));
var_dump(class_exists("Orig\\T\u{68}ing"));
var_dump(method_exists("Orig\\Thing", "who"));
