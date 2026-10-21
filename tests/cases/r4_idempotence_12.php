<?php
// A file whose path happens to end like PHP's eval origin is still a file, not eval'd code.
$dir = sys_get_temp_dir() . '/r4_idempotence_12_' . getmypid();
@mkdir($dir);
$f = "$dir/x eval()'d code";
file_put_contents($f, "<?php\nnamespace app;\necho fopen('x'), \"\\n\";\n");
include $f;
unlink($f);
rmdir($dir);
