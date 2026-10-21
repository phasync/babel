<?php
// use function: an import of the global function bypasses the fallback, an alias to a namespaced
// function is not a fallback call, and imports end with their namespace block
namespace App\Lib {
    function up($s) { return 'Lib:up'; }
}
namespace App {
    function strtoupper($s) { return 'App:strtoupper'; }
}
namespace Other {
    use function strtoupper;
    use function App\Lib\up as fopen;
    use function App\strtoupper as UP;
    echo strtoupper('a'), ' ', STRTOUPPER('b'), ' ', fopen('c'), ' ', up2(), ' ', UP('d'), "\n";
    function up2() { return \strtoupper('e') . '/' . namespace\strtoupper2(); }
    function strtoupper2() { return 'Other:strtoupper2'; }
}
namespace App {
    echo strtoupper('f'), ' ', fopen('g'), "\n";
    $f = function () { return fopen('h'); };
    eval('namespace App; function fopen($x) { return "App:fopen"; }');
    echo $f(), ' ', fopen('i'), "\n";
}
