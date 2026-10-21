<?php
// first-class callables in constant expressions with both a global and a namespaced key: the namespaced
// function does not exist, so PHP calls the global one (README: rewritten to the global replacement)
namespace Y { function up(...$a) { return 'Y:up'; } }
namespace {
    $b = new phasync\Babel\Babel(['strtoupper' => 'Hook\strtoupper', 'App\strtoupper' => 'Y\up']);
    $code = $b->translate('<?php namespace App;
const F = strtoupper(...);
class C { const G = [strtoupper(...)]; }
function d($f = strtoupper(...)) { return $f("d"); }
echo (F)("a"), " ", (C::G[0])("b"), " ", d(), " ", strtoupper("c"), "\n";
', '/x/a.php');
    eval('?>' . $code);
}
