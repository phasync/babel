<?php
// Line numbers never change, also for a file with old Mac (CR only) line endings: a regenerated
// group `use function` import must keep its line breaks in the file's own newline style.
$b = new \phasync\Babel\Babel(['lib\op' => 'Hook\fopen']);
foreach (["\n" => 'LF', "\r\n" => 'CRLF', "\r" => 'CR'] as $nl => $name) {
    $src = \str_replace("\n", $nl, "<?php\nnamespace A;\nuse function Lib\\{\n  op,\n  other\n};\necho __LINE__, op();\n");
    $out = $b->translate($src, '/x.php');
    echo $name, ' ', \preg_match_all('/\r\n|\r|\n/', $src), ' ', \preg_match_all('/\r\n|\r|\n/', $out), "\n";
    $t = \tempnam(\sys_get_temp_dir(), 'r2f');
    $tmp = $t . '.php';
    \file_put_contents($tmp, $out);
    include $tmp;
    echo "\n";
    \unlink($tmp);
    \unlink($t);
}
