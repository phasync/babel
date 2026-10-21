<?php
// nsFallback: false with a conditional declaration in the same file (same-file declarations still honoured)
namespace {
    $b = new phasync\Babel\Babel(['fopen' => 'Hook\fopen'], [], true, false);
    $code = $b->translate('<?php namespace App;
    if (!\function_exists("App\\\\fopen")) { function fopen($x) { return "App:fopen"; } }
    echo fopen("x"), "\n";
    ', 'virtual.php');
    echo str_contains($code, 'Runtime::ns(') ? "checked\n" : "unchecked\n";
    eval(substr($code, 5));
}
