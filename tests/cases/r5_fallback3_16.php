<?php
// eval'd code never inherits the namespace of the code that evals it; its own top level declarations
// are bound before it runs; code that does not parse reports PHP's own error
namespace App;
eval('namespace App; function strtoupper($x) { return "local($x)"; }');
echo eval('return strtoupper("g");'), ' ', eval('namespace App { return strtoupper("n"); }'), ' ',
    eval('namespace App\Sub; return strtoupper("s");'), ' ', eval('namespace App; use function strtoupper; return strtoupper("u");'), "\n";
echo eval('namespace App; $r = fopen("a"); function fopen($x) { return "lf($x)"; } return $r;'), ' ', fopen('b'), "\n";
try { eval('namespace App; return strtoupper(;'); } catch (\ParseError $e) { echo $e->getMessage(), ' @', $e->getLine(), "\n"; }
