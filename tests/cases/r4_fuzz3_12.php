<?php
namespace NB;
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
function w1($q = 1) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; static $z = KW0::strtoupper('x'); return $z; }
var_export(w1()); echo "\n";
class R2 extends H0 { public $t; public function cb() { return $this->cb; } public function __construct() { $this->t = new \Orig\Thing; } public function r() { return [(new static::$spb)->name(), ($this->t instanceof (static::C))]; } }
(static function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; var_export((new R2)->r()); echo "\n"; })();
function FILE_GET_CONTENTS(...$a) { return 'NB:file_get_contents:' . \count($a); }
foreach ((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; yield [(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return $qq::$inst?->self->self?->self?->p::who(bmp0('W')); } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf0()]; })() as $__v) { var_export($__v); echo "\n"; }
(function () { function CLASS_IMPLEMENTS(...$a) { return 'NB:class_implements:' . \json_encode($a); } })();
trait TY8 { const OB|T2|null PRINT = null; const Thing = 'v'; public OB|T2|null $pp; } class Y8 { use TY8; }
var_export([(string) (new \ReflectionClassConstant(Y8::class, 'PRINT'))->getType(), Y8::PRINT, Y8::Thing, (string) (new \ReflectionProperty(Y8::class, 'pp'))->getType()]); echo "\n";
class R9 extends H0 { public $t; public function cb() { return $this->cb; } public function __construct() { $this->t = new \Orig\Thing; } public function r() { return [$this?->p::who(), ($this->t instanceof (static::C))]; } }
function w10($q = 1) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; static $z = (new R9)->r(); return $z; }
var_export(w10()); echo "\n";
if (!$t) { } else { function array_reduce(...$a) { return 'NB:array_reduce:' . \json_encode($a); } }
abstract class AR12 { abstract protected function z(); public function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return (strtoupper(...))(string: 'ab'); } } class R12 extends AR12 { protected function z() {} }
var_export((new R12)->r()); echo "\n";
var_export(new KW0()->eval('n')); echo "\n";
if ($t) { function fopen(...$a) { return 'NB:fopen:' . \count($a); } }
$__w15 = 0; while ($__w15++ < 1) { var_export(["<{$kw->list(...)()((string) json_encode([(new Q0)(bmp0('A')), bf0()]))}>", bf0()]); echo "\n"; }
foreach ((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; yield ["<{$vs('ab')}|{$kw->eval('e')}>", bf0()]; })() as $__v) { var_export($__v); echo "\n"; }
var_export(array_values([$arr['h']('ab')])[0]); echo "\n";
var_export([(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return $nul?->self->self?->nn(bmp0('N1'))?->nn(bmp0('N2'))->mm(bmp0('L3'))->p::who(bmp0('W')); } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf0()]); echo "\n";
class R21 { public string $v = 'x' { get => json_encode((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return [(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return fq0()?->self->self->self->mm(bmp0('L2'))->p::$mv(bmp0('V')); } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf0()]; })()) . $this->v; } }
var_export((new R21)->v); echo "\n";
$__w22 = 0; while ($__w22++ < 1) { var_export($c::$p); echo "\n"; }
foreach ([1] as $_) ($c)::{$mv}() |> bmp0(...); echo bf0(), "\n";
#[\Orig\Attr(static function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return [Q0::sf(...)()(bmp0('A')), bf0()]; })] class R24 {}
var_export(((new \ReflectionClass(R24::class))->getAttributes()[0]->newInstance()->v)()); echo "\n";
interface IR25 { const C = 1; public static function r(); } final class R25 implements IR25 { public static function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return is_callable($vlow); } }
var_export(R25::r()); echo "\n";
const K26 = static function () { return fopen('php://memory', 'r'); };
var_export((K26)()); echo "\n";
static fn() => 1; ($vf)(...)('ab') |> bmp0(...); echo bf0(), "\n";
switch (1): case 1: var_export((new \ReflectionMethod($arr['h']->self?->p, 'who'))->class); echo "\n"; break; endswitch;
class Y29 { const \Orig\Thing|null TA = null; const Thing = 'v'; public \Orig\Thing|null $pp; }
var_export([(string) (new \ReflectionClassConstant(Y29::class, 'TA'))->getType(), Y29::TA, Y29::Thing, (string) (new \ReflectionProperty(Y29::class, 'pp'))->getType()]); echo "\n";
$w30 = 1; while ($w30--) [$c][0]::who() |> bmp0(...); echo bf0(), "\n";
var_export(class_exists('Orig\Thing')); echo "\n";
function w32($q = 1) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; static $z = ($o instanceof ((clone $o)->p)); return $z; }
var_export(w32()); echo "\n";
do (clone $t)::who() |> bmp0(...); while (0); echo bf0(), "\n";
declare(ticks=1) $$nf('ab') |> bmp0(...); echo bf0(), "\n";
class Y35 { const null|\Orig\Contract PRINT = null; const Thing = 'v'; public null|\Orig\Contract $pp; }
var_export([(string) (new \ReflectionClassConstant(Y35::class, 'PRINT'))->getType(), Y35::PRINT, Y35::Thing, (string) (new \ReflectionProperty(Y35::class, 'pp'))->getType()]); echo "\n";
trait TT36 {} $qq->self?->p::$p |> bmp0(...); echo bf0(), "\n";
$__x38 = match (true) { ([(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return $qq->self?->n?->n?->nn(bmp0('N1'))->p::$p; } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf0()]) === 9 => 0, default => [(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return $qq->self?->n?->n?->nn(bmp0('N1'))->p::$p; } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf0()] }; var_export($__x38); echo "\n";
class R39 { public $w; public $v = 1 { set($x) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; $this->w = iterator_apply(new \ArrayIterator([1]), \Closure::fromCallable('strtoupper'), ['ab']); $this->v = $x; } } }
$r39 = new R39; $r39->v = 2; var_export($r39->w); echo "\n";
const K40 = static function () { return fopen('php://memory', 'r'); };
var_export((K40)()); echo "\n";
var_export((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return function () use ($c, $t) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return is_subclass_of($t, (match(1) { 1 => $c })); }; })()()); echo "\n";
