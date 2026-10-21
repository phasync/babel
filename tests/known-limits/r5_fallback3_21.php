<?php
// scope-reading functions mapped by a custom map (compact, func_get_args, get_defined_vars) from closures,
// arrow functions and generators: the run time choice is kept per call site, and the namespaced function
// is called when it exists at the first call
namespace X { function compact(...$a) { return 'X:compact'; } function fga(...$a) { return 'X:fga'; } function gdv(...$a) { return 'X:gdv'; } }
namespace {
    $b = new phasync\Babel\Babel(['compact' => 'X\compact', 'func_get_args' => 'X\fga', 'get_defined_vars' => 'X\gdv']);
    phasync\Babel\Runtime::configure($b);
    eval('?>' . $b->translate('<?php namespace App;
$c = function ($a) { $v = 1; return compact("v") . "," . func_get_args() . "," . get_defined_vars(); };
$f = fn ($a) => compact("a") . "," . func_get_args();
function g($a) { yield compact("a"); yield func_get_args(); }
echo $c(1), " ", $f(2), " ", implode(",", iterator_to_array(g(3), false)), "\n";
eval("namespace App; function compact(...\$a) { return \"App:compact\"; } function func_get_args() { return \"App:fga\"; }");
$c2 = function ($a) { return compact("a") . "," . func_get_args(); };
echo $c(1), " ", $f(2), " ", implode(",", iterator_to_array(g(3), false)), " ", $c2(4), "\n";
', '/x/a.php'));
}
