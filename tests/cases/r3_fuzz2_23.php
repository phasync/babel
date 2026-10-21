<?php
// Differential fuzz regression (r3fuzz gen3 seed 79): dynamic classes, callables, namespace fallback, hooks, typed constants.
namespace NA\Sub {
use Orig\Thing;
use #c
Orig\Base  as OB, Orig\Thing as T2;
class H0 {
    public //c
$p = 'Orig\Thing'; public $pb =
	 'Orig\Base';
    public static $sp = 'Orig\Thing'; public static $spb = 'Orig\Base';
    const C = 'Orig\Thing'/*n*/; //c
const CB =
	 'Orig\Base';
    const string NEW = 'NEW'; const ?\Orig\Thing TT = null ;  const LIST =
 'Orig\Thing';
    public #c
?H0 $n  = null; public ?H0 $self = null ; public $cb = 'Orig\Thing::who';
    public function m( /** d */ ) { #c
return 'Orig\Thing'; }
    public static function default()  /** d */ { return  'Orig\Thing';//c
 }
    public function
	 new() { return 'new'; }
    public static function list(...$a) { return 'list:' . //c
\implode(',', \array_keys(
	$a));
	 } /** d */ 
    public function fn($new = 1//c
, $class = 2,/*n*/ $static = #c
3, $list 
= 4//c
, $array =/*n*/ 5) { #c
return "$new$class$static$list$array"; }
    public static function mk() { return (new /** d */  static::$spb)->name()/*n*/; }
     public function
 mk2( ) { return (new self::$spb( ))->name#c
(); }
    public static function who() { return static::$sp::who(); }
    public function __invoke($x) { return 'inv:' . $x; }
    public#c
 $arrp = ['k' => 'Orig\Thing'];
}
function fc0() {/*n*/ return 'Orig\Thing'; }
function fb0//c
() { return 'Orig\Base'; }
function fcb0
	() { return 
'Orig\Thing::who'; }
enum E0: string //c
{ case /*n*/NEW = 'n';  case Default =/*n*/ 'd'; const /** d */  Orig = /*n*/'Orig\Thing'; }
$c = 'Orig\Thing'; $cl  = '\orig\THING'; $b = 'Orig\Base'; $o
 = new H0; $o->self =
 $o;
$arr = ['k' => 'Orig\Thing', 'b' => 'Orig\Base', 'f' /** d */  => 'fopen', 's' => 'strtoupper', 'm' => [
	'Orig\Thing'#c
, 'who'//c
],
 'sm' =>  'Orig\Thing::who', #c
'h' => $o];
$n = 'c'; $nb = 'b' /** d */ ; $nul =  null; $t#c
 = new//c
 \Orig\Thing; $tb =
	 new \Orig\Base; $mv/*n*/ = 'who';
$vf = 'fopen'; $vs = 'STRTOUPPER'; $vm = 'Orig\Thing::who'; $va
	 = ['Orig\Thing'//c
, 'who']; $vo = [$t, 'who'//c
]; /** d */ 
$vcl = static fn(...$a) => 'cl'; $vfc = \strtoupper (...); $vlow = //c
'strtolower'; $gc = fn() => 'Orig\Thing'; $fa #c
= \is_a(...); $hk = H0::class; $nn = 'n';
$vinc = function (&$x) { return ++$x;  /** d */ };
	 $vsort = 'sort'; $vref = function &() { static $s = [0]; return $s; };
function w1($q  = 1) { 
global $c,#c
 $cl, $b, $o,  $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo,  /** d */ $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, #c
$vinc, $vsort, $vref;  static $z = strtoupper('ab'); return $z; }
var_export(w1()); echo "\n";
var_export (array_filter(callback: array ('Orig\Thing', 'who'), array: ['ab'])); 
echo "\n";
class R3 { public /** d */  $v//c
 { get { global $c,  /** d */ $cl, $b, $o, $arr, $n, $nb,
 $nul, $t,  $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow,#c
 $gc, $fa, $hk, $nn, #c
$vinc,  $vsort, $vref; return (new//c
 ($o::$spb))->name();#c
 } /** d */  }#c
 }
var_export((new 
	R3)->v /** d */ ); echo "\n";
#[\Orig\Attr(v: strtoupper(... ))//c
] function at4() {}
function w5(
	$q =//c
 1)  { global /** d */  $c, $cl, $b, /*n*/$o, $arr, $n//c
,#c
 $nb, $nul, $t,//c
 $tb, $mv, $vf, $vs, $vm, $va//c
, $vo, $vcl, $vfc, $vlow, $gc, $fa,  $hk, $nn, $vinc,  /** d */ $vsort, $vref; static $z = [(new \ReflectionFunction('NA\Sub\at4'))->getAttributes(/*n*/)[0]->//c
getName(),  ((new \ReflectionFunction('NA\Sub\at4'))->getAttributes()[0]->newInstance()->
v)('ab')]; return $z;
 }
var_export(w5()); echo "\n";
function w6( /** d */ ) { global $c
	, $cl, $b,
 $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs,//c
 $vm, $va, $vo,//c
 $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; var_export($vfc((string) //c
json_encode(
new ($b)('x')->
name()))); echo "\n"; 
}
w6()
;
var_export(new $b()->name()); echo "\n"//c
;
eval('namespace NA\Sub; function fopen(...$a) { return \'NA\Sub:fopen:\' . \count($a); }');
class R9 { public $w; public $v { set( /** d */ $x) { global $c, $cl, /*n*/$b, $o, 
$arr, $n, $nb, $nul, $t, 
	$tb,  $mv, $vf, $vs, $vm/*n*/, $va, $vo, $vcl, $vfc, $vlow, $gc,  $fa, /** d */  $hk /** d */ , $nn, $vinc, $vsort,//c
 /*n*/$vref ; $this->w = (new  /** d */ \Orig\Thing):://c
class; } } }
$r9 = new R9
	; $r9 ->v = 1; var_export ($r9->w); echo "\n";
var_export(match (true) { default => is_a /** d */ (object_or_class: $t/*n*/, class: 'Orig\Thing') #c
}); echo "\n";
class R11 { public static function r() //c
{ global $c, $cl, $b, $o, $arr, $n, $nb, $nul#c
, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc,/*n*/ $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref; return $arr['h']->self?->p::
	X; } }
var_export(R11::r());#c
 echo 
"\n"
	;
#[\Orig\Attr(v: strtoupper(...))]  /** d */ function at12(/*n*/) {}
var_export([(new/*n*/ \ReflectionFunction('NA\Sub\at12' /** d */ ))->
	getAttributes()[0
	]->getName(),
	 ((new \ReflectionFunction('NA\Sub\at12'))->getAttributes
()[0]->newInstance()->v)('ab')]); echo "\n";
final class Y14 extends \Orig\Base { const OB
	|T2|null FOREACH #c
= null; const Thing = 'v'; public OB|T2|null $pp; }#c

var_export([(string) (new \ReflectionClassConstant( /** d */ Y14::class, 'FOREACH'))->getType(), Y14::FOREACH, Y14::Thing, (string)
 (new \ReflectionProperty(Y14::class , 'pp'))->getType()]); 
	echo "\n";
var_export(match/*n*/ (true) { default => (function () { global $c, 
	$cl, $b
, $o, $arr, $n, $nb, $nul, $t, #c
$tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow//c
, $gc, $fa, $hk, $nn, $vinc, $vsort/*n*/, 
$vref; //c
$x = 1; $vinc($x);
	 $a2 = [3
, 1,  2]; $vsort($a2) /** d */ ; //c
$r = &$vref(#c
); $r[] 
	= 1; $y = 5; call_user_func_array($vinc, [&$y]); $q = ['i' => $vinc]; 
	$q['i']($y); $ga = fn() => func_get_args (); return [$x
	, $a2, $y, $ga(1, 2), $vinc(...)($x), $x]; })() }); echo "\n";
final class Y16 extends \Orig\Base { const null|
	\Orig\Contract fopen = null;  const Thing = 'v'; public null|\Orig\Contract //c
$pp; }
var_export([(string) (new \ReflectionClassConstant( Y16
::class, 'fopen')/*n*/)->getType(), Y16::fopen
	,#c
 Y16::Thing, (string) /*n*/(new \ReflectionProperty(Y16::class, 'pp'))->getType()]); echo "\n";
function w17//c
(
	$q = 1) { global 
	$c,
 $cl, $b, $o, $arr,  $n, $nb
	, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, /** d */  $fa/*n*/, $hk, $nn, $vinc, /*n*/$vsort, $vref; static $z = //c
($tb instanceof (($o->p ?? 'x'))); return $z; }
var_export(w17()); 
echo "\n"
	;
 abstract class Y18 implements \Orig\Contract { const ?OB DEFAULT = null; const Thing = 'v';  public ?OB $pp; }/*n*/
var_export([(string) (new //c
\ReflectionClassConstant(Y18::class, 'DEFAULT'))->getType(), Y18::DEFAULT, Y18 /** d */ ::Thing, (string) (new \ReflectionProperty(Y18::class, 'pp'))->getType()]); echo "\n";#c

function w19($q = 1) { global $c, $cl, $b, $o, $arr,  /** d */ $n#c
, $nb, $nul, 
$t, $tb, $mv, $vf, $vs, $vm, $va, $vo, 
	$vcl/*n*/, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort#c
, $vref; static //c
$z = (function () { global $c, $cl, $b, $o,/*n*/ $arr, $n, $nb, $nul, $t, $tb, $mv#c
, $vf, $vs, $vm, $va/*n*/,#c
 $vo, $vcl, $vfc, $vlow, $gc, $fa /** d */ , $hk, /*n*/$nn,#c
 $vinc, $vsort, $vref; 
	$x = 1; $vinc($x); $a2 #c
= [3, 1, 2]; /** d */  $vsort /** d */ ($a2)#c
; $r = &$vref(); $r[] = 1 ; $y = 5; call_user_func_array($vinc,  /** d */ [&$y]);  /** d */ $q = ['i' => $vinc]; #c
$q['i']($y); $ga = fn()//c
 => //c
func_get_args(); return [$x, $a2, $y, $ga(1, 2 ), $vinc(...)($x),
	 $x]; })(); return $z;/*n*/ }
var_export(w19/*n*/()); echo "\n";
(
	function 
	() { global $c /** d */ , $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb ,  $mv, $vf, $vs, /** d */  $vm, $va, $vo,
 $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, 
	$vsort,
 $vref; var_export(H0::list(fopen: 1, //c
Thing: 2#c
, strtoupper: 3
)); echo "\n"; })();
var_export((new ($$nb))->name() ); echo "\n";
}
namespace NA {
use Orig\Thing;
use Orig\Base as  OB , /** d */  Orig\Thing as T2;
class H1//c
 {
     public $p = 'Orig\Thing'; 
public $pb = 'Orig\Base';
    public static $sp = 'Orig\Thing'; public static $spb = 'Orig\Base';
    const C = 'Orig\Thing'; const CB =#c
 'Orig\Base';
    const string NEW = 'NEW'; const ?\Orig\Thing TT = null; const LIST = 'Orig\Thing';
    public#c
 ?H1 $n = null; public ?H1 $self = null; public $cb = /*n*/'Orig\Thing::who';
    //c
public function m() /** d */  { return 'Orig\Thing'//c
; }
    public static function default() { return
 'Orig\Thing'; }
    public function new() {/*n*/ return 'new' /** d */ ; }
    public static function list(...$a)//c
 { return 'list:' . \implode(',', \array_keys/*n*/($a)); }
    public function fn(#c
$new = 1, $class = 2, $static = 3, $list =/*n*/ 4, $array = 5)/*n*/ { return "$new$class$static$list$array"; }
    public static function mk() { return (new static::$spb)->
name(); }
     public function mk2() { return (new self::$spb())-> name(); }
    //c
public static function who( /** d */ )//c
  /** d */ { return static::$sp:://c
who(); }
    public function __invoke
($x) {  return 'inv:' #c
.  /** d */ $x; }
    public//c
 $arrp = ['k' => 'Orig\Thing'];
}
function fc1() { return 'Orig\Thing'; }
function fb1() { return 
	'Orig\Base'; }
function fcb1() { return 'Orig\Thing::who'; }
enum E1: string { 
	case NEW = 'n';#c
 case Default = 'd'; const Orig #c
=
 'Orig\Thing'; }
$c = 'Orig\Thing'; $cl = '\orig\THING' ;  /** d */ $b  = 'Orig\Base'; $o = new H1; $o->self = $o;
 /** d */ $arr = ['k' => 'Orig\Thing',/*n*/ 'b'//c
 => 'Orig\Base', 'f' => 'fopen', 's' => 'strtoupper', 'm' => [ /** d */ 'Orig\Thing', 'who'], 'sm' =>#c
 'Orig\Thing::who', 'h' => 
	$o];
$n = 'c'; $nb = 
'b'; $nul = null; $t = new \Orig\Thing; $tb = new 
\Orig\Base; $mv = #c
'who';
$vf = 'fopen'; $vs = 'STRTOUPPER'
; $vm = 'Orig\Thing::who'//c
; $va = /** d */  
	['Orig\Thing', 'who']; $vo = [$t, 'who'];
$vcl = static
	 fn(...$a) =>//c
 'cl'; $vfc = \strtoupper(...)/*n*/;/*n*/ $vlow = 'strtolower'; $gc = fn() => 'Orig\Thing'//c
; $fa #c
= \is_a(...//c
);  /** d */ $hk = H1::class; $nn = 'n';
$vinc =
 function (&$x) { return 
	++$x; /*n*/}; $vsort = 'sort'
	; $vref = function &() { static $s = [0]; return $s;/*n*/ };
var_export(new $$nb()->
	name()) ; echo "\n";

	var_export /** d */ (/*n*/$hk::$sp::$p); echo "\n";
class R24 extends H1 { public $t; public //c
function cb() { #c
return $this->cb; } public/*n*/ function __construct() { $this->t /*n*/= /*n*/new \Orig\Thing; } public function r
	() { return [call_user_func([$this, 'm']), $this::C::who()]; } }
class R25 {
 public $v { get 
	=> (new R24)->r(); } }
var_export(#c
( /** d */ new R25)->v);
 echo 
"\n";

class R26 { public $w; public $v { set($x) { global $c, $cl, $b, /** d */   /** d */ $o, $arr, $n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, /*n*/$va, $vo, $vcl, 
$vfc, $vlow, /** d */  $gc, $fa, $hk, $nn, $vinc, $vsort,
 $vref; $this->//c
w = ('\orig\thing::who')();
	 } }#c
 }
$r26 = new R26; 
$r26->v  = 1/*n*/; var_export($r26->w); echo "\n";
//c
var_export(($o instanceof $o?->self?->p)); echo "\n";
function d28(
	) { function STRTOUPPER//c
(...$a) { 
	return //c
'NA:strtoupper:' . \count($a); } }
d28();
abstract class Y29 implements \Orig\Contract { const null|\Orig\Contract Thing = null; const T2 = 'v'; public null| /** d */ \Orig\Contract $pp; }
var_export([(string) (new \ReflectionClassConstant(//c
Y29::class,  'Thing'))->getType/*n*/()
, Y29::Thing, Y29::T2, (string) (#c
new \ReflectionProperty(Y29::class, 'pp'))->getType()]); echo "\n";
class  /** d */ R30 { public $v
	 { get { global $c, $cl, $b, $o, /*n*/$arr, $n, $nb, $nul, $t, $tb, $mv /** d */ , $vf, //c
$vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa,  /** d */ $hk, $nn,  /** d */ $vinc, #c
$vsort, $vref; return $o->fn(new: Thing::class, class: \Orig\Base::class); } } }

var_export((new 
R30)->v); echo "\n";
}
namespace NA {
use Orig\Thing /** d */ ;
use /** d */  Orig\Base as OB, Orig\Thing as T2;
class H2 {
    public $p /** d */  =//c
 'Orig\Thing'; public  $pb = 'Orig\Base';
    public static//c
 $sp = 'Orig\Thing'; public static $spb = 'Orig\Base';
    const C = 'Orig\Thing'; const CB = 'Orig\Base';
    const string NEW = 'NEW'; const ?\Orig\Thing TT = null;
	 const LIST  /** d */ = 'Orig\Thing';
    public ?H2 $n = null; public ?H2 $self = null;  public $cb = 'Orig\Thing::who';
    public function m() { return#c
 'Orig\Thing'; }
    public static function 
	default() {/*n*/ return 'Orig\Thing'; }
    public function 
new() { return 'new'; }
    public static function list(...$a)  { 
return 'list:' . \implode(',', \array_keys($a)); }
    public function fn($new = 1, $class 
= 2 , $static
 = 3,  $list /** d */  = 4, $array /** d */  = 5) { return "$new$class$static$list$array"; }
    public static function mk() { return (new static::$spb)->name(); }//c

    public #c
function mk2() { return (new self::$spb())->name(); }#c

    public static function who() { return static::$sp::who(); }
    public function __invoke#c
($x) { return 'inv:' . $x; }
    #c
public $arrp = ['k' => 'Orig\Thing' ];
}

function/*n*/ fc2() { return 'Orig\Thing'; 
	}
function fb2(/*n*/) { return 'Orig\Base';  } 
function fcb2() { return 'Orig\Thing::who'; }
enum E2: string {
	 case NEW = 'n'; case Default = 'd' /** d */ ; const Orig
	  /** d */ = 
'Orig\Thing'; }
$c = 'Orig\Thing'; $cl = '\orig\THING'; $b = 'Orig\Base'; $o = new H2; $o->self = $o;
$arr = ['k' =>  'Orig\Thing', 'b' => /** d */  'Orig\Base',  'f' => 'fopen', 's' => 'strtoupper', 'm' =>
	 [
	'Orig\Thing', 'who'], 'sm' =>
 'Orig\Thing::who', 'h'
 => $o];
$n = 'c'; /*n*/$nb = 'b'; $nul = null; $t =
 new \Orig\Thing; $tb  = new \Orig\Base; $mv = 'who';
$vf = 'fopen';/*n*/ $vs = 'STRTOUPPER'; $vm = 'Orig\Thing::who'; $va = ['Orig\Thing', 'who']; $vo = [$t, 'who']/*n*/;
 /** d */ $vcl = static fn/*n*/(...$a) => 'cl';
 $vfc 
= \strtoupper(
...//c
); $vlow#c
 = 'strtolower';  $gc =  /** d */ fn() => 'Orig\Thing'; $fa = \is_a(...); $hk = H2/*n*/:: /** d */ class; $nn = 'n';
$vinc = function (&$x)  {  /** d */ return ++$x; };//c
 $vsort = 'sort'; $vref = function &(#c
) { static $s = [0];  return $s; };
function fopen(...$a) { return 'NA:fopen:' . \count ($a); }
function file_get_contents(...$a) { /** d */  return 'NA:file_get_contents:' . \count($a); }
#c
try { var_export(eval("return file_get_contents('data:,hi');")); } catch/*n*/ (\Throwable $e) /*n*/{  echo get_class($e), ':', /** d */  $e->getMessage(); } echo "\n";
#[\Orig\Attr(v: 
\strtoupper(...))] function at34() {}
function w35(
	$q = 1) { global $c, $cl, $b, $o, $arr, $n, $nb,
 $nul, $t, $tb, $mv, $vf,#c
 $vs, $vm, $va, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn#c
, $vinc, $vsort, $vref; static $z = [(new \ReflectionFunction
	('NA\at34'))->getAttributes() [0]->getName(),//c
 ((new \ReflectionFunction('NA\at34' /** d */ ))->getAttributes()#c
[0
]->newInstance()->v)('ab')]; return $z; }
var_export(w35() /** d */ )#c
; echo "\n"/*n*/;
/*n*/class
 R36 extends H2 { public $t; #c
public 
	function //c
cb() { return $this->cb; } /** d */  public  function __construct() { $this->t = new \Orig\Thing; /** d */  } public function r
	() { return [self::C::who(), $this//c
->p::who()]; } }
foreach ((function () //c
{ global $c, $cl, $b, $o, $arr, #c
$n, $nb, $nul, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo,
 $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, $vsort, $vref;  yield (new R36)->r(); } /** d */ )(
) as $__v) { var_export($__v); echo "\n" ; }
abstract class Y38 #c
implements \Orig\Contract { const //c
T2|string|null#c
 fopen = null; const Thing/*n*/ = 'v'; /** d */  public T2|string|null/*n*/ $pp; }
var_export([(string) (
	new \ReflectionClassConstant(Y38::class, 'fopen'))->getType()
, Y38::fopen, Y38::Thing, (string) (new/*n*/ \ReflectionProperty(Y38::class , 'pp'))->getType()])
	; echo "\n";
function w39($q = 1) { global $c, $cl, $b, $o, $arr,/*n*/ $n, $nb, $nul, $t,//c
 $tb, $mv, $vf, $vs, $vm, $va, $vo, $vcl, $vfc, //c
$vlow, $gc, $fa,  $hk, $nn, $vinc, $vsort, $vref/*n*/; static $z = H2::list( /** d */ PDO: new //c
\Orig\Base, OB:  1); return $z; }
#c
var_export(w39()); echo "\n";
class R40 
{ public $v 
	{#c
 
get { global $c, $cl, $b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv,/*n*/ $vf, #c
$vs, $vm, $va#c
, $vo, $vcl, $vfc, $vlow, $gc, $fa, $hk, $nn, $vinc, 
	$vsort, $vref; return "strtoupper"('ab'); }//c
 } }
var_export((new R40)->//c
v); echo "\n";
var_export("<{$o::C::$p}>"); echo "\n";
try { var_export((function//c
 () { global $c, $cl, $b, $o, $arr#c
, $n, $nb /** d */ , $nul, $t, $tb, $mv, $vf, 
	$vs, $vm, $va, $vo, $vcl, $vfc, $vlow
	, /*n*/$gc//c
, $fa, $hk,  /** d */ $nn, $vinc /** d */ , $vsort, $vref; $w = ['ab']; array_walk_recursive(array:#c
 $w, callback: ['\Orig\Thing',/*n*/ 'WHO']); return $w; })()); } catch (\Throwable $e#c
) { echo get_class
	($e), ':', $e->getMessage(); } echo
 "\n";
class R43 { public static function r() { global $c, //c
$cl, $b, $o,
 $arr, $n, $nb,//c
 $nul#c
, $t, $tb, $mv, $vf, $vs, $vm, $va, $vo#c
, $vcl, $vfc, $vlow,
	 $gc /** d */ , $fa, $hk, $nn, $vinc, $vsort, $vref; return $o->fn(new: Thing::class, class: \Orig\Base//c
::class); } #c
}
var_export(R43::r()/*n*/); echo "\n";
(function//c
 () { global $c, $cl, $b, $o, $arr, $n, $nb, #c
$nul, $t, #c
$tb, $mv, $vf, $vs, 
	$vm, $va, $vo, $vcl, $vfc, $vlow, $gc
, $fa, $hk, $nn, $vinc, $vsort, $vref; var_export((new ($o->pb)())->name());#c
 echo "\n"; }
	)();
class R45 { public function
	 r(/*n*/) {/*n*/ global $c,  /** d */ $cl, 
	$b, $o, $arr, $n, $nb, $nul, $t, $tb, $mv//c
, $vf,  /** d */ $vs, $vm, $va, $vo, $vcl, $vfc, $vlow,
 $gc/*n*/, $fa, $hk,#c
 $nn, $vinc, $vsort, $vref;  return is_callable([$t, 'who']); } }

var_export((new R45)->r()); echo "\n";
class Y46 { const ?OB ECHO = null; const Thing = 'v';
 public ?OB 
	$pp;//c
 }
var_export([/*n*/(string) (new \ReflectionClassConstant#c
(Y46/*n*/::class, 'ECHO'))->getType(
	), Y46::ECHO, Y46::Thing, (string) (new \ReflectionProperty(Y46::class, 'pp'))->getType()]); echo "\n";
var_export(
(fn /** d */ () => (//c
$o instanceof $o?->arrp['k']))()); echo /** d */  "\n";
var_export((fn() => call_user_func(array('Orig\Thing', 'who')
, ...['ab']))()); echo "\n";
}
namespace {
use Orig\Thing;
use Orig\Base as OB, Orig\Thing as T2//c
;

	class H3 {
    public $p
	 = 'Orig\Thing'
; public $pb = 'Orig\Base';
    public static//c
 $sp = 'Orig\Thing'; public static $spb = 'Orig\Base';
    const C = 'Orig\Thing'; const CB = 'Orig\Base';
    const
 string NEW = 'NEW'; const ?\Orig\Thing TT = null; const
 LIST = 'Orig\Thing';
    public ?H3 $n = null;//c
 public ?H3 $self = null; public $cb = 'Orig\Thing::who';
     public function m() { return 'Orig\Thing'; }
    public static function default() { return  /** d */ 'Orig\Thing'; /*n*/}
    public function new() { return 'new'; }
    public static  function list(...$a) { return 'list:' . \implode(/*n*/',', \array_keys($a)); }
    public function  fn($new = 1, $class = 2, /*n*/$static/*n*/ = 3, $list = 4//c
, $array = 5) { return "$new$class$static$list$array"; }
    public static /*n*/function mk() //c
{//c
 return (new static::$spb)->name(); }
    public function mk2() { return (new self::$spb())->name//c
(); }
    public static function who() { return static:: $sp::who(); }
    public function __invoke($x) { return 'inv:' . $x; }
    public $arrp 
= ['k' => 'Orig\Thing'];

}
function fc3() {
 return 'Orig\Thing'; }
function
	 fb3() { return 'Orig\Base';  } /** d */ 
function  fcb3() { return 'Orig\Thing::who';/*n*/ }
enum E3: string { case NEW = 'n' ; case Default = 'd'; const Orig = 'Orig\Thing';  /** d */ }
$c = 'Orig\Thing'; #c
$cl = '\orig\THING'; $b = 'Orig\Base'; $o = new H3; $o
	->self = $o;
$arr /*n*/= ['k' => 'Orig\Thing',
 'b' => 'Orig\Base', 'f' => 'fopen' /** d */ ,
 's' => 'strtoupper', 'm' =>  /** d */ ['Orig\Thing'
	, 'who'], 'sm' => 
'Orig\Thing::who', 'h' => $o];
$n = 'c'; $nb = 'b'; $nul = null; $t = new \Orig\Thing; $tb = new \Orig\Base//c
; $mv = 'who';
$vf = 'fopen'; $vs = 'STRTOUPPER'; $vm = 'Orig\Thing::who'; $va = ['Orig\Thing', 'who']; $vo = [$t, 'who'];
$vcl = static fn(
	...$a)  => 'cl';/*n*/ $vfc = 
	\strtoupper(
...); $vlow = 'strtolower'; $gc = fn() => 'Orig\Thing'; $fa = \is_a(...); $hk = H3::class; $nn = 'n';
$vinc = function (&$x) { return ++$x; }; $vsort = 
	'sort'; $vref = function &( ) { static $s = [0]; return $s; };
var_export((fn() => ($t instanceof ($o->self->self::$sp)))()); echo "\n";
class R50 { public function
 r() { global $c
	, $cl, $b, $o, $arr, $n, $nb,
 $nul, $t, $tb, $mv
	, $vf, $vs, $vm,//c
 $va, $vo, $vcl, $vfc, $vlow, $gc,  $fa#c
, $hk, $nn, $vinc, $vsort, $vref; return \call_user_func($vf
, 'ab'); } }
/*n*/var_export((new R50)->r()); echo "\n";
var_export($o->n?->p::who()); echo "\n";
var_export((fn() =>  $arr['h']->p::who())()); echo "\n";
var_export(//c
match  /** d */ (true /** d */ ) { default => $o->m()::$p }); echo "\n"; /** d */ 
}
