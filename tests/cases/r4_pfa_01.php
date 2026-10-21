<?php
// Partial function application (PHP 8.6 RFC): placeholders are never wrapped; a class-name function
// with a placeholder in its class argument goes to its shim. Checked on the translated text only (as a file: eval'd code that does not parse is left alone).
$b = new phasync\Babel\Babel(['fopen' => 'Hook\fopen'], ['Orig\Thing' => 'Repl\Thing']);
foreach ([
    '$a = fopen(?, "r");',
    '$a = is_a($x, ?);',
    '$a = is_a(?, "Orig\Thing");',
    '$a = array_map(?, $list);',
    '$a = $f(?, 1);',
    '$a = is_a(...);',
    '$a = class_exists(...);',
] as $code) {
    echo preg_replace('/^<\?php\s+/', '', str_replace($b->marker, '', $b->translate("<?php $code", '/x.php'))), "\n";
}
