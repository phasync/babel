<?php
// only a namespaced key is mapped and the namespaced function does not exist: PHP calls the global
// function, also from a scope-reading call (compact), a first-class callable in a constant expression,
// and with nsFallback: false or runtime: false (the global function is not mapped, so nothing to send it to)
namespace Y { function c(...$a) { return 'Y:c'; } function h(...$a) { return 'Y:h'; } }
namespace { function helper() { return 'global helper'; } }
namespace {
    $src = '<?php namespace App%d;
function f() { $v = 1; return \json_encode(compact("v")); }
const F = helper(...);
echo f(), " ", (F)(), " ", helper(), "\n";
';
    $map = ['App1\compact' => 'Y\c', 'App1\helper' => 'Y\h', 'App2\compact' => 'Y\c', 'App2\helper' => 'Y\h', 'App3\compact' => 'Y\c', 'App3\helper' => 'Y\h'];
    eval('?>' . (new phasync\Babel\Babel($map))->translate(sprintf($src, 1), '/x/a.php'));
    eval('?>' . (new phasync\Babel\Babel($map, nsFallback: false))->translate(sprintf($src, 2), '/x/b.php'));
    eval('?>' . (new phasync\Babel\Babel($map, runtime: false))->translate(sprintf($src, 3), '/x/c.php'));
}
