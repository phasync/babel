<?php
// nested declarations (inside functions, closures, blocks) only exist once executed
namespace App;
function install() {
    function fopen($x) { return 'nested-fopen'; }
}
$c = function () { function strtoupper($s) { return 'closure-strtoupper'; } };
declare(ticks=1) {
    function usleep($n) { return 'declare-usleep'; }
}
{
    function sleep($n) { return 'block-sleep'; }
}
echo fopen('x'), ' ', strtoupper('x'), ' ', usleep(1), ' ', sleep(1), "\n";
install();
$c();
echo fopen('x'), ' ', strtoupper('x'), "\n";
