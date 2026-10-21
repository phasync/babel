<?php
// CompileErrors raised by the parser (not ParseErrors) in eval'd code: thrown by eval, as without the tool
$codes = [
    'echo fopen("a"); if (1) { __halt_compiler(); }',
    "echo fopen('a');\nfunction f() {\n __halt_compiler();\n}",
];
foreach ($codes as $c) {
    try {
        eval($c);
        echo "no error\n";
    } catch (CompileError $e) {
        echo get_class($e), ': ', $e->getMessage(), ' @ ', basename($e->getFile()), ':', $e->getLine(), "\n";
        echo count($e->getTrace()), "\n";
    }
}
