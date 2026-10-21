<?php
// switch case labels that start with a keyword token: __FILE__, __DIR__, eval, include
namespace s39;
$f = __FILE__;
switch ($f) {
    case __FILE__:
        echo "file-match\n";
        break;
    default:
        echo "file-mismatch\n";
}
switch (dirname($f) . '/x') {
    case __DIR__ . '/x':
        echo "dir-match\n";
        break;
    default:
        echo "dir-mismatch\n";
}
switch (true) {
    case eval('return fopen("x") === "HOOK:fopen";'):
        echo "eval-hooked\n";
        break;
    default:
        echo "eval-not-hooked\n";
}
