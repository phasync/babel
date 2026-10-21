<?php
namespace a;
// class-name literal in double quotes with escape sequences other than \\ (value is Orig\Thing)
$r = new \Repl\Thing;
var_dump(is_a($r, "Orig\x5cThing"));
var_dump(is_a($r, "\117rig\\Thing"));
var_dump(is_a($r, "Orig\u{5c}Thing"));
