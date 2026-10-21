<?php
// a compile error that the parser raises (not a ParseError) in eval'd code: reported as without the tool
echo "start\n";
register_shutdown_function(function () {
    $e = error_get_last();
    echo "shutdown: ", $e ? basename($e['file']) . ':' . $e['line'] . ' ' . $e['message'] : 'no error', "\n";
});
eval('echo fopen("a"), "\n"; class A { public public $x; }');
echo "not reached\n";
