<?php
// fallback calls in many syntactic positions (custom map gfn => Hook2\gfn), before and after the
// namespaced function exists; PHP output computed with plain eval of the same source
namespace Hook2 { function gfn(...$a) { return 'H'; } }
namespace { function gfn(...$a) { return 'G'; } }
namespace {
$src = <<<'SRC'
namespace App;
class E extends \Exception {}
class K { const H = 'kh'; const G = 'kg'; const L = 'kl'; static function m() { return 'km'; } public $p = ['G' => 'pg', 'H' => 'ph', 'L' => 'pl']; }
function run() {
    $o = new K; $a = ['G' => 'ag', 'H' => 'ah', 'L' => 'al']; $n = null;
    $r = [];
    $r[] = match (gfn()) { 'G' => 'm:' . gfn(), 'H' => 'm:' . gfn(), default => 'm:' . gfn() };
    $r[] = (fn () => fn () => gfn())()();
    $r[] = "s:{$a[gfn()]}:{$o->p[gfn()]}";
    $r[] = K::{gfn()};
    $r[] = $o->{'p'}[gfn()];
    $r[] = isset($a[gfn()]) ? 'set' : 'unset';
    $r[] = empty($a[gfn()]) ? 'empty' : 'full';
    $r[] = $n?->x(gfn()) ?? 'ns-null';
    [gfn() => $v] = ['G' => 'dg', 'H' => 'dh', 'L' => 'dl']; $r[] = $v;
    try { throw new E(gfn()); } catch (E $e) { $r[] = 'e:' . $e->getMessage(); }
    $g = (function () { yield gfn() => gfn(); yield from [gfn()]; })();
    foreach ($g as $k => $x) { $r[] = "y:$k$x"; }
    switch (gfn()):
        case 'G': $r[] = 'sw:' . gfn(); break;
        default: $r[] = 'sw-def:' . gfn();
    endswitch;
    foreach ([gfn()] as $x): $r[] = "fe:$x" . gfn(); endforeach;
    declare(ticks=1) { $r[] = 'dc:' . gfn(); }
    $r[] = sprintf('%s', gfn(...)());
    $r[] = (static function () { return \strrev(gfn()); })();
    $r[] = gfn(gfn(gfn()));
    $r[] = gfn() . gfn() <=> gfn();
    $r[] = (string) (gfn())[0];
    $r[] = \array_key_last([gfn() => 1]);
    return implode(' ', $r);
}
echo run(), "\n";
SRC;
$run = function (string $ns, bool $tool) use ($src) {
    $code = str_replace('namespace App;', "namespace $ns;", $src);
    eval("namespace $ns; function gfn(...\$a) { return 'L'; }");
    ob_start();
    if ($tool) {
        $b = new phasync\Babel\Babel(['gfn' => 'Hook2\gfn']);
        phasync\Babel\Runtime::configure($b);
        eval($b->translate($code, "$ns(1) : eval()'d code"));
    } else {
        eval($code);
    }
    return ob_get_clean();
};
$runG = function (string $ns, bool $tool) use ($src) {
    $code = str_replace('namespace App;', "namespace $ns;", $src);
    ob_start();
    if ($tool) {
        $b = new phasync\Babel\Babel(['gfn' => 'Hook2\gfn']);
        phasync\Babel\Runtime::configure($b);
        eval($b->translate($code, "$ns(1) : eval()'d code"));
    } else {
        eval($code);
    }
    return ob_get_clean();
};
$tg = $runG('T1', true); $pg = $runG('P1', false);
$tl = $run('T2', true); $pl = $run('P2', false);
echo $tg, $tl;
echo str_replace('G', 'H', $pg) === $tg ? "global: same as PHP\n" : "global PHP: $pg";
echo $pl === $tl ? "local: same as PHP\n" : "local PHP: $pl";
}
