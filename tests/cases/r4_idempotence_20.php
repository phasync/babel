<?php
// Code translated with one map and translated again (same origin) with a larger map: every call site
// keeps its own namespace fallback decision; a new site must not share an id with an existing one.
namespace R {
    function f($x) { return "f($x)"; }
    function show($x) { return "show($x)"; }
}
namespace {
    use phasync\Babel\Babel;
    use phasync\Babel\Runtime;

    $A = new Babel(['fopen' => 'R\f']);
    $B = new Babel(['fopen' => 'R\f', 'strlen' => 'R\show']);
    $x = "<?php\nnamespace app;\necho strlen(fopen('x')), \"\\n\";\n";
    $t = $B->translate($A->translate($x, '/virtual/x.php'), '/virtual/x.php');
    $h = Runtime::babel();
    Runtime::configure($B);
    eval('?>' . $t);
    Runtime::configure($h);
}
