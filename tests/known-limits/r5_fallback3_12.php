<?php
// a namespaced key whose global function does not exist yet: the error names the namespaced function,
// a global function defined afterwards is found (and kept), the namespaced one defined later is not
namespace Y { function h(...$a) { return 'Y:h'; } }
namespace {
    $b = new phasync\Babel\Babel(['App\nofn' => 'Y\h']);
    eval('?>' . $b->translate('<?php namespace App;
function t() { return nofn(); }
try { echo t(), "\n"; } catch (\Error $e) { echo $e->getMessage(), "\n"; }
eval("function nofn() { return \"global\"; }");
echo t(), "\n";
eval("namespace App; function nofn() { return \"App\"; }");
echo t(), " ", (fn () => nofn())(), "\n";
', '/x/a.php'));
}
