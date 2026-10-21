<?php
// a file with a syntax error (an unbalanced closing bracket in front of a computed callee): the
// translation must not warn, PHP reports its own ParseError
foreach (['bad1', 'bad2', 'bad3', 'bad4', 'bad5', 'bad6'] as $f) {
    try {
        include __DIR__ . "/fixtures/r5_syntax3_$f.php";
    } catch (ParseError $e) {
        echo $e->getMessage(), ' @ ', $e->getLine(), "\n";
    }
}
