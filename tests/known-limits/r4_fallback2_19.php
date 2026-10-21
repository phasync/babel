<?php
// nsFallback: false still checks functions the unit declares conditionally (also in eval'd code);
// other calls go straight to the replacement
namespace {
    $b = new phasync\Babel\Babel(['fopen' => 'Hook\fopen', 'strtoupper' => 'Hook\strtoupper', 'is_a' => 'Hook\fopen_alt'], ['Orig\Thing' => 'Repl\Thing'], true, false);
    phasync\Babel\Runtime::configure($b);
    $code = $b->translate('<?php namespace App;
function f() { return strtoupper("a") . " " . fopen("b") . " " . is_a("x", "y"); }
echo f(), "\n";
if (!\function_exists("App\strtoupper")) { function strtoupper($s) { return "App:strtoupper"; } }
echo f(), "\n";
eval("namespace App; if (true) { function fopen(\$x) { return \"App:fopen\"; } } echo fopen(1), \" \", strtoupper(2), \"\\n\";");
echo f(), "\n";
', '/x/a.php');
    eval('?>' . $code);
}
