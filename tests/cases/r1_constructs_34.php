<?php
// resolution order: include_path (default '.', the cwd), then the including file's directory
chdir(__DIR__ . '/fixtures/dupB');
echo json_encode(include __DIR__ . '/fixtures/dupA/r1_inc.php'), "\n";
chdir(__DIR__ . '/fixtures/dupC');
echo json_encode(include __DIR__ . '/fixtures/dupA/r1_inc.php'), "\n";
chdir(__DIR__);
echo json_encode(include __DIR__ . '/fixtures/dupA/r1_inc.php'), "\n";
set_include_path(__DIR__ . '/fixtures/dupC');
echo json_encode(include __DIR__ . '/fixtures/dupA/r1_inc.php'), "\n";
set_include_path('fixtures/dupB' . PATH_SEPARATOR . '.');
echo json_encode(include __DIR__ . '/fixtures/dupA/r1_inc.php'), "\n";
echo json_encode(include 'r1_dup.php'), "\n";
set_include_path('');
echo json_encode(include 'fixtures/dupC/r1_dup.php'), "\n";
echo json_encode(include 'file://' . __DIR__ . '/fixtures/dupC/r1_dup.php'), "\n";
