<?php
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
function w1() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; var_export([${'v' . 'f'}(...['ab']), bf0()]); echo "\n"; }
w1();
function zz2() {} $$nf('ab') |> bmp0(...); echo bf0(), "\n";
(static function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; var_export(json_encode($nul ?? "<{$vf('ab')}>") . '|' . json_encode($t ? [Q0::sf()(...['ab']), bf0()] : 0)); echo "\n"; })();
print json_encode([(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return fq0()?->p::$p; } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf0()]) . "\n";
abstract class Y6 implements \Orig\Contract { const ?OB Thing = null; const T2 = 'v'; public ?OB $pp; }
var_export([(string) (new \ReflectionClassConstant(Y6::class, 'Thing'))->getType(), Y6::Thing, Y6::T2, (string) (new \ReflectionProperty(Y6::class, 'pp'))->getType()]); echo "\n";
switch (true) { case ($__s7 = CLASS_IMPLEMENTS($c)) !== 7: var_export($__s7); echo "\n"; }
function w8() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; var_export(["<{$o::C::who()}|{$qq->cbm()('ab')}|{$nul?->p::who(bmp0('I'))}>", bf0()]); echo "\n"; }
w8();
static fn() => 1; ($c)::{$mv}() |> bmp0(...); echo bf0(), "\n";
(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; L10: (new ($b))->name() |> bmp0(...); })(); echo bf0(), "\n";
var_export(array_values([($o instanceof ($o::{'C'}))])[0]); echo "\n";
function w13($q = 1) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; static $z = [(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return $GLOBALS['qq']?->self?->nn(bmp0('N1'))?->nn(bmp0('N2'))?->m()::$p; } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf0()]; return $z; }
var_export(w13()); echo "\n";
trait TY14 { const T2|string|null FOREACH = null; const Thing = 'v'; public T2|string|null $pp; } class Y14 { use TY14; }
var_export([(string) (new \ReflectionClassConstant(Y14::class, 'FOREACH'))->getType(), Y14::FOREACH, Y14::Thing, (string) (new \ReflectionProperty(Y14::class, 'pp'))->getType()]); echo "\n";
try { } finally { } array('Orig\Thing', 'who')() |> bmp0(...); echo bf0(), "\n";
class Y16 { const \Orig\Thing|null FOREACH = null; const Thing = 'v'; public \Orig\Thing|null $pp; }
var_export([(string) (new \ReflectionClassConstant(Y16::class, 'FOREACH'))->getType(), Y16::FOREACH, Y16::Thing, (string) (new \ReflectionProperty(Y16::class, 'pp'))->getType()]); echo "\n";
function &r17() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; static $s; $s = file_get_contents('data:,hi'); return $s; }
var_export(r17()); echo "\n";
(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; if (!$t) { } elseif ($t) ($o)('x') |> bmp0(...); })(); echo bf0(), "\n";
switch (true) { case ($__s19 = file_get_contents('data:,hi')) !== 7: var_export($__s19); echo "\n"; }
$__w20 = 0; while ($__w20++ < 1) { var_export(get_class_vars(H0::{'LI' . 'ST'})); echo "\n"; }
var_export((new (${'b'}))->name()); echo "\n";
abstract class AB22 { abstract function f(); } (fn() => $c)()::who() |> bmp0(...); echo bf0(), "\n";
if ($t): var_export([(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return $qq?->self->self?->nn(bmp0('N1'))?->nn(bmp0('N2'))->p::$p[0]; } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf0()]); echo "\n"; endif;
if ($t) if ($t) ($c)::$p |> bmp0(...); else ; echo bf0(), "\n";
switch (1) { case 1: (fn() => $c)()::who() |> bmp0(...); } echo bf0(), "\n";
switch (1): case 1: var_export(array_reduce([1], 'json_encode', defined('Orig\Thing::X'))); echo "\n"; break; endswitch;
var_export(match (true) { default => H0::list(PDO: new \Orig\Base, OB: 1) }); echo "\n";
for ($i29 = 0; $i29 < 1; $i29++): var_export((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; $w = ['ab']; array_walk_recursive(array: $w, callback: 'Orig\Thing' . '::who'); return $w; })()); echo "\n"; endfor; ?>inline29
<?php
foreach ([[(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return ($qq->self->self?->mm(bmp0('L1'))->p)::$p; } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf0()]] as $__k31 => $__v31) var_export($__v31); echo "\n";
abstract class Y32 implements \Orig\Contract { const ?\PDO PRINT = null; const Thing = 'v'; public ?\PDO $pp; }
var_export([(string) (new \ReflectionClassConstant(Y32::class, 'PRINT'))->getType(), Y32::PRINT, Y32::Thing, (string) (new \ReflectionProperty(Y32::class, 'pp'))->getType()]); echo "\n";
(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; var_export((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; spl_autoload_register('strtoupper'); $l = spl_autoload_functions(); $r = end($l); spl_autoload_unregister($r); return $r instanceof \Closure ? 'closure' : $r; })()); echo "\n"; })();
#[\Orig\Attr(v: strtoupper(...))] function at34() {}
var_export([(new \ReflectionFunction('at34'))->getAttributes()[0]->getName(), ((new \ReflectionFunction('at34'))->getAttributes()[0]->newInstance()->v)('ab')]); echo "\n";
