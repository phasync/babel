<?php
// includeHandler: every include/include_once/require/require_once keeps the construct, and its
// path expression -- with or without parentheses, any expression (here: a plain string, a
// parenthesised string, and a ?? fallback) -- becomes handler(EXPR, '<original directory>').
// The construct and PHP's own include semantics (the return value) are otherwise unaffected.
namespace Hook {
    function includeHandler($path, $dir)
    {
        $expected = __DIR__ . '/fixtures';
        echo $path, ' dir=', ($dir === $expected ? 'ok' : "WRONG:$dir"), "\n";

        return __DIR__ . '/fixtures/r6_inc_target.php';
    }
}
namespace {
    $b = new phasync\Babel\Babel([], [], true, true, 'Hook\includeHandler');
    $code = $b->translate('<?php
    $a = null;
    echo include "a.php";
    echo "\n";
    echo include("b.php");
    echo "\n";
    echo include ($a ?? "c.php");
    echo "\n";
    ', __DIR__ . '/fixtures/virtual.php');
    eval(substr($code, 5));
}
