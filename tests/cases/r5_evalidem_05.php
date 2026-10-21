<?php
// lexer diagnostics of eval'd code: exactly once, at compile time, from the eval'd code
function e($c) {
    try {
        eval($c);
    } catch (ParseError $e) {
        echo get_class($e), ': ', $e->getMessage(), ' @ ', basename($e->getFile()), ':', $e->getLine(), "\n";
    }
}
echo "a\n";
e('echo strtoupper("x"), "\n"; /* never closed');
echo "b\n";
e('echo strtoupper("\400"), "\n";');
echo "c\n";
e('$a = "\u{110000}"; echo fopen("x");');
echo "d\n";
e("echo fopen('y'), \"\\n\";\n\n\$x = <<<A\n  a\n b\n  A;\n");
echo "e\n";
e("echo fopen('y'), \"\\n\";\n\$y = '\\400{\$x}\\400';\n echo strtoupper(\"\\400\$y\");");
echo "f\n";
