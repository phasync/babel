<?php
$sib = require 'r1_sibling.php';
$up = require 'fixtures/r1_inc_a.php';
$rel = include __DIR__ . '/../r1_inc_a.php';
return [$sib, $up[0], basename(__DIR__), $rel[1]];
