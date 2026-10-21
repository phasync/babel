<?php
// a parse-time deprecation in eval'd code reaches the error handler once, from the eval'd code
set_error_handler(function ($no, $msg, $file, $line) {
    echo "handler: $msg @ ", basename($file), ":$line\n";
    return true;
});
eval('$x = (integer) "5"; echo fopen("a"), " $x\n";');
echo "done\n";
