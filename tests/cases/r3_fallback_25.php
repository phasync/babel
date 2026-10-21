<?php
// map holds both the global function and the namespaced one; the namespaced one does not exist
namespace Y { function nsfopen(...$a) { return 'Y:nsfopen'; } }
namespace {
    $b = new phasync\Babel\Babel(['fopen' => 'Hook\fopen', 'App\fopen' => 'Y\nsfopen']);
    $code = $b->translate('<?php namespace App;
    echo fopen("x"), " ", \App\Sub\f(), "\n";
    namespace App\Sub;
    function f() { return fopen("y"); }
    ', 'virtual.php');
    eval(substr($code, 5));
    eval('namespace App; function fopen($x) { return "App:fopen"; }');
    $code = $b->translate('<?php namespace App; echo fopen("z"), "\n";', 'virtual2.php');
    eval(substr($code, 5));
}
