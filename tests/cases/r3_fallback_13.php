<?php
// the map names a namespaced user function that the same file declares
namespace Y {
    function helper() { return 'Y:helper'; }
    function maybe() { return 'Y:maybe'; }
}
namespace {
    $b = new phasync\Babel\Babel(['app\helper' => 'Y\helper', 'App\maybe' => 'Y\maybe']);
    $code = $b->translate('<?php namespace App;
    function helper() { return "App:helper"; }
    if (true) { function maybe() { return "App:maybe"; } }
    echo helper(), " ", \App\helper(), " ", namespace\helper(), " ", maybe(), " ", \App\maybe(), "\n";
    ', 'virtual.php');
    eval(substr($code, 5));
}
