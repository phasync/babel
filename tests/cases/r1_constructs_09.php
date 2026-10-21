<?php
// eval'd code with include inside, and __DIR__ in eval
file_put_contents(__DIR__ . '/fixtures/r1_gen09.php', '<?php return fopen(1) . basename(__FILE__) . basename(__DIR__);');
echo eval('return include __DIR__ . "/fixtures/r1_gen09.php";'), "\n";
echo eval('return include "fixtures/r1_gen09.php";'), "\n";
echo eval('return basename(__DIR__);'), "\n";
unlink(__DIR__ . '/fixtures/r1_gen09.php');
