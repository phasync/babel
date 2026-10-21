<?php
var_dump(include_once __DIR__ . '/fixtures/r1_inc_once.php');
var_dump(include_once __DIR__ . '/fixtures/r1_inc_once.php');
var_dump(require_once 'fixtures/r1_inc_once.php');
var_dump(include_once __DIR__ . '/fixtures/../fixtures/r1_inc_once.php');
echo r1_once_fn(), "\n";
echo json_encode(include 'fixtures/sub/r1_deep.php'), "\n";
echo json_encode(require './fixtures/sub/../sub/r1_deep.php'), "\n";
set_include_path(__DIR__ . '/fixtures/sub' . PATH_SEPARATOR . get_include_path());
echo include 'r1_sibling.php', "\n";
chdir(__DIR__ . '/fixtures/sub');
echo json_encode(include '../r1_inc_a.php'), "\n";
echo include './r1_sibling.php', "\n";
echo include '../sub/r1_sibling.php', "\n";
chdir(__DIR__);
echo json_encode(include 'fixtures/sub/r1_deep.php'), "\n";
