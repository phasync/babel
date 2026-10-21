<?php
// fallback calls in class-level contexts (enums, readonly, hooks, attributes, anonymous classes, heredoc),
// custom map gfn => Hook2\gfn, with and without the namespaced function; compared with plain eval
namespace Hook2 { function gfn(...$a) { return 'H'; } }
namespace { function gfn(...$a) { return 'G'; } }
namespace {
$src = <<<'SRC'
namespace App;
enum Suit: string {
    case A = 'a';
    const F = [1];
    function label() { return gfn() . $this->value; }
    static function make() { return self::from(\strtolower(gfn() === 'L' ? 'a' : 'a')); }
}
interface I { const X = 'ix'; }
#[\Attribute] class At { function __construct(public $f) {} }
final readonly class R implements I { function __construct(public string $v = 'r') {} function go() { return gfn() . $this->v; } }
class Hk {
    public string $v = 'x' { get => gfn() . $this->v; set(string $s) { $this->v = $s . gfn(); } }
    function __invoke($x) { return "inv:$x" . gfn(); }
    #[At(static function () { return gfn(); })] function m() {}
}
function run() {
    $r = [];
    $r[] = Suit::A->label() . Suit::make()->value;
    $r[] = (new R)->go();
    $h = new Hk; $h->v = 'w'; $r[] = $h->v;
    $r[] = $h(gfn());
    $r[] = ((new \ReflectionMethod(Hk::class, 'm'))->getAttributes()[0]->newInstance()->f)();
    $o = new class(gfn()) { function __construct(public $c) {} function z() { return $this->c . gfn(); } };
    $r[] = $o->z();
    $a = ['G' => 'ag', 'H' => 'ah', 'L' => 'al'];
    $r[] = <<<TXT
    hd:{$a[gfn()]}
    TXT;
    $r[] = \array_map(fn ($x) => $x . gfn(), [1])[0];
    $r[] = \call_user_func(function () { return gfn(); });
    if (true) { function inner() { return 'in' . gfn(); } }
    $r[] = inner();
    $c = gfn(...); $r[] = $c() . (new \ReflectionFunction($c))->getShortName();
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
