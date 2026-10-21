<?php
// Replacements that are not plain names: a static method string and a name with surrounding blanks.
// The constructor must reject them, or the translation must be valid PHP and a second translation
// must change nothing.
use phasync\Babel\Babel;

$tests = [
    [['fopen' => 'Orig\Thing::who'], ['Orig\Thing' => 'Repl\Thing']],
    [['fopen' => ' A\f', 'a\f' => 'B\g'], []],
    [['fopen' => "A\\f\n"], []],
];
$src = "<?php\nuse function fopen;\necho fopen('x'), \\fopen('y');\n";
foreach ($tests as $n => [$f, $c]) {
    try {
        $b = new Babel($f, $c);
    } catch (\InvalidArgumentException $e) {
        echo "$n ok\n";
        continue;
    }
    $t1 = str_replace($b->marker . ' ', '', $b->translate($src, '/t.php'));
    $t2 = str_replace($b->marker . ' ', '', $b->translate($t1, '/t.php'));
    $lint = true;
    try {
        token_get_all($t1, TOKEN_PARSE);
    } catch (\ParseError $e) {
        $lint = false;
    }
    $lines = substr_count($t1, "\n") === substr_count($src, "\n");
    echo $n, ' ', $t1 === $t2 && $lint && $lines ? 'ok' : 'broken: ' . ($lint ? '' : 'parse error; ') . ($lines ? '' : 'line count changed; ') . ($t1 === $t2 ? '' : 'second translation changed it'), "\n";
}
