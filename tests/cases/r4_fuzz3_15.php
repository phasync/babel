<?php
declare(strict_types=1);
use Orig\Thing;
use Orig\Base as OB, Orig\Thing as T2;
class H0 {
    public $p = 'Orig\Thing'; public $pb = 'Orig\Base';
    public static $sp = 'Orig\Thing'; public static $spb = 'Orig\Base';
    const C = 'Orig\Thing'; const CB = 'Orig\Base';
    const string NEW = 'NEW'; const ?\Orig\Thing TT = null; const LIST = 'Orig\Thing';
    public ?H0 $n = null; public ?H0 $self = null; public $cb = 'Orig\Thing::who';
    public function m() { return 'Orig\Thing'; }
    public static function default() { return 'Orig\Thing'; }
    public function new() { return 'new'; }
    public static function list(...$a) { return 'list:' . \implode(',', \array_keys($a)); }
    public function fn($new = 1, $class = 2, $static = 3, $list = 4, $array = 5) { return "$new$class$static$list$array"; }
    public static function mk() { return (new static::$spb)->name(); }
    public function mk2() { return (new self::$spb())->name(); }
    public static function who() { return static::$sp::who(); }
    public function __invoke($x) { return 'inv:' . $x; }
    public $arrp = ['k' => 'Orig\Thing'];
}
function fc0() { return 'Orig\Thing'; }
function fb0() { return 'Orig\Base'; }
function fcb0() { return 'Orig\Thing::who'; }
enum E0: string { case NEW = 'n'; case Default = 'd'; const Orig = 'Orig\Thing'; }
$c = 'Orig\Thing'; $cl = '\orig\THING'; $b = 'Orig\Base'; $o = new H0; $o->self = $o;
$arr = ['k' => 'Orig\Thing', 'b' => 'Orig\Base', 'f' => 'fopen', 's' => 'strtoupper', 'm' => ['Orig\Thing', 'who'], 'sm' => 'Orig\Thing::who', 'h' => $o];
$n = 'c'; $nb = 'b'; $nul = null; $t = new \Orig\Thing; $tb = new \Orig\Base; $mv = 'who';
$vf = 'fopen'; $vs = 'STRTOUPPER'; $vm = 'Orig\Thing::who'; $va = ['Orig\Thing', 'who']; $vo = [$t, 'who'];
$vcl = static fn(...$a) => 'cl'; $vfc = \strtoupper(...); $vlow = 'strtolower'; $gc = fn() => 'Orig\Thing'; $fa = \is_a(...); $hk = H0::class; $nn = 'n'; $kx = 'X'; $kc = 'C';
$vinc = function (&$x) { return ++$x; }; $vsort = 'sort'; $vref = function &() { static $s = [0]; return $s; };
class KW0 {
    public $fopen = 'fopen'; public static $eval = 'strtoupper'; const fopen = 'Orig\Thing'; const eval = 'Orig\Thing'; const new = 'Orig\Thing';
    public function eval($x = '') { return "m:$x"; } public static function exit() { return 'x'; } public function fopen(...$a) { return 'mf' . \count($a); }
    public static function include($a = 0) { return "inc$a"; } public function new() { return $this; } public function list() { return [$this, 'eval']; }
    public static function strtoupper($x = '') { return 'ks' . $x; } public function is_a($object_or_class = null, $class = null) { return 'kis' . \json_encode([$object_or_class, $class]); }
    public function array_map(...$a) { return 'kam' . \json_encode($a); } public static function require($x) { return "req$x"; } public function print($x) { return "pr$x"; }
    public function function() { return 'fn'; } public static function static() { return 'st'; } public function clone() { return 'cl'; } public function match() { return 'ma'; }
    public function fn() { return 'fnn'; } public function namespace() { return 'nsm'; } public static function class_exists($class) { return 'kce' . $class; }
    public function call_user_func($cb) { return 'kcuf' . \json_encode($cb); } public static function isset() { return 'iss'; } public function empty() { return 'emp'; }
    public function default() { return 'df'; } public function enum() { return 'en'; }
}
function bmp0($x) { $GLOBALS['blog'][] = $x; return $x; }
function bf0() { $r = \implode(',', $GLOBALS['blog'] ?? []); $GLOBALS['blog'] = []; return $r; }
class Q0 { public static ?Q0 $inst = null; public static ?Q0 $none = null; public static $fns = ['f' => 'fopen', 's' => 'Orig\Thing::who', 'a' => ['Orig\Thing', 'who']]; public $fnp = ['f' => 'strtoupper', 'm' => 'Orig\Thing::who']; public ?Q0 $self = null; public ?Q0 $n = null; public $p = 'Orig\Thing'; public $cb = 'Orig\Thing::who'; public function __construct() { $this->self = $this; } public function mm($x) { return $this; } public function nn($x) { return null; } public function cbm() { return 'fopen'; } public static function sf() { return 'strtoupper'; } public function m() { return 'Orig\Thing'; } public function __invoke($x = 0) { return 'qinv'; } }
function fq0() { return $GLOBALS['qq']; }
$qq = new Q0; $qq->self = $qq; Q0::$inst = $qq; $kw = new KW0; $nf = 'vf'; $qk = Q0::class;
foreach ([1] as $_): while ($_--): var_export(H0::list(PDO: new \Orig\Base, OB: 1)); echo "\n"; endwhile; endforeach;
abstract class Y2 implements \Orig\Contract { const T2|string|null fopen = null; const Thing = 'v'; public T2|string|null $pp; }
var_export([(string) (new \ReflectionClassConstant(Y2::class, 'fopen'))->getType(), Y2::fopen, Y2::Thing, (string) (new \ReflectionProperty(Y2::class, 'pp'))->getType()]); echo "\n";
switch (1): case 1: var_export($kw->eval('a')); echo "\n"; break; endswitch;
var_export((new class((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return [(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return [$qq][0]?->mm(json_encode(<<<EOT
<{$o::C::$mv()}>
EOT))?->mm(json_encode($kw->default()))->p::$p; } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf0()]; })()) { public function __construct(public $v) {} })->v); echo "\n";
class R6 { public static function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return H0::C::$mv(); } }
var_export(R6::r()); echo "\n";
if ($t): var_export(["<{$kw->fopen('z')}|{$qq?->p::who(bmp0('J'))}>", bf0()]); echo "\n"; endif;
class R8 { public $v { get { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return $arr['s'](...['ab']); } } }
var_export((new R8)->v); echo "\n";
for ($i9 = 0; $i9 < 1; $i9++): var_export(file_get_contents(filename: 'data:,hi')); echo "\n"; endfor; ?>inline9
<?php
foreach ((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; yield (new ($b)())->name(); })() as $__v) { var_export($__v); echo "\n"; }
class R11 { public $w; public $v { set($x) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; $this->w = H0::default()::who(); } } }
$r11 = new R11; $r11->v = 1; var_export($r11->w); echo "\n";
var_export((new class { public function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return [(new Q0)(...['ab']), bf0()]; } })->r()); echo "\n";
/* c */ $o::C::who() |> bmp0(...); echo bf0(), "\n";
function w14() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; var_export(["<{$o->fn("{$c::who()}")}|{$o::C::who()}>", bf0()]); echo "\n"; }
w14();
$__o16 = new \ArrayObject([]); $__o16['k'] = [(new \ReflectionFunction('at15'))->getAttributes()[0]->getName(), ((new \ReflectionFunction('at15'))->getAttributes()[0]->newInstance()->v)('ab')]; var_export($__o16['k']); echo "\n";
#[\Orig\Attr(v: \strtoupper(...))] function at15() {}
?><?= json_encode($$$nn::$mv()) ?>

<?php
match (1) { 1 => 1 }; ($c)::{$mv}() |> bmp0(...); echo bf0(), "\n";
switch (1): case 1: var_export(ARRAY_REDUCE(['ab'], 'strtoupper')); echo "\n"; break; endswitch;
class R20 { public function m($f = static function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return get_parent_class(($c)); }) { return $f(); } }
var_export((new R20)->m()); echo "\n";
var_export(match (true) { default => $hk::list(fn: 1, static: 2) }); echo "\n";
class R22 { const K = static function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return is_a($t, H0::C); }; }
var_export((R22::K)()); echo "\n";
function &r24() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; static $s; $s = [(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return (($nul ?? $qq)?->mm(bmp0('L0'))->p)::$mv(bmp0('V')); } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf0()]; return $s; }
var_export(r24()); echo "\n";
abstract class Y25 implements \Orig\Contract { const ?\PDO LIST = null; const Thing = 'v'; public ?\PDO $pp; }
var_export([(string) (new \ReflectionClassConstant(Y25::class, 'LIST'))->getType(), Y25::LIST, Y25::Thing, (string) (new \ReflectionProperty(Y25::class, 'pp'))->getType()]); echo "\n";
function w26($q = 1) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; static $z = $kw->is_a(class: 'Orig\Thing'); return $z; }
var_export(w26()); echo "\n";
if (!$t) { } else [$t, 'who']() |> bmp0(...); echo bf0(), "\n";
['k' => $__a29] = ['k' => [(new \ReflectionFunction('at28'))->getAttributes()[0]->getName(), ((new \ReflectionFunction('at28'))->getAttributes()[0]->newInstance()->v)('ab')]]; var_export($__a29); echo "\n";
#[\Orig\Attr(v: strtoupper(...))] function at28() {}
?><?php ($vf)(...)('ab') |> bmp0(...); echo bf0(), "\n";
try { var_export([<<<EOT
<{$vcl(bmp0('A'))}> {$c}
EOT, bf0()]); } catch (\Throwable $e) { echo get_class($e), ':', $e->getMessage(); } echo "\n";
?><?= json_encode([($qq->cb)(bmp0('A')), bf0()]) ?>

<?php
interface IR34 { const C = 1; public static function r(); } final class R34 implements IR34 { public static function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return [(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return $qq::$inst->self?->self->self?->p::$p; } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf0()]; } }
var_export(R34::r()); echo "\n";
var_export(iterator_to_array((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; yield from ["<{$c::$p}>"]; })())); echo "\n";
var_export($kw->{'eval'}('d')); echo "\n";
try { var_export(KW0::{'fopen'}); } catch (\Throwable $e) { echo get_class($e), ':', $e->getMessage(); } echo "\n";
var_export(\Closure::fromCallable($arr['m'])('ab')); echo "\n";
for ($i39 = 0; $i39 < 1; $i39++): var_export([<<<EOT
<{$qq->self::sf()}|{$kw->fopen('z')}|{$o->fn("{$vf('x')}", '{$c::who()}')}>
EOT, bf0()]); echo "\n"; endfor; ?>inline39
<?php
var_export([(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return ($qq->n?->nn(bmp0('N0'))?->mm(bmp0('L1'))?->self->self->p)::$p[0]; } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf0()]); echo "\n";
var_export((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return $GLOBALS['nul'] ?? ["<{$arr['m']()}>", bf0()]; })()); echo "\n";
abstract class Y43 implements \Orig\Contract { const OB|T2|null FOREACH = null; const Thing = 'v'; public OB|T2|null $pp; }
var_export([(string) (new \ReflectionClassConstant(Y43::class, 'FOREACH'))->getType(), Y43::FOREACH, Y43::Thing, (string) (new \ReflectionProperty(Y43::class, 'pp'))->getType()]); echo "\n";
[$__a44, $__b44] = [KW0::{'eval'}, 1]; var_export($__a44); echo "\n";
var_export('Orig\Thing::who'()); echo "\n";
class R47 extends H0 { public $t; public function cb() { return $this->cb; } public function __construct() { $this->t = new \Orig\Thing; } public function r() { return [parent::C::X, ($this instanceof static)]; } }
var_export([(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return $nul?->n->self->self?->m()::who(...['q' => bmp0('S')]); } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf0()]); echo "\n";
var_export(ARRAY_MAP('strtoupper', ['ab'])); echo "\n";
$__o50 = new \ArrayObject([]); $__o50['k'] = property_exists($c, 'p'); var_export($__o50['k']); echo "\n";
function w51($q = 1) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; static $z = $arr['h']('ab'); return $z; }
var_export(w51()); echo "\n";
function w52($q = 1) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; static $z = KW0::{'eval'}; return $z; }
var_export(w52()); echo "\n";
