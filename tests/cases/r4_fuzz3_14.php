<?php
namespace NA;
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
function FOPEN(...$a) { return 'NA:fopen:' . \count($a); }
try { function CLASS_EXISTS(...$a) { return 'NA:class_exists:' . \json_encode($a); } } finally { }
{ $qq->self?->p::$p |> bmp0(...); } echo bf0(), "\n";
(function () { function ARRAY_REDUCE(...$a) { return 'NA:array_reduce:' . \json_encode($a); } })();
if (!$t) { } else { function defined(...$a) { return 'NA:defined:' . \json_encode($a); } }
(function () { function property_exists(...$a) { return 'NA:property_exists:' . \json_encode($a); } })();
var_export(iterator_to_array((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; yield from [[(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return $qq->self?->n?->n?->n->nn(bmp0('N2'))->m()::$mv(bmp0('V')); } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf0()]]; })())); echo "\n";
#[\Orig\Attr(v: \strtoupper(...))] function at9() {}
(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; var_export([(new \ReflectionFunction('NA\at9'))->getAttributes()[0]->getName(), ((new \ReflectionFunction('NA\at9'))->getAttributes()[0]->newInstance()->v)('ab')]); echo "\n"; })();
function file_get_contents(...$a) { return 'NA:file_get_contents:' . \count($a); }
(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; var_export($kw->function()); echo "\n"; })();
switch (1) { case 1: function strtoupper(...$a) { return 'NA:strtoupper:' . \count($a); } }
class D14 { public static function d() { function class_implements(...$a) { return 'NA:class_implements:' . \json_encode($a); } } }
D14::d();
(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; var_export(class_exists(\json_encode(array_map($vm, [1])))); echo "\n"; })();
function w16($q = 1) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; static $z = strtoupper(string: 'ab'); return $z; }
var_export(w16()); echo "\n";
$__o17 = new \ArrayObject([]); $__o17['k'] = $o->fn(list: fopen('x', 'r'), new: strtoupper('q')); var_export($__o17['k']); echo "\n";
var_export((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return $GLOBALS['nul'] ?? 'Orig\Thing'::who(); })()); echo "\n";
(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; for ($i19 = 0; $i19 < 1; $i19++) ['Orig\Thing', 'who']() |> bmp0(...); })(); echo bf0(), "\n";
try { throw new \Exception(json_encode(fopen(filename: 'php://memory', mode: 'r'))); } catch (\Exception $__e20) { var_export($__e20->getMessage()); echo "\n"; }
const K21 = static function () { return file_get_contents('data:,hi'); };
var_export((K21)()); echo "\n";
abstract class Y22 implements \Orig\Contract { const ?\PDO fopen = null; const Thing = 'v'; public ?\PDO $pp; }
var_export([(string) (new \ReflectionClassConstant(Y22::class, 'fopen'))->getType(), Y22::fopen, Y22::Thing, (string) (new \ReflectionProperty(Y22::class, 'pp'))->getType()]); echo "\n";
for ($__i23 = ["<{$arr['h']::who()}>", bf0()]; false;); var_export($__i23); echo "\n";
[$__a24, $__b24] = [\Closure::fromCallable($arr['sm'])('ab'), 1]; var_export($__a24); echo "\n";
class R25 { public $w; public $v { set($x) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; $this->w = fopen(filename: 'php://memory', mode: 'r'); } } }
$r25 = new R25; $r25->v = 1; var_export($r25->w); echo "\n";
class R26 { public $v { get { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return array_reduce(callback: $va, array: [1]); } } }
var_export((new R26)->v); echo "\n";
const K27 = static function () { return fopen('php://memory', 'r'); };
var_export((K27)()); echo "\n";
var_export((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return $GLOBALS['nul'] ?? array_map('strtoupper', ['ab']); })()); echo "\n";
match (1) { 1 => 1 }; (fc0())::who() |> bmp0(...); echo bf0(), "\n";
for ($__i30 = $fa($t, (true ? $c : 0)); false;); var_export($__i30); echo "\n";
var_export((fn() => class_implements($c))()); echo "\n";
print json_encode([(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return ($nul?->self->self?->self?->p)::who(...['q' => bmp0('S')]); } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf0()]) . "\n";
const K34 = static function () { return file_get_contents('data:,hi'); };
var_export((K34)()); echo "\n";
for ($i36 = 0; $i36 < 1; $i36++): var_export([(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return (new Q0)->nn(bmp0('N0'))?->p::$mv(bmp0('V')); } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf0()]); echo "\n"; endfor; ?>inline36
<?php
class R37 { public function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return [<<<EOT
<{$$nf('ab')}|{$qq->self::sf()}|{$kw->list()('f')}>
EOT, bf0()]; } }
var_export((new R37)->r()); echo "\n";
const K38 = static function () { return fopen('php://memory', 'r'); };
var_export((K38)()); echo "\n";
try { var_export([<<<EOT
<{$qq->cbm()('ab')}>
EOT, bf0()]); } catch (\Throwable $e) { echo get_class($e), ':', $e->getMessage(); } echo "\n";
const K40 = static function () { return file_get_contents('data:,hi'); };
var_export((K40)()); echo "\n";
for ($__i41 = ["<{$o->fn("{$c::who()}")}|{$c::who()}|{$qq->cbm()('ab')}>", bf0()]; false;); var_export($__i41); echo "\n";
var_export((new $$nb)->name()); echo "\n";
class R43 { public $v { get { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return file_get_contents(filename: 'data:,hi'); } } }
var_export((new R43)->v); echo "\n";
['k' => $__a44] = ['k' => (function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; ob_start('fopen'); echo 'ab'; ob_end_flush(); return ''; })()]; var_export($__a44); echo "\n";
