<?php
// an import applies only to the code after it; calls before it fall back as usual
namespace Other { function up($s) { return 'Other:up'; } }
namespace App {
    echo strtoupper('a'), ' ', fopen('b'), "\n";
    use function Other\up as strtoupper;
    use function fopen as FOPEN;
    echo strtoupper('c'), ' ', fopen('d'), "\n";
    function late() { return strtoupper('e') . ' ' . fopen('f'); }
    eval('namespace App; function fopen($x) { return "App:fopen"; }');
    echo late(), "\n";
}
