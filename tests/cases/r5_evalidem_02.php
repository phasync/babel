<?php
// __halt_compiler() in eval'd code: the offset is relative to the eval'd string, also with a close tag
$codes = [
    'echo strtoupper("a"), " ", __COMPILER_HALT_OFFSET__, "\n"; __halt_compiler(); fopen("x")',
    "echo fopen('a'), ' ', __COMPILER_HALT_OFFSET__, \"\\n\";\n__halt_compiler() ?>tail",
    '$o = null; echo $o?->x::m() ?? "null", " ", __COMPILER_HALT_OFFSET__, "\n"; __HALT_COMPILER();',
];
foreach ($codes as $i => $c) {
    echo $i, ': ', strlen($c), ' ';
    eval($c);
}
