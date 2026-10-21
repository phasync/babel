<?php
// a file rewritten (same size, same second) between two includes must be re-read
$f = __DIR__ . '/fixtures/r1_gen40.php';
for ($i = 0; $i < 3; $i++) {
    file_put_contents($f, '<?php return fopen("x") . "v' . $i . '";');
    echo include $f, "\n";
}
file_put_contents($f, '<?php return "plain-a";');
echo include $f, "\n";
file_put_contents($f, '<?php return "plain-b";');
echo include $f, "\n";
unlink($f);
