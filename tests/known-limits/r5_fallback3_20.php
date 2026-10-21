<?php
// a namespaced key next to the global key: the run time choice picks the namespaced replacement only when
// the namespaced function exists; namespace\ and fully qualified calls are not fallbacks
namespace Y { function up(...$a) { return 'Y:up'; } function lo(...$a) { return 'Y:lo'; } }
namespace {
    $b = new phasync\Babel\Babel(['strtoupper' => 'Hook\strtoupper', 'App\strtoupper' => 'Y\up', 'App\Sub\strtoupper' => 'Y\lo']);
    phasync\Babel\Runtime::configure($b);
    $src = '<?php namespace App%s;
function t%s() { return [strtoupper("a"), (fn () => strtoupper(...))()("b"), \strtoupper("c"), \call_user_func("strtoupper", "d")]; }
';
    eval('?>' . $b->translate(sprintf($src, '', '1'), '/x/a.php'));
    eval('?>' . $b->translate(sprintf($src, '\Sub', '2'), '/x/b.php'));
    echo implode(' ', App\t1()), "\n";
    echo implode(' ', App\Sub\t2()), "\n";
    eval('namespace App\Sub; function strtoupper($s) { return "App\Sub:$s"; }');
    eval('namespace App; function strtoupper($s) { return "App:$s"; }');
    echo implode(' ', App\t1()), "\n";
    eval('?>' . $b->translate(sprintf($src, '', '3'), '/x/c.php'));
    eval('?>' . $b->translate(sprintf($src, '\Sub', '4'), '/x/d.php'));
    echo implode(' ', App\t3()), "\n", implode(' ', App\Sub\t4()), "\n";
}
