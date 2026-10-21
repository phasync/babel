<?php
// Differential fuzz regression (r3fuzz gen3 seed 81): dynamic classes, callables, namespace fallback, hooks, typed constants.
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
$vcl = static fn(...$a) => 'cl'; $vfc = \strtoupper(...); $vlow = 'strtolower'; $gc = fn() => 'Orig\Thing'; $fa = \is_a(...); $hk = H0::class; $nn = 'n';
$vinc = function (&$x) { return ++$x; }; $vsort = 'sort'; $vref = function &() { static $s = [0]; return $s; };
if ($t) { function strtoupper(...$a) { return 'NB:strtoupper:' . \count($a); } }
var_export(('FOPEN')('x', 'r')); echo "\n";
var_export((fn() => $arr['h']::C::who())()); echo "\n";
function d4() { function file_get_contents(...$a) { return 'NB:file_get_contents:' . \count($a); } }
d4();
trait TY5 { const null|\Orig\Contract Thing = null; const T2 = 'v'; public null|\Orig\Contract $pp; } class Y5 { use TY5; }
var_export([(string) (new \ReflectionClassConstant(Y5::class, 'Thing'))->getType(), Y5::Thing, Y5::T2, (string) (new \ReflectionProperty(Y5::class, 'pp'))->getType()]); echo "\n";
var_export(namespace\file_get_contents(filename: 'data:,hi')); echo "\n";
var_export((fn() => (function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; $x = 1; $vinc($x); $a2 = [3, 1, 2]; $vsort($a2); $r = &$vref(); $r[] = 1; $y = 5; call_user_func_array($vinc, [&$y]); $q = ['i' => $vinc]; $q['i']($y); $ga = fn() => func_get_args(); return [$x, $a2, $y, $ga(1, 2), $vinc(...)($x), $x]; })())()); echo "\n";
(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; var_export((new $arr['h']->pb)->name()); echo "\n"; })();
class R9 { public function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; return ('FOPEN')('x', 'r'); } }
var_export((new R9)->r()); echo "\n";
function d10() { function FOPEN(...$a) { return 'NB:fopen:' . \count($a); } }
d10();
class R11 { public $w; public $v { set($x) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; $this->w = $o->self::$sp::$mv(); } } }
$r11 = new R11; $r11->v = 1; var_export($r11->w); echo "\n";
function w12() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; var_export(array_find_key(['ab'], $arr['m'])); echo "\n"; }
w12();
var_export((fn() => "<{$o->self->p::who()}>")()); echo "\n";
}
namespace NC {
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
$vcl = static fn(...$a) => 'cl'; $vfc = \strtoupper(...); $vlow = 'strtolower'; $gc = fn() => 'Orig\Thing'; $fa = \is_a(...); $hk = H1::class; $nn = 'n';
$vinc = function (&$x) { return ++$x; }; $vsort = 'sort'; $vref = function &() { static $s = [0]; return $s; };
if ($t) { function file_get_contents(...$a) { return 'NC:file_get_contents:' . \count($a); } }
final class Y15 extends \Orig\Base { const ?\PDO Thing = null; const T2 = 'v'; public ?\PDO $pp; }
var_export([(string) (new \ReflectionClassConstant(Y15::class, 'Thing'))->getType(), Y15::Thing, Y15::T2, (string) (new \ReflectionProperty(Y15::class, 'pp'))->getType()]); echo "\n";
class R16 { public function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; return H1::list(fopen: 1, Thing: 2, strtoupper: 3); } }
var_export((new R16)->r()); echo "\n";
function d17() { function strtoupper(...$a) { return 'NC:strtoupper:' . \count($a); } }
d17();
class R18 extends H1 { public $t; public function cb() { return $this->cb; } public function __construct() { $this->t = new \Orig\Thing; } public function r() { return [static::$sp::who(), call_user_func([self::C, 'who'])]; } }
function w19() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; var_export((new R18)->r()); echo "\n"; }
w19();
#[\Orig\Attr(v: \strtoupper(...))] function at20() {}
function w21($q = 1) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; static $z = [(new \ReflectionFunction('NC\at20'))->getAttributes()[0]->getName(), ((new \ReflectionFunction('NC\at20'))->getAttributes()[0]->newInstance()->v)('ab')]; return $z; }
var_export(w21()); echo "\n";
eval('namespace NC; function fopen(...$a) { return \'NC:fopen:\' . \count($a); }');
#[\Orig\Attr(v: \strtoupper(...))] function at23() {}
class R24 { public function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; return [(new \ReflectionFunction('NC\at23'))->getAttributes()[0]->getName(), ((new \ReflectionFunction('NC\at23'))->getAttributes()[0]->newInstance()->v)('ab')]; } }
var_export((new R24)->r()); echo "\n";
function w25() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; var_export(\strtoupper('ab')); echo "\n"; }
w25();
function w26() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; var_export($vo('ab')); echo "\n"; }
w26();
var_export(match (true) { default => $arr['f'](...['ab']) }); echo "\n";
#[\Orig\Attr(v: \strtoupper(...))] function at28() {}
var_export([(new \ReflectionFunction('NC\at28'))->getAttributes()[0]->getName(), ((new \ReflectionFunction('NC\at28'))->getAttributes()[0]->newInstance()->v)('ab')]); echo "\n";
class R30 { public function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; return (new (${'b'}))->name(); } }
var_export((new R30)->r()); echo "\n";
class R31 { public $w; public $v { set($x) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; $this->w = is_a(class: ${'c'}, object_or_class: $t); } } }
$r31 = new R31; $r31->v = 1; var_export($r31->w); echo "\n";
function w32() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; var_export("Orig\\Thing"::$p); echo "\n"; }
w32();
class R33 extends H1 { public $t; public function cb() { return $this->cb; } public function __construct() { $this->t = new \Orig\Thing; } public function r() { return [(static fn() => self::$sp::who())(), ($this->t instanceof (static::C))]; } }
var_export((new R33)->r()); echo "\n";
}
namespace NC {
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
$vcl = static fn(...$a) => 'cl'; $vfc = \strtoupper(...); $vlow = 'strtolower'; $gc = fn() => 'Orig\Thing'; $fa = \is_a(...); $hk = H2::class; $nn = 'n';
$vinc = function (&$x) { return ++$x; }; $vsort = 'sort'; $vref = function &() { static $s = [0]; return $s; };
abstract class Y35 implements \Orig\Contract { const ?Thing TA = null; const Thing = 'v'; public ?Thing $pp; }
var_export([(string) (new \ReflectionClassConstant(Y35::class, 'TA'))->getType(), Y35::TA, Y35::Thing, (string) (new \ReflectionProperty(Y35::class, 'pp'))->getType()]); echo "\n";
function w36($q = 1) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; static $z = array_any(['ab'], $o->cb); return $z; }
var_export(w36()); echo "\n";
final class Y37 extends \Orig\Base { const ?OB TA = null; const Thing = 'v'; public ?OB $pp; }
var_export([(string) (new \ReflectionClassConstant(Y37::class, 'TA'))->getType(), Y37::TA, Y37::Thing, (string) (new \ReflectionProperty(Y37::class, 'pp'))->getType()]); echo "\n";
var_export('Orig\Thing::who'()); echo "\n";
#[\Orig\Attr(v: \strtoupper(...))] function at39() {}
(static function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; var_export($arr['sm'](...['ab'])); echo "\n"; })();
class R41 { public static function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; return (new H2::$spb)->name(); } }
var_export(R41::r()); echo "\n";
function w42($q = 1) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; static $z = (file_get_contents(...))('data:,hi'); return $z; }
var_export(w42()); echo "\n";
class R43 { public $w; public $v { set($x) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; $this->w = E2::Default->name; } } }
$r43 = new R43; $r43->v = 1; var_export($r43->w); echo "\n";
try { var_export(array_find(['ab'], 'fopen')); } catch (\Throwable $e) { echo get_class($e), ':', $e->getMessage(); } echo "\n";
try { var_export($o->arrp['k']::$mv()); } catch (\Throwable $e) { echo get_class($e), ':', $e->getMessage(); } echo "\n";
class R46 { public $w; public $v { set($x) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; $this->w = (function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; $x = 1; $vinc($x); $a2 = [3, 1, 2]; $vsort($a2); $r = &$vref(); $r[] = 1; $y = 5; call_user_func_array($vinc, [&$y]); $q = ['i' => $vinc]; $q['i']($y); $ga = fn() => func_get_args(); return [$x, $a2, $y, $ga(1, 2), $vinc(...)($x), $x]; })(); } } }
$r46 = new R46; $r46->v = 1; var_export($r46->w); echo "\n";
class R47 extends H2 { public $t; public function cb() { return $this->cb; } public function __construct() { $this->t = new \Orig\Thing; } public function r() { return [(new (static::CB)())->name(), parent::C::X]; } }
class R48 { public $v { get => (new R47)->r(); } }
var_export((new R48)->v); echo "\n";
(function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; var_export((new $tb())->name()); echo "\n"; })();
var_export($o->n?->p::who()); echo "\n";
var_export($vfc('ab')); echo "\n";
class R52 { public function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; return "<{$$$nn::$mv()}>"; } }
var_export((new R52)->r()); echo "\n";
#[\Orig\Attr(v: \strtoupper(...))] function at53() {}
function w54() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; var_export([(new \ReflectionFunction('NC\at53'))->getAttributes()[0]->getName(), ((new \ReflectionFunction('NC\at53'))->getAttributes()[0]->newInstance()->v)('ab')]); echo "\n"; }
w54();
}
namespace NA {
use Orig\Thing;
use Orig\Base as OB, Orig\Thing as T2;
class H3 {
    public $p = 'Orig\Thing'; public $pb = 'Orig\Base';
    public static $sp = 'Orig\Thing'; public static $spb = 'Orig\Base';
    const C = 'Orig\Thing'; const CB = 'Orig\Base';
    const string NEW = 'NEW'; const ?\Orig\Thing TT = null; const LIST = 'Orig\Thing';
    public ?H3 $n = null; public ?H3 $self = null; public $cb = 'Orig\Thing::who';
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
function fc3() { return 'Orig\Thing'; }
function fb3() { return 'Orig\Base'; }
function fcb3() { return 'Orig\Thing::who'; }
enum E3: string { case NEW = 'n'; case Default = 'd'; const Orig = 'Orig\Thing'; }
$c = 'Orig\Thing'; $cl = '\orig\THING'; $b = 'Orig\Base'; $o = new H3; $o->self = $o;
$arr = ['k' => 'Orig\Thing', 'b' => 'Orig\Base', 'f' => 'fopen', 's' => 'strtoupper', 'm' => ['Orig\Thing', 'who'], 'sm' => 'Orig\Thing::who', 'h' => $o];
$n = 'c'; $nb = 'b'; $nul = null; $t = new \Orig\Thing; $tb = new \Orig\Base; $mv = 'who';
$vf = 'fopen'; $vs = 'STRTOUPPER'; $vm = 'Orig\Thing::who'; $va = ['Orig\Thing', 'who']; $vo = [$t, 'who'];
$vcl = static fn(...$a) => 'cl'; $vfc = \strtoupper(...); $vlow = 'strtolower'; $gc = fn() => 'Orig\Thing'; $fa = \is_a(...); $hk = H3::class; $nn = 'n';
$vinc = function (&$x) { return ++$x; }; $vsort = 'sort'; $vref = function &() { static $s = [0]; return $s; };
#[\Orig\Attr(v: \strtoupper(...))] function at55() {}
foreach ((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; yield [(new \ReflectionFunction('NA\at55'))->getAttributes()[0]->getName(), ((new \ReflectionFunction('NA\at55'))->getAttributes()[0]->newInstance()->v)('ab')]; })() as $__v) { var_export($__v); echo "\n"; }
if ($t) { function FOPEN(...$a) { return 'NA:fopen:' . \count($a); } }
class R58 { public $w; public $v { set($x) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; $this->w = is_a(object_or_class: $t, class: $o::C); } } }
$r58 = new R58; $r58->v = 1; var_export($r58->w); echo "\n";
if ($t) { function FILE_GET_CONTENTS(...$a) { return 'NA:file_get_contents:' . \count($a); } }
var_export(($t instanceof ($o?->arrp['k']))); echo "\n";
function d61() { function STRTOUPPER(...$a) { return 'NA:strtoupper:' . \count($a); } }
d61();
function w62() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; var_export(H3::list(fopen: 1, Thing: 2, strtoupper: 3)); echo "\n"; }
w62();
class R63 { public static function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; return "<{$arr['f']('ab')}>"; } }
var_export(R63::r()); echo "\n";
class R64 extends H3 { public $t; public function cb() { return $this->cb; } public function __construct() { $this->t = new \Orig\Thing; } public function r() { return [$this?->p::who(), call_user_func([$this, 'm'])]; } }
class R65 { public $w; public $v { set($x) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; $this->w = (new R64)->r(); } } }
$r65 = new R65; $r65->v = 1; var_export($r65->w); echo "\n";
function w66($q = 1) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; static $z = ($o->p ?? 'x')::$mv(); return $z; }
var_export(w66()); echo "\n";
class R67 { public static function r() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; return eval("namespace NA; return strtoupper('ab');"); } }
var_export(R67::r()); echo "\n";
foreach ((function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; yield preg_replace_callback('/a/', $c . '::who', 'ab'); })() as $__v) { var_export($__v); echo "\n"; }
var_export(match (true) { default => is_callable('fopen', true) }); echo "\n";
function w70() { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; var_export(\strtoupper(string: 'ab')); echo "\n"; }
w70();
class R71 { public $w; public $v { set($x) { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; $this->w = \file_get_contents('data:,hi'); } } }
$r71 = new R71; $r71->v = 1; var_export($r71->w); echo "\n";
var_export((fn() => (function () { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; $w = ['ab']; array_walk_recursive(array: $w, callback: $arr['m']); return $w; })())()); echo "\n";
}
