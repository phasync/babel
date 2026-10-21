<?php
$r = include __DIR__ . "/fixtures/r4_syntax2_bom.php";
echo "\n", json_encode($r), "\n";
$r2 = include __DIR__ . "/fixtures/r4_syntax2_bom.php";
echo json_encode($r2 === $r), "\n";
