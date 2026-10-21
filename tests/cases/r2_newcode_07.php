<?php
// 'case' of a switch is an expression, not a name: __FILE__/__DIR__ there are magic constants.
foreach ([__FILE__, __DIR__ . '/x'] as $v) {
    switch ($v) {
        case __FILE__: echo "file\n"; break;
        case __DIR__ . '/x': echo "dir\n"; break;
        default: echo "none: ", $v, "\n";
    }
}
