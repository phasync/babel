<?php
// the result of a fallback call used as a class name, callee or array: the run time wrappers compose
namespace Hook2 { function gfn(...$a) { return $a ? [$a[0] => 'Orig\Thing'] : 'Orig\Thing'; } function cb(...$a) { return 'fopen'; } }
namespace {
    $b = new phasync\Babel\Babel(['gfn' => 'Hook2\gfn', 'cb' => 'Hook2\cb', 'fopen' => 'Hook\fopen'], ['Orig\Thing' => 'Repl\Thing']);
    phasync\Babel\Runtime::configure($b);
    $code = $b->translate('<?php namespace App;
echo gfn()::who(), " ", gfn()::X, " ", gfn()::$p, " ", (new (gfn()))::class, "\n";
echo cb()("x"), " ", gfn("k")["k"]::who(), " ", \get_class(new (gfn("k")["k"])), "\n";
$o = null;
echo "{${"o"}?->x}|" . (gfn() instanceof \Stringable ? "y" : "n") . "|" . (new \Repl\Thing instanceof (gfn()) ? "inst" : "no"), "\n";
echo \call_user_func(cb(), 1), " ", \is_a(gfn(), "Repl\Thing", true) ? "isa" : "not", "\n";
', '/x/c26.php');
    eval('?>' . $code);
}
