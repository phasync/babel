<?php
echo json_encode(include __DIR__ . DIRECTORY_SEPARATOR . 'fixtures' . DIRECTORY_SEPARATOR . 'r2_c2_rel.php'), "\n";
echo include './fixtures/r2_c2_p.php', "\n";
echo include '../cases/fixtures/r2_c2_q.php', "\n";
echo include realpath(__DIR__ . '/../cases/fixtures/r2_c2_p.php'), "\n";
set_include_path(__DIR__ . '/fixtures/r2_c2_sub' . PATH_SEPARATOR . get_include_path());
echo include 'r2_c2_p.php', "\n";
chdir(__DIR__ . '/fixtures');
echo json_encode(include 'r2_c2_rel.php'), "\n";
