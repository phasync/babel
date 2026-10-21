<?php
// php-mock pattern: PHP binds an unqualified namespaced call site on its first execution and keeps
// the global fallback even after the namespaced function is defined later
namespace App;
function f() { return strtoupper('x'); }
echo f(), "\n";
eval('namespace App; function strtoupper($x) { return "local"; }');
echo f(), "\n";
for ($i = 0; $i < 2; $i++) {
    echo strtoupper('y'), "\n";
}
