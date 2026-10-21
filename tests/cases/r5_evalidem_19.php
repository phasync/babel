<?php
// nested eval: each level is its own unit with its own call sites, halt offset and origin
namespace App;
function L($f) { echo preg_replace('~^.*?((\(\d+\) : eval\(\)\'d code)+)$~', '$1', $f), "\n"; }
$code = <<<'C'
\App\L(__FILE__);
echo fopen('a'), ' ', __COMPILER_HALT_OFFSET__, "\n";
if (!function_exists('App\fopen')) {
    eval('namespace App; function fopen($x) { return "App:fopen"; }');
}
eval("namespace App;\n\\App\\L(__FILE__);\necho fopen('b'), ' ', __COMPILER_HALT_OFFSET__, \"\\n\"; __halt_compiler();x");
__halt_compiler();data
C;
eval('namespace App; ' . $code);
eval('namespace App; ' . $code);
