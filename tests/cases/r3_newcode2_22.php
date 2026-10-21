<?php
// A file whose path contains a newline: the __FILE__/__DIR__ literals and include operands must not shift line numbers.
$d = sys_get_temp_dir() . "/r3nc2\n22_" . getmypid();
@mkdir($d);
file_put_contents("$d/a.php", "<?php \$f = __FILE__; \$g = __DIR__; echo __LINE__, ' ';\necho __LINE__, ' ', \$f === __DIR__ . '/a.php' ? 'ok' : 'bad', ' ', (new Exception)->getLine(), \"\\n\";\nreturn include __DIR__ . '/b.php';");
file_put_contents("$d/b.php", "<?php\nreturn __LINE__;");
echo include "$d/a.php", "\n";
unlink("$d/a.php");
unlink("$d/b.php");
rmdir($d);
