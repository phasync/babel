<?php
// eval'd code that tokenizes but fails to compile while parsing (CompileError, not ParseError):
// PHP's own error, from the eval'd code
$codes = [
    'class A4 { public public $x; } echo fopen("x");',
    'abstract final class B4 {} echo fopen("x");',
    'class C4 { final final function m() {} }',
];
foreach ($codes as $code) {
    try {
        eval($code);
    } catch (\CompileError $e) {
        echo get_class($e), ': ', $e->getMessage(), ' @ ', basename($e->getFile()), ':', $e->getLine(), "\n";
    }
}
echo "end\n";
