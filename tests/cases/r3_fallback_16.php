<?php
// nsFallback: false rewrites unqualified namespaced calls to the replacement without a run time check
namespace {
    $b = new phasync\Babel\Babel(['fopen' => 'Hook\fopen', 'strtoupper' => 'Hook\strtoupper'], [], true, false);
    eval('namespace App; function strtoupper($s) { return "App:strtoupper"; }');
    $code = $b->translate('<?php namespace App;
    function fopen($x) { return "App:fopen"; }
    echo fopen("x"), " ", strtoupper("y"), "\n";
    ', 'virtual.php');
    echo str_contains($code, 'function_exists') ? "checked\n" : "unchecked\n";
    eval(substr($code, 5));
}
