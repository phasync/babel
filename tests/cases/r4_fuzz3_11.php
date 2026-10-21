<?php
namespace NB {
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
(function () { function fopen(...$a) { return 'NB:fopen:' . \count($a); } })();
(function () { function class_implements(...$a) { return 'NB:class_implements:' . \json_encode($a); } })();
foreach ([1] as $_) new ($b)()->name() |> bmp0(...); echo bf0(), "\n";
(function () { function ARRAY_REDUCE(...$a) { return 'NB:array_reduce:' . \json_encode($a); } })();
$__w6 = 0; while ($__w6++ < 1) { var_export([(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return "<{$qq->self?->n?->self?->p::$mv(bmp0('V'))}>"; } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf0()]); echo "\n"; }
if (!$t) { } else { function array_map(...$a) { return 'NB:array_map:' . \json_encode($a); } }
(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; { [$c][0]::who() |> bmp0(...); } })(); echo bf0(), "\n";
function FILE_GET_CONTENTS(...$a) { return 'NB:file_get_contents:' . \count($a); }
class R10 extends H0 { public $t; public function cb() { return $this->cb; } public function __construct() { $this->t = new \Orig\Thing; } public function r() { return [self::C::who(), parent::C::X]; } }
class R11 { public function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return (new R10)->r(); } }
var_export((new R11)->r()); echo "\n";
if (!$t) { } else { function strtoupper(...$a) { return 'NB:strtoupper:' . \count($a); } }
switch (1) { case 1: function defined(...$a) { return 'NB:defined:' . \json_encode($a); } }
final class Y14 extends \Orig\Base { const (\Orig\Contract&\Countable)|null LIST = null; const Thing = 'v'; public (\Orig\Contract&\Countable)|null $pp; }
var_export([(string) (new \ReflectionClassConstant(Y14::class, 'LIST'))->getType(), Y14::LIST, Y14::Thing, (string) (new \ReflectionProperty(Y14::class, 'pp'))->getType()]); echo "\n";
var_export(iterator_to_array((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; yield from [["<{$o::C::who()}|{$vf('ab')}>", bf0()]]; })())); echo "\n";
(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; if (!$t) { } elseif ($t) ('str' . 'toupper')('ab') |> bmp0(...); })(); echo bf0(), "\n";
try { function property_exists(...$a) { return 'NB:property_exists:' . \json_encode($a); } } finally { }
if (!$t) { } elseif ($t) [$c][0]::who() |> bmp0(...); echo bf0(), "\n";
$__n20 = null; $__n20 ??= [(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return $nul?->self?->self?->m()::who(bmp0('W')); } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf0()]; var_export($__n20); echo "\n";
function &r22() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; static $s; $s = (new R21)->r(); return $s; }
var_export(r22()); echo "\n";
class R21 extends H0 { public $t; public function cb() { return $this->cb; } public function __construct() { $this->t = new \Orig\Thing; } public function r() { return [$this->cb(), "<{$this::$sp::who()}>"]; } }
(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; static fn() => 1; ($c)::$mv() |> bmp0(...); })(); echo bf0(), "\n";
static fn() => 1; new ($b)()->name() |> bmp0(...); echo bf0(), "\n";
#[\Orig\Attr] function at25() {} ['Orig\Thing', 'who']() |> bmp0(...); echo bf0(), "\n";
class Y26 { const ?Thing DEFAULT = null; const Thing = 'v'; public ?Thing $pp; }
var_export([(string) (new \ReflectionClassConstant(Y26::class, 'DEFAULT'))->getType(), Y26::DEFAULT, Y26::Thing, (string) (new \ReflectionProperty(Y26::class, 'pp'))->getType()]); echo "\n";
var_export(eval("return file_get_contents('data:,hi');")); echo "\n";
class R29 { public function m($f = static function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return (new R28)->r(); }) { return $f(); } }
var_export((new R29)->m()); echo "\n";
class R28 extends H0 { public $t; public function cb() { return $this->cb; } public function __construct() { $this->t = new \Orig\Thing; } public function r() { return [call_user_func(static::$sp . '::who'), self::C::who()]; } }
var_export((static fn() => (fn() => $gc()::{'X'})())()); echo "\n";
for ($i31 = 0; $i31 < 1; $i31++): var_export(KW0::require(1)); echo "\n"; endfor; ?>inline31
<?php
var_export((new \ReflectionMethod([$c][0], 'who'))->class); echo "\n";
var_export((new class((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return (new R33)->r(); })()) { public function __construct(public $v) {} })->v); echo "\n";
class R33 extends H0 { public $t; public function cb() { return $this->cb; } public function __construct() { $this->t = new \Orig\Thing; } public function r() { return [parent::C::X, new static()::C]; } }
class R35 extends H0 { public $t; public function cb() { return $this->cb; } public function __construct() { $this->t = new \Orig\Thing; } public function r() { return [new static()::C, static::C::$p]; } }
var_export((new R35)->r()); echo "\n";
abstract class Y37 implements \Orig\Contract { const ?Thing PRINT = null; const Thing = 'v'; public ?Thing $pp; }
var_export([(string) (new \ReflectionClassConstant(Y37::class, 'PRINT'))->getType(), Y37::PRINT, Y37::Thing, (string) (new \ReflectionProperty(Y37::class, 'pp'))->getType()]); echo "\n";
var_export(["<{$qq->self::sf()}>", bf0()]); echo "\n";
try { var_export($o->self::who()); } catch (\Throwable $e) { echo get_class($e), ':', $e->getMessage(); } echo "\n";
class Y40 { const \Orig\Thing|null FOREACH = null; const Thing = 'v'; public \Orig\Thing|null $pp; }
var_export([(string) (new \ReflectionClassConstant(Y40::class, 'FOREACH'))->getType(), Y40::FOREACH, Y40::Thing, (string) (new \ReflectionProperty(Y40::class, 'pp'))->getType()]); echo "\n";
enum R41 { case A; public function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return json_encode($nul ?? new ($tb)()->name()) . '|' . json_encode($t ? ["<{$GLOBALS['vf']((string) json_encode(H0::list(PDO: new \Orig\Base, OB: 1)))}>", bf0()] : 0); } }
var_export(R41::A->r()); echo "\n";
var_export((KW0::$eval)('ab')); echo "\n";
var_export([<<<EOT
<{$qq::sf()('ab')}>
EOT, bf0()]); echo "\n";
foreach ((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; yield KW0::new::who(); })() as $__v) { var_export($__v); echo "\n"; }
(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; if ($t) { } [$t, 'who']() |> bmp0(...); })(); echo bf0(), "\n";
}
namespace NA {
use Orig\Thing;
use Orig\Base as OB, Orig\Thing as T2;
class H1 {
    public $p = 'Orig\Thing'; public $pb = 'Orig\Base';
    public static $sp = 'Orig\Thing'; public static $spb = 'Orig\Base';
    const C = 'Orig\Thing'; const CB = 'Orig\Base';
    const string NEW = 'NEW'; const ?\Orig\Thing TT = null; const LIST = 'Orig\Thing';
    public ?H1 $n = null; public ?H1 $self = null; public $cb = 'Orig\Thing::who';
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
function fc1() { return 'Orig\Thing'; }
function fb1() { return 'Orig\Base'; }
function fcb1() { return 'Orig\Thing::who'; }
enum E1: string { case NEW = 'n'; case Default = 'd'; const Orig = 'Orig\Thing'; }
$c = 'Orig\Thing'; $cl = '\orig\THING'; $b = 'Orig\Base'; $o = new H1; $o->self = $o;
$arr = ['k' => 'Orig\Thing', 'b' => 'Orig\Base', 'f' => 'fopen', 's' => 'strtoupper', 'm' => ['Orig\Thing', 'who'], 'sm' => 'Orig\Thing::who', 'h' => $o];
$n = 'c'; $nb = 'b'; $nul = null; $t = new \Orig\Thing; $tb = new \Orig\Base; $mv = 'who';
$vf = 'fopen'; $vs = 'STRTOUPPER'; $vm = 'Orig\Thing::who'; $va = ['Orig\Thing', 'who']; $vo = [$t, 'who'];
$vcl = static fn(...$a) => 'cl'; $vfc = \strtoupper(...); $vlow = 'strtolower'; $gc = fn() => 'Orig\Thing'; $fa = \is_a(...); $hk = H1::class; $nn = 'n'; $kx = 'X'; $kc = 'C';
$vinc = function (&$x) { return ++$x; }; $vsort = 'sort'; $vref = function &() { static $s = [0]; return $s; };
class KW1 {
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
function bmp1($x) { $GLOBALS['blog'][] = $x; return $x; }
function bf1() { $r = \implode(',', $GLOBALS['blog'] ?? []); $GLOBALS['blog'] = []; return $r; }
class Q1 { public static ?Q1 $inst = null; public static ?Q1 $none = null; public static $fns = ['f' => 'fopen', 's' => 'Orig\Thing::who', 'a' => ['Orig\Thing', 'who']]; public $fnp = ['f' => 'strtoupper', 'm' => 'Orig\Thing::who']; public ?Q1 $self = null; public ?Q1 $n = null; public $p = 'Orig\Thing'; public $cb = 'Orig\Thing::who'; public function __construct() { $this->self = $this; } public function mm($x) { return $this; } public function nn($x) { return null; } public function cbm() { return 'fopen'; } public static function sf() { return 'strtoupper'; } public function m() { return 'Orig\Thing'; } public function __invoke($x = 0) { return 'qinv'; } }
function fq1() { return $GLOBALS['qq']; }
$qq = new Q1; $qq->self = $qq; Q1::$inst = $qq; $kw = new KW1; $nf = 'vf'; $qk = Q1::class;
switch (1) { case 1: function class_implements(...$a) { return 'NA:class_implements:' . \json_encode($a); } }
abstract class AB47 { abstract function f(); } ($arr['m'])() |> bmp1(...); echo bf1(), "\n";
(function () { function fopen(...$a) { return 'NA:fopen:' . \count($a); } })();
(function () { function ARRAY_MAP(...$a) { return 'NA:array_map:' . \json_encode($a); } })();
switch (1) { case 1: function defined(...$a) { return 'NA:defined:' . \json_encode($a); } }
$xx51 = function () { }; "Orig\\Thing"::who() |> bmp1(...); echo bf1(), "\n";
echo json_encode(is_callable(\Closure::fromCallable('strtoupper'))), "\n";
function d53() { function STRTOUPPER(...$a) { return 'NA:strtoupper:' . \count($a); } }
d53();
#[\Orig\Attr] function at54() {} (fn() => $c)()::who() |> bmp1(...); echo bf1(), "\n";
var_export(match (true) { default => [(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return ($qq->nn(1)?->self?->p)::$p; } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf1()] }); echo "\n";
if (!$t) { } else { function property_exists(...$a) { return 'NA:property_exists:' . \json_encode($a); } }
trait TY58 { const ?\PDO DEFAULT = null; const Thing = 'v'; public ?\PDO $pp; } class Y58 { use TY58; }
var_export([(string) (new \ReflectionClassConstant(Y58::class, 'DEFAULT'))->getType(), Y58::DEFAULT, Y58::Thing, (string) (new \ReflectionProperty(Y58::class, 'pp'))->getType()]); echo "\n";
$__o60 = new \ArrayObject([]); $__o60['k'] = [(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return $qq->nn(1)?->nn(bmp1('N0'))?->m()::$p[0]; } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf1()]; var_export($__o60['k']); echo "\n";
class R61 { public $w; public $v = 1 { set($x) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; $this->w = array_all(['ab'], $va); $this->v = $x; } } }
$r61 = new R61; $r61->v = 2; var_export($r61->w); echo "\n";
var_export(["<{$vs('ab')}|{$vs('ab')}>", bf1()]); echo "\n";
$__n63 = null; $__n63 ??= $kw->clone(); var_export($__n63); echo "\n";
const K64 = static function () { return file_get_contents('data:,hi'); };
var_export((K64)()); echo "\n";
(static function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; var_export(["<$c|{$qq->m()::who()}>", bf1()]); echo "\n"; })();
class R66 { public $w; public $v { set($x) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; $this->w = $kw->eval(...)('fcc'); } } }
$r66 = new R66; $r66->v = 1; var_export($r66->w); echo "\n";
(static function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; var_export(class_implements('Orig\Thing')); echo "\n"; })();
function w68() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; var_export($kw->{'eval'}('d')); echo "\n"; }
w68();
?><?= json_encode([$qq->self?->self->fnp['f']((string) json_encode((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; $x = 1; $vinc($x); $a2 = [3, 1, 2]; $vsort($a2); $r = &$vref(); $r[] = 1; $y = 5; call_user_func_array($vinc, [&$y]); $q = ['i' => $vinc]; $q['i']($y); $ga = fn() => func_get_args(); return [$x, $a2, $y, $ga(1, 2), $vinc(...)($x), $x]; })())), bf1()]) ?>

<?php
class Y70 { const null|\Orig\Contract LIST = null; const Thing = 'v'; public null|\Orig\Contract $pp; }
var_export([(string) (new \ReflectionClassConstant(Y70::class, 'LIST'))->getType(), Y70::LIST, Y70::Thing, (string) (new \ReflectionProperty(Y70::class, 'pp'))->getType()]); echo "\n";
var_export([(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return $qq->n?->nn(bmp1('N0'))->nn(bmp1('N1'))?->n?->self?->p::$p[0]; } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf1()]); echo "\n";
$__o74 = new \ArrayObject([]); $__o74['k'] = (new R73)->r(); var_export($__o74['k']); echo "\n";
class R73 extends H1 { public $t; public function cb() { return $this->cb; } public function __construct() { $this->t = new \Orig\Thing; } public function r() { return [parent::C::X, call_user_func([self::C, 'who'])]; } }
function w75($q = 1) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; static $z = $o->fn(new: Thing::class, class: \Orig\Base::class); return $z; }
var_export(w75()); echo "\n";
var_export(${'c'}::who()); echo "\n";
(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; var_export([class_exists(\json_encode(array_reduce(callback: $va, array: [1]))), 'z' => PROPERTY_EXISTS($c, 'p')]); echo "\n"; })();
var_export($cl::who()); echo "\n";
trait TR80 { public static function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return [(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return $qq::$inst?->self->self->self?->m()::$p; } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf1()]; } } class R80 { use TR80; }
var_export(R80::r()); echo "\n";
try { var_export(["<{$qq->self::sf()}|{$qq?->p::who(bmp1('J'))}|{$qq->fnp['m']()}>", bf1()]); } catch (\Throwable $e) { echo get_class($e), ':', $e->getMessage(); } echo "\n";
abstract class Y82 implements \Orig\Contract { const (\Orig\Contract&\Countable)|null FOREACH = null; const Thing = 'v'; public (\Orig\Contract&\Countable)|null $pp; }
var_export([(string) (new \ReflectionClassConstant(Y82::class, 'FOREACH'))->getType(), Y82::FOREACH, Y82::Thing, (string) (new \ReflectionProperty(Y82::class, 'pp'))->getType()]); echo "\n";
abstract class AR84 { abstract protected function z(); public function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return (new R83)->r(); } } class R84 extends AR84 { protected function z() {} }
var_export((new R84)->r()); echo "\n";
class R83 extends H1 { public $t; public function cb() { return $this->cb; } public function __construct() { $this->t = new \Orig\Thing; } public function r() { return [$this->cb(), self::C::who()]; } }
$yy85 = [1]; ['Orig\Thing', 'who']() |> bmp1(...); echo bf1(), "\n";
foreach ((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; yield $o->self::$sp::$mv(); })() as $__v) { var_export($__v); echo "\n"; }
class R87 extends H1 { public $t; public function cb() { return $this->cb; } public function __construct() { $this->t = new \Orig\Thing; } public function r() { return ["<{$this::$sp::who()}>", (new parent::$spb())->name()]; } }
class R88 { public $w; public $v { set($x) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; $this->w = (new R87)->r(); } } }
$r88 = new R88; $r88->v = 1; var_export($r88->w); echo "\n";
}
namespace {
use Orig\Thing;
use Orig\Base as OB, Orig\Thing as T2;
class H2 {
    public $p = 'Orig\Thing'; public $pb = 'Orig\Base';
    public static $sp = 'Orig\Thing'; public static $spb = 'Orig\Base';
    const C = 'Orig\Thing'; const CB = 'Orig\Base';
    const string NEW = 'NEW'; const ?\Orig\Thing TT = null; const LIST = 'Orig\Thing';
    public ?H2 $n = null; public ?H2 $self = null; public $cb = 'Orig\Thing::who';
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
function fc2() { return 'Orig\Thing'; }
function fb2() { return 'Orig\Base'; }
function fcb2() { return 'Orig\Thing::who'; }
enum E2: string { case NEW = 'n'; case Default = 'd'; const Orig = 'Orig\Thing'; }
$c = 'Orig\Thing'; $cl = '\orig\THING'; $b = 'Orig\Base'; $o = new H2; $o->self = $o;
$arr = ['k' => 'Orig\Thing', 'b' => 'Orig\Base', 'f' => 'fopen', 's' => 'strtoupper', 'm' => ['Orig\Thing', 'who'], 'sm' => 'Orig\Thing::who', 'h' => $o];
$n = 'c'; $nb = 'b'; $nul = null; $t = new \Orig\Thing; $tb = new \Orig\Base; $mv = 'who';
$vf = 'fopen'; $vs = 'STRTOUPPER'; $vm = 'Orig\Thing::who'; $va = ['Orig\Thing', 'who']; $vo = [$t, 'who'];
$vcl = static fn(...$a) => 'cl'; $vfc = \strtoupper(...); $vlow = 'strtolower'; $gc = fn() => 'Orig\Thing'; $fa = \is_a(...); $hk = H2::class; $nn = 'n'; $kx = 'X'; $kc = 'C';
$vinc = function (&$x) { return ++$x; }; $vsort = 'sort'; $vref = function &() { static $s = [0]; return $s; };
class KW2 {
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
function bmp2($x) { $GLOBALS['blog'][] = $x; return $x; }
function bf2() { $r = \implode(',', $GLOBALS['blog'] ?? []); $GLOBALS['blog'] = []; return $r; }
class Q2 { public static ?Q2 $inst = null; public static ?Q2 $none = null; public static $fns = ['f' => 'fopen', 's' => 'Orig\Thing::who', 'a' => ['Orig\Thing', 'who']]; public $fnp = ['f' => 'strtoupper', 'm' => 'Orig\Thing::who']; public ?Q2 $self = null; public ?Q2 $n = null; public $p = 'Orig\Thing'; public $cb = 'Orig\Thing::who'; public function __construct() { $this->self = $this; } public function mm($x) { return $this; } public function nn($x) { return null; } public function cbm() { return 'fopen'; } public static function sf() { return 'strtoupper'; } public function m() { return 'Orig\Thing'; } public function __invoke($x = 0) { return 'qinv'; } }
function fq2() { return $GLOBALS['qq']; }
$qq = new Q2; $qq->self = $qq; Q2::$inst = $qq; $kw = new KW2; $nf = 'vf'; $qk = Q2::class;
interface II89 {} ($c)::{$mv}() |> bmp2(...); echo bf2(), "\n";
function w90() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; var_export(E2::Default->name); echo "\n"; }
w90();
class R91 { public static function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return fopen(filename: 'php://memory', mode: 'r'); } }
var_export(R91::r()); echo "\n";
var_export(iterator_to_array((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; yield from [call_user_func('file_get_contents', 'data:,hi')]; })())); echo "\n";
class R93 { public $v { get { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return call_user_func('fopen', 'php://memory', 'r'); } } }
var_export((new R93)->v); echo "\n";
switch (true) { case ($__s94 = KW2::{'eval'}) !== 7: var_export($__s94); echo "\n"; }
(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; if ($t) [$c][0]::who() |> bmp2(...); })(); echo bf2(), "\n";
enum R96 { case A; public function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return new \Orig\Base()->name(); } }
var_export(R96::A->r()); echo "\n";
class R97 { public string $v = 'x' { get => json_encode((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; return KW2::isset(); })()) . $this->v; } }
var_export((new R97)->v); echo "\n";
class R98 extends H2 { public $t; public function cb() { return $this->cb; } public function __construct() { $this->t = new \Orig\Thing; } public function r() { return [static::C::$p, (new parent::$spb())->name()]; } }
switch (1): case 1: var_export([<<<EOT
<{$qq->self?->self->fnp['f']((string) json_encode((new R98)->r()))}> {$c}
EOT, bf2()]); echo "\n"; break; endswitch;
if ($t): var_export([(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return Q2::$none?->self?->p::who(...['q' => bmp2('S')]); } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf2()]); echo "\n"; endif;
interface II103 {} new ($b)()->name() |> bmp2(...); echo bf2(), "\n";
static fn() => 1; "{$vf}"('ab') |> bmp2(...); echo bf2(), "\n";
var_export(match (true) { default => class_exists(\json_encode(array_reduce(['ab'], 'strtoupper'))) }); echo "\n";
var_export((fn() => H2::LIST::$p)()); echo "\n";
var_export($kw->clone()); echo "\n";
function w108($q = 1) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; static $z = is_a(object_or_class: $t, class: $o->{'p'}); return $z; }
var_export(w108()); echo "\n";
trait TY109 { const ?\PDO NEW = null; const Thing = 'v'; public ?\PDO $pp; } class Y109 { use TY109; }
var_export([(string) (new \ReflectionClassConstant(Y109::class, 'NEW'))->getType(), Y109::NEW, Y109::Thing, (string) (new \ReflectionProperty(Y109::class, 'pp'))->getType()]); echo "\n";
try { } catch (\Exception $e) { } new ($b)()->name() |> bmp2(...); echo bf2(), "\n";
switch (true) { case ($__s112 = (new R111)->r()) !== 7: var_export($__s112); echo "\n"; }
class R111 extends H2 { public $t; public function cb() { return $this->cb; } public function __construct() { $this->t = new \Orig\Thing; } public function r() { return [self::C::who(), $this->cb()]; } }
function w114($q = 1) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; static $z = [(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk, $qq, $kw, $nf, $qk; try { return $qq->nn(1)?->nn(bmp2('N0'))->p::who(...['q' => bmp2('S')]); } catch (\Throwable $e) { return \get_class($e) . ':' . $e->getMessage(); } })(), bf2()]; return $z; }
var_export(w114()); echo "\n";
var_export([class_exists(\json_encode(property_exists($c, 'p'))), 'z' => $nul?->p::$p]); echo "\n";
if (!$t) { } else ('str' . 'toupper')('ab') |> bmp2(...); echo bf2(), "\n";
$yy117 = [1]; new ($b)()->name() |> bmp2(...); echo bf2(), "\n";
function &r118() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; static $s; $s = (new \Orig\Thing)::class; return $s; }
var_export(r118()); echo "\n";
?><?= json_encode(($t instanceof (H2::C))) ?>

<?php
#[\Orig\Attr(v: \strtoupper(...))] function at120() {}
(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref, $kx, $kc, $qq, $kw, $nf, $qk; var_export([(new \ReflectionFunction('at120'))->getAttributes()[0]->getName(), ((new \ReflectionFunction('at120'))->getAttributes()[0]->newInstance()->v)('ab')]); echo "\n"; })();
}
