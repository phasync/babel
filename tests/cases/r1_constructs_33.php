<?php
$base = __DIR__ . '/fixtures';
@unlink("$base/r1_link.php"); @unlink("$base/r1_linkdir");
symlink("$base/r1_inc_a.php", "$base/r1_link.php");
symlink("$base/sub", "$base/r1_linkdir");
$r = include "$base/r1_link.php";
echo json_encode($r), "\n";
echo json_encode(include "$base/r1_linkdir/r1_deep.php"), "\n";
echo json_encode(include_once "$base/r1_link.php"), "\n";
echo json_encode(include_once "$base/r1_inc_a.php"), "\n";
echo json_encode(include_once "$base/r1_inc_a.php"), "\n";
unlink("$base/r1_link.php"); unlink("$base/r1_linkdir");
