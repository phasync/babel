<?php
chdir('/');
echo eval('return include "fixtures/r2_c2_p.php";'), "\n";
echo eval('return eval("return include \"fixtures/r2_c2_q.php\";");'), "\n";
echo eval('return include __DIR__ . "/fixtures/r2_c2_p.php";'), "\n";
echo eval('return basename(__DIR__);'), "\n";
echo json_encode(eval('return include "fixtures/r2_c2_rel.php";')), "\n";
$f = function () { return include 'fixtures/r2_c2_q.php'; };
echo $f(), "\n";
