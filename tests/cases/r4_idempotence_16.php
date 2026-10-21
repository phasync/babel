<?php
// Chained maps are rejected by the constructor, whatever the case and leading backslashes.
use phasync\Babel\Babel;

$maps = [
    'fn chain' => [['fopen' => 'A\f', 'A\f' => 'B\f'], []],
    'fn chain case' => [['fopen' => 'A\F', '\a\f' => 'B\f'], []],
    'fn chain bs' => [['fopen' => '\\\\A\f', 'a\f' => 'B\f'], []],
    'fn self' => [['fopen' => 'fopen'], []],
    'fn self case' => [['FOPEN' => '\fopen'], []],
    'fn cycle' => [['a' => 'b', 'b' => 'a'], []],
    'cls chain' => [[], ['Orig\Thing' => 'Repl\Thing', 'repl\THING' => 'X']],
    'cls self' => [[], ['PDO' => '\pdo']],
    'cls cycle' => [[], ['A' => 'B', 'B' => 'A']],
    'fn to class name' => [['fopen' => 'Orig\Thing'], ['Orig\Thing' => 'Repl\Thing']],
    'class to fn name' => [['Orig\Thing' => 'Hook\fopen'], ['Hook\fopen' => 'Repl\Thing']],
    'ok' => [['fopen' => 'Hook\fopen'], ['Orig\Thing' => 'Repl\Thing']],
];
foreach ($maps as $name => [$f, $c]) {
    try {
        new Babel($f, $c);
        echo "$name: accepted\n";
    } catch (\InvalidArgumentException $e) {
        echo "$name: rejected\n";
    }
}
