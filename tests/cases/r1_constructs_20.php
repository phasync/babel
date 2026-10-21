<?php
echo json_encode(include __DIR__ . "/fixtures/r1_q'u\\o\$t\"s/r1_weird.php"), "\n";
echo json_encode(require "fixtures/r1_q'u\\o\$t\"s/r1_weird.php"), "\n";
