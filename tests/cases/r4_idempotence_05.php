<?php
// Translated files written to disk and included again (the consumer's wrapper translates them once
// more): the marker must be found wherever the first open tag is, and the code must stay as it is.
$b = \phasync\Babel\Runtime::babel();
$srcs = [
    'shebang' => "#!/usr/bin/env php\n<?php\necho fopen('a'), \"\\n\";\n",
    'bom' => "\xEF\xBB\xBF<?php echo fopen('b'), \"\\n\";\n",
    'html' => "<b>\n</b>\n<?php echo fopen('c'), \"\\n\";\n",
    'echo' => "<?= fopen('d') ?>\n",
    'echo2' => "x<?=fopen('e')?>\n<?php echo strtoupper('f'), \"\\n\";",
    'crlf' => "<?php\r\necho fopen('g'), \"\\r\\n\";\r\n",
    'tab' => "<?php\techo fopen('h'), \"\\n\";",
    'close' => "<?php ?>\n<?php echo fopen('i'), \"\\n\";",
    'docblock' => "<?php /** doc */ echo fopen('j'), \"\\n\";",
    'comment' => "<?php // c\necho fopen('k'), \"\\n\";",
    'strict' => "<?php declare(strict_types=1);\necho fopen('l'), \"\\n\";",
    'markerstr' => "<?php echo '" . $b->marker . "', fopen('m'), \"\\n\";",
    'halt' => "<?php echo fopen('n'), __COMPILER_HALT_OFFSET__, \"\\n\"; __halt_compiler();DATA",
];
$dir = sys_get_temp_dir() . '/r4_idem_05_' . getmypid();
@mkdir($dir);
foreach ($srcs as $name => $src) {
    $t = $b->translate($src, "$dir/$name.php");
    file_put_contents("$dir/$name.php", $t);
    echo "$name: ";
    ob_start();
    include "$dir/$name.php";
    $out = ob_get_clean();
    echo trim(str_replace(["\xEF\xBB\xBF", $b->marker], ["BOM", "MARKER"], $out)), ' ', $b->translate($t, "$dir/$name.php") === $t ? 'same' : 'CHANGED', ' ', str_contains($t, $b->marker) ? 'marked' : 'unmarked', "\n";
    unlink("$dir/$name.php");
}
rmdir($dir);
