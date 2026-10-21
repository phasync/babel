<?php
// a namespaced key in the map: PHP does not remember a failed lookup (neither function exists), and
// reports the namespaced name in the error
namespace Y { function helper() { return 'Y:helper'; } }
namespace {
    $b = new phasync\Babel\Babel(['App\helper' => 'Y\helper', 'strtoupper' => 'Hook\strtoupper']);
    $code = $b->translate('<?php namespace App;
function t() { return helper(); }
try { echo t(), "\n"; } catch (\Error $e) { echo $e->getMessage(), "\n"; }
function helper2() { return Helper(); }
eval("namespace App; function helper() { return \"App:helper\"; }");
echo helper2(), "\n";
echo t(), " ", strtoupper("x"), "\n";
', '/x/a.php');
    eval('?>' . $code);
}
