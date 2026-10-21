<?php
// escaped class-name and callable literals, in files and in eval'd code
$names = ["\117rig\\\x54hing", "Orig\u{5C}Thing", "Orig\u{00005c}Thing", "\x4frig\\Thing", 'Orig\\Thing', "Orig\\\Thing", b"Orig\\Thing", "Orig\Thing\0"];
echo is_a('Repl\Thing', "\117rig\\\x54hing", true) ? 'y' : 'n';
echo is_a('Repl\Thing', "Orig\u{5C}Thing", true) ? 'y' : 'n';
echo is_a('Repl\Thing', "Orig\u{00005c}Thing", true) ? 'y' : 'n';
echo is_a('Repl\Thing', "\x4frig\\Thing", true) ? 'y' : 'n';
echo is_a('Repl\Thing', "Orig\\\Thing", true) ? 'y' : 'n';
echo is_a('Repl\Thing', b"Orig\\Thing", true) ? 'y' : 'n';
echo is_a('Repl\Thing', B'Orig\\Thing', true) ? 'y' : 'n';
echo is_a('Repl\Thing', "Orig\Thing\0", true) ? 'y' : 'n';
echo is_a('Repl\Thing', "Orig\\Thing\e", true) ? 'y' : 'n';
echo call_user_func("str\x74oupper", 'a'), call_user_func("\163trtoupper", 'a'), call_user_func("\\strtoupper", 'a');
echo "\n";
eval(<<<'C'
echo is_a("Repl\Thing", "\117rig\\\x54hing", true) ? "y" : "n", call_user_func("\163trtoupper", "a"), "\n";
C);
