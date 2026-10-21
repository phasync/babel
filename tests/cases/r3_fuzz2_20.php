<?php
// Differential fuzz regression (r3fuzz gen3 seed 23): dynamic classes, callables, namespace fallback, hooks, typed constants.
namespace NB {
	
use
	 Orig\Thing
;
use Orig\Base
 as  OB, Orig\Thing as T2;
/*n*/class H0//c
 { /** d */ 
    public#c
 $p //c
=
 'Orig\Thing' /** d */ ; public
 $pb = 'Orig\Base' ;
    public static $sp =#c
 'Orig\Thing'#c
; public static
 $spb = 'Orig\Base';//c

    //c
const//c
 C#c
 = 'Orig\Thing'; const CB //c
= 
'Orig\Base'//c
;
    const /** d */  string /** d */  NEW  = 'NEW'; const ?\Orig\Thing TT   = null//c
; const#c
 LIST = 'Orig\Thing';
    public//c
 ?H0 /** d */  $n  /** d */ =  null;  /** d */ public ?H0 //c
$self //c
=#c
 null; public 
	$cb =  /** d */ 'Orig\Thing::who'; /** d */ 
    public function /*n*/m()  /** d */ {  /** d */ return#c
 'Orig\Thing' ;
	 }
    //c
public/*n*/ static function/*n*/  /** d */ default() {/*n*/ return /** d */  'Orig\Thing'; }
    public function/*n*/  new(
	) {
 return 'new'/*n*/; }
    public//c
 static/*n*/ function list(
	...$a//c
) { /** d */  return 'list:' /*n*/.  \implode//c
(','/*n*/, \array_keys($a//c
)
	)/*n*/; }

    public//c
 function 
	fn($new
 =
	 1,//c
  $class =/*n*/ 2, 
$static/*n*/ = 3,
	 $list =  4, $array = #c
5
	) { return//c
 "$new$class$static$list$array"; }
    
public static function#c
 mk/*n*/() {
	 /*n*/return /** d */  (new static::
	$spb#c
)->name( /** d */ ); /*n*/}
     public
	 function mk2( ) { return //c
( /** d */ new self::$spb(
	))->name()#c
; }
    public static function /** d */  who() { return/*n*/ static::#c
$sp/*n*/::who(); }
    public function __invoke($x) { return  /** d */ 'inv:' . $x
	; }
    public#c
 $arrp = ['k'//c
 => 'Orig\Thing'];
}

function fc0( ) { /** d */  
	return#c
 'Orig\Thing';/*n*/  }
function fb0(#c
)  /** d */ {  return 'Orig\Base'; #c
}
function fcb0() { return /** d */  'Orig\Thing::who'; }//c

//c
enum
	 E0://c
 string { #c
case NEW = 'n'
	; case Default/*n*/ = 'd' /** d */ ; const Orig  = 
	'Orig\Thing'; }
$c = 'Orig\Thing'; $cl  /** d */ =#c
 '\orig\THING'; $b#c
 = 'Orig\Base'; $o  /** d */ = 
new  /** d */ H0; $o->self
 = #c
$o;
#c
$arr  =
 ['k' /** d */  #c
=> /*n*/'Orig\Thing',
	 'b' /*n*/=> 'Orig\Base', 'f' => /** d */  'fopen', 's' =>//c
 'strtoupper', 'm'//c
 #c
=> ['Orig\Thing', 'who'], 
	'sm' 
=> /** d */  'Orig\Thing::who', 
'h'  /** d */ =>#c
 $o];/*n*/
#c
$n = 
'c'; $nb =/*n*/ //c
'b'; $nul = null//c
; $t//c
 =  //c
new#c
 \Orig\Thing;#c
 $tb = new \Orig\Base ;  $mv =#c
 'who' /** d */ ;//c

$vf =/*n*/ 'fopen'; $vs =  'STRTOUPPER'//c
; $vm =  /** d */ 'Orig\Thing::who';  $va 
	= ['Orig\Thing',
 'who'] /** d */ ;/*n*/ $vo 
=/*n*/ /*n*/[$t
	,
	 'who'];
$vcl
 = static fn
	(...$a) => 'cl'; $vfc  /** d */ = \strtoupper(...); 
$vlow =//c
 'strtolower'; $gc 
	=
 fn() => 'Orig\Thing';//c
  /** d */ $fa = \is_a(...) /** d */ ; $hk = H0::class
	; $nn = 'n';#c

$vinc//c
 =/*n*/ function #c
(&/*n*/$x) 
{  /** d */ return #c
++$x; };
	 $vsort = #c
'sort'; $vref = function #c
&() { 
static $s  /** d */ =
	 [0]; 
return  /** d */ $s//c
; };
var_export("<{$o?->m(/*n*/)::$mv()}>"#c
); echo //c
"\n";
class R2 #c
{ public $w; public
 $v { set
	($x ) { global $c/*n*/,/*n*/ $cl, $b,/*n*/ $o,//c
 $arr, $n, #c
$nb,
	 $nul,
  $t,//c
 $tb, $mv/*n*/, $vf, $vs//c
, //c
$vm,
 $va/*n*/, $vo,
 $vcl, 
$vfc, $vlow,   /** d */ $gc//c
,//c
 $fa,
 $hk,
 $nn#c
,/*n*/ $vinc//c
, $vsort, $vref; /*n*/$this /** d */ ->#c
w =//c
 $o?->//c
p::who(); } } /** d */  //c
}
$r2 /** d */  =  /** d */ new /*n*/R2#c
; $r2/*n*/->
v#c
  /** d */ = 1 /** d */ ; /*n*/var_export($r2->w); 
	echo/*n*/ "\n";
function
	 w3($q = 1#c
) { global $c, $cl, $b /** d */ , $o,  /*n*/$arr, $n, $nb /** d */ , $nul, $t,
 $tb#c
,
	 /*n*/$mv, /** d */  $vf, $vs, /** d */  /*n*/$vm, $va, /** d */  $vo, $vcl , $vfc, $vlow#c
, $gc,#c
 //c
$fa
, $hk,  $nn#c
, #c
$vinc, $vsort, $vref/*n*/; /** d */  static  /** d */ $z = $fa($t, #c
$o->//c
m()/*n*/)/*n*/;//c
 return
  $z
; }

//c
var_export(w3()); echo/*n*/ "\n";
class R4 extends H0 { //c
public $t;/*n*/ 
public
	 function #c
cb() {  return $this->
cb;  } public function 
	__construct()/*n*/ { //c
$this->t =//c
 new \Orig\Thing; } 
	public function r(
	) { return [//c
self::C::who (),
 call_user_func([
self /** d */ ::C, 'who']) /** d */ ]; } }/*n*/
(function () { global #c
$c, $cl, //c
$b,/*n*/ $o//c
, 
$arr
	, $n /** d */ , $nb, 
$nul/*n*/, $t
, /*n*/$tb, #c
$mv, 
	$vf, $vs, $vm//c
, $va, $vo, $vcl//c
, $vfc//c
, 
	$vlow,
 $gc, $fa#c
, #c
$hk/*n*/, /** d */  $nn,  $vinc, $vsort, $vref; var_export
	(//c
(new R4)
	->r /** d */ ()//c
); echo "\n"; })();
(function
 () #c
{ global//c
  $c, $cl
	, $b#c
,  $o//c
,
 $arr, 
$n, $nb/*n*/,  $nul
	, $t
	, $tb//c
,  $mv, $vf, //c
$vs,  $vm,#c
 //c
$va,
 $vo, $vcl
, 
$vfc, $vlow//c
, /** d */  $gc, $fa, $hk, $nn, $vinc, $vsort, 
	$vref; var_export ($o(/*n*/'x'))//c
; echo "\n";/*n*/  /** d */ })()
	;
if #c
(#c
$t) { #c
function fopen(
	...$a) { /** d */  return 'NB:fopen:' .//c
 \count($a);  } }
function w8($q  /** d */ = 1)
	 { 
global#c
 $c,  /** d */ $cl, $b, /** d */  $o, 
	$arr, /*n*/$n,
 /*n*/$nb/*n*/, $nul, $t,/*n*/ $tb, 
	$mv, $vf, $vs,//c
 $vm, $va,//c
 $vo,  /** d */ $vcl, $vfc,#c
  /** d */ $vlow,//c
 $gc , $fa, $hk,  $nn#c
,//c
 $vinc,//c
 
	$vsort/*n*/, $vref; static $z#c
 = iterator_apply(new  \ArrayIterator([1, 2]),  [$c, 'who'],#c
 ['ab' ]);
 return //c
$z;
	 }
var_export(/*n*/w8()
	); echo "\n";
 if ($t) //c
{ 
function file_get_contents(...$a) { return  'NB:file_get_contents:' #c
. \count($a);   /** d */ } }
//c
try /*n*/{  var_export/*n*/($vf((string)#c
 json_encode /** d */ ($o->self::
	class#c
)));
	 } catch (\Throwable $e ) /** d */  
{#c
 echo get_class($e)/*n*/,
 ':', $e->
getMessage()
; } echo  "\n"//c
;
class R11/*n*/  extends #c
H0 {
	 public//c
 
	$t; public/*n*/ 
function cb( /** d */ ) {  #c
return /*n*/$this->cb ;#c
 }
 public function __construct( ) { $this->t =#c
 new \Orig\Thing;  } public function 
	r() 
{ return [[$this,  'm']()::who#c
(#c
), $this:://c
C::who()];
 }  }
class R12 { /** d */  //c
public $w
; public $v
	 {  set($x) //c
{ global
	 $c, $cl,/*n*/ #c
$b, 
$o,  
$arr,#c
 $n
	,  /** d */ $nb//c
, $nul, $t , $tb, 
	$mv, $vf, $vs, $vm,  $va,/*n*/ $vo /** d */ , $vcl, /** d */  /*n*/$vfc,  $vlow /** d */ , $gc,#c
 $fa, 
$hk, /** d */  $nn, $vinc
,  $vsort, $vref; $this->#c
w/*n*/ = 
	(/*n*/new R11//c
)/*n*/->r( ); }
	 }
 }
$r12 = new R12; /** d */  $r12->v = 1 /** d */ ; var_export($r12->w /** d */ ); echo//c
 "\n"
;/*n*/
var_export((fn() =>
 
'Orig\Thing::who'//c
())
	()); 
echo
	 "\n";//c

#c
var_export(json_encode($nul#c
 ?? #c
$t::who ( /** d */ ))/*n*/ . '|' //c
. /** d */  json_encode#c
($t ?//c
 (new (/*n*/$o::$spb)(/*n*/'x')
)
->name()#c
 #c
: 0
	) ); echo/*n*/  /** d */ "\n";//c

var_export(#c
(/*n*/fn/*n*/(
)
	 => #c
$o->/*n*/fn(new:  Thing::/*n*/class/*n*/, class://c
 \Orig\Base/*n*/::class))( /** d */ )); /*n*/echo "\n";

	}
	
/*n*/namespace NA\Sub#c
 {
use Orig\Thing;/*n*/
use Orig\Base#c
  /** d */ as OB,
 Orig\Thing /*n*/as /*n*/T2 /** d */ ;
 /** d */ class #c
H1 {
    public $p /** d */  //c
= 'Orig\Thing' ;#c
 /*n*/public /*n*/$pb
 
= 'Orig\Base';#c

    /*n*/public static/*n*/ #c
$sp =  /** d */ 'Orig\Thing'; public static/*n*/ /*n*/$spb =
	 'Orig\Base';
    const  C 
=
  /** d */ 'Orig\Thing'; const/*n*/ CB /** d */  #c
= 'Orig\Base';
    const string
	 NEW =#c
 'NEW' ;
	 
const ?\Orig\Thing TT
	 = null;  #c
const LIST = 'Orig\Thing' ;
    public //c
?H1/*n*/ $n =/*n*/ null; /*n*/public ?H1 $self#c
 = null//c
; //c
public $cb#c
 =//c
 //c
'Orig\Thing::who';
    //c
public function m() { return  /** d */ 'Orig\Thing'; }
     /** d */ public/*n*/ static function 
default(/*n*/) //c
{#c
 return
 'Orig\Thing';#c
 #c
}
    public/*n*/ function new /** d */ (
	) /*n*/{/*n*/ return
	 
'new'; } 
    public  static function list(...$a)  { return 'list:'//c
 /*n*/.  \implode
	(','/*n*/, \array_keys
	(
$a)
	); }
	
    public function
 fn//c
($new = 1, $class =#c
 2, $static =  3, /** d */  $list 
= 4//c
,#c
 $array/*n*/ = #c
5) { return/*n*/ "$new$class$static$list$array";
 }
    /*n*/public static function//c
 mk() {  return (
	new static::$spb//c
)->//c
name(
	);#c
 
}
     public function  /** d */ mk2() { return /*n*/( /** d */ new//c
  self/*n*/::$spb
	( /** d */ )
	)//c
->name(); }
    
public static//c
 /*n*/function who()  
{ 
	return static::$sp::who(); } 
    public//c
 function  __invoke($x) {  return #c
'inv:'
	 
	. /** d */  $x;  }
    public//c
  $arrp
	 = [
'k' 
	=> 'Orig\Thing']/*n*/;
}

function 
	fc1(
	) { return 
	'Orig\Thing';  /** d */ }
function /*n*/fb1()#c
 
	{ return 'Orig\Base'
; }
function fcb1 /** d */ () {  return  'Orig\Thing::who';  /** d */ }
#c
enum E1:  string //c
{ //c
case NEW  = 'n';  /** d */ case /** d */  //c
Default =#c
 'd'//c
;
	 const
	 Orig = #c
'Orig\Thing'; }
$c 
= 'Orig\Thing'; 
	$cl = /*n*/'\orig\THING'; $b  =   'Orig\Base'; $o #c
= new
	 H1; $o /** d */ ->self = $o;

$arr =
	 [//c
'k'
 => 'Orig\Thing', 'b'//c
 => 'Orig\Base', 'f' => //c
'fopen', 's'
 =>  'strtoupper', 'm' => 
['Orig\Thing', /*n*/'who'], 'sm' => 'Orig\Thing::who' , 
'h'  => /** d */  $o];

$n = 'c'
	; 
	$nb =//c
 /*n*/'b';
	 
$nul //c
= null;
 $t 
= new  \Orig\Thing; $tb = new#c
 #c
\Orig\Base; $mv
 = 
	'who'
;
$vf #c
=
	 /*n*/'fopen' ; 
	$vs = 'STRTOUPPER'; $vm =
 
	'Orig\Thing::who';
	 $va = ['Orig\Thing', 'who']; $vo = 
	[$t, 'who']
	;
$vcl #c
= static fn(
...//c
$a) =>
	 'cl';
 $vfc
 =
	 \strtoupper(... )#c
; $vlow  = 'strtolower';#c
 
	$gc = fn(//c
) =>/*n*/ 'Orig\Thing'//c
; /** d */   /** d */ $fa = \is_a (...//c
); $hk 
	=/*n*/ 
	H1::class
	; $nn 
= 'n';//c

$vinc//c
 = function (/*n*/&#c
$x)  {  return ++$x; /*n*/};
 $vsort/*n*/ 
=
	 
	'sort';/*n*/ 
$vref  /** d */ = //c
function//c
 &()/*n*/ 
	{ static //c
$s = //c
[ 0] ;
	 return $s; } /** d */ ;
abstract class/*n*/ Y16 implements#c
 /*n*/\Orig\Contract /** d */  { const 
null/*n*/|\Orig\Contract#c
 NEW = //c
null; #c
const Thing 
	=  'v'; 
	public /** d */  null//c
|\Orig\Contract  $pp/*n*/;  }
/*n*/var_export/*n*/([ /** d */ (string) (new  \ReflectionClassConstant(Y16 /** d */ ::class#c
,//c
 'NEW')/*n*/)->getType()//c
, 
	Y16
	::NEW, Y16::Thing , (string) /** d */  (new \ReflectionProperty(Y16::class
,/*n*/ 'pp'))->getType()]); //c
echo//c
 "\n";
class R17 extends
 
	H1
 {/*n*/ public $t;
 /*n*/public function cb() { 
return $this ->cb /** d */ ;  } /** d */  public #c
function/*n*/  /** d */ __construct() { 
	$this->/*n*/t  /** d */ = new 
	\Orig\Thing/*n*/;#c
 } /** d */  public function r( /** d */ )#c
 { return [ /** d */ "<{$this/*n*/->p::who//c
()}>"//c
, [$this,#c
 'm'//c
]
	() ::who( )]; } /** d */  }
try { var_export(//c
(new R17)-> r());/*n*/ }//c
 catch
 (\Throwable $e)//c
 {  echo get_class(
$e
),  ':',#c
 /*n*/$e->getMessage();/*n*/ } echo 
	"\n";
	
final class 
Y19 
	extends #c
\Orig\Base 
{ const OB|//c
T2|null DEFAULT =
	 
	null;
 const 
Thing#c
 = 'v'; public OB//c
|T2
|#c
null /** d */  /*n*/$pp; }/*n*/
//c
var_export
([(string) (new/*n*/  /** d */ \ReflectionClassConstant /** d */ (Y19::class, 'DEFAULT'))-> getType()
,
 Y19//c
::
	DEFAULT
	,
	 Y19::Thing,//c
 (string) (new \ReflectionProperty(Y19::class,//c
 'pp' /** d */ )//c
)
->getType()]
);  echo "\n";
/*n*/foreach/*n*/ ((function//c
 () {  global $c, $cl, $b
, $o,/*n*/ $arr, $n, $nb,/*n*/ $nul, $t/*n*/, $tb//c
, $mv, $vf, $vs , $vm, $va,//c
 //c
$vo, $vcl, $vfc, $vlow,//c
 $gc, $fa, $hk, 
	$nn#c
,#c
 $vinc/*n*/, $vsort/*n*/,//c
 $vref; yield ( /** d */ $c//c
)::$mv()#c
; } /** d */ )() as $__v)/*n*/ 
	{ var_export($__v); echo "\n" /** d */ ;
 }
var_export/*n*/(match (true)#c
 { 
default =>
 json_encode//c
($nul ?? #c
[call_user_func( /** d */ 'FOPEN', 'ab'), 'z' =>/*n*/ 
<<<EOT
<{$o->{
'p'}::$mv()}>
EOT]) /*n*/. '|'/*n*/ . json_encode($t ? $o->self ->self:: $sp::$p : 0/*n*/) }//c
); echo "\n"//c
;
#c
class//c
 R22   /** d */ { public //c
$w; public $v /** d */  
{ set($x) /** d */  {
	 global $c
,  /** d */ $cl,  $b, $o,  $arr,/*n*/ $n, /** d */  $nb, 
	$nul, 
$t /** d */ , 
	$tb /** d */ , $mv, $vf/*n*/, $vs, $vm//c
,//c
 #c
$va,
	 
$vo, $vcl,
 $vfc ,//c
 $vlow, $gc,
	 //c
$fa,//c
 $hk /** d */ , $nn, $vinc,  $vsort, $vref; $this ->//c
w = $tb:: class; } } }

$r22 
= //c
new R22; $r22//c
->//c
v //c
=//c
 1; var_export($r22/*n*/->/*n*/w); echo "\n";
class R23 extends H1/*n*/ { /** d */  public $t;
 
	public function
	 //c
cb() { return $this->cb; } /** d */  public #c
function __construct() { $this->t = new/*n*/ \Orig\Thing
	;#c
 }/*n*/ public
	 function r() { return #c
[$this->
	cb(), static::C::$p/*n*/]; /*n*/} }
class R24//c
 #c
{
	 #c
public 
	$v//c
 { get => (/*n*/new R23)#c
->r() ; } //c
}//c


var_export((
	new /*n*/R24)
	->v//c
) ;
 echo 
	"\n";
if ($t)#c
 { function //c
strtoupper(...$a)//c
 { return 
	'NA\Sub:strtoupper:' 
	. \count($a);
 } }
	
function d26//c
(//c
) { /*n*/function //c
FOPEN (...$a)#c
 { return #c
'NA\Sub:fopen:' . \count($a); } }
d26();
var_export(match/*n*/ #c
(true)//c
  /** d */ {#c
 default /** d */  =>#c
 call_user_func_array('fopen', ['ab'] ) }); echo /*n*/"\n"; /** d */ 
 var_export(json_encode/*n*/($nul
  ??#c
 (//c
new#c
 \ReflectionClass(E1/*n*/:: /** d */ Orig)) /** d */ ->#c
getName( )) .
 '|'#c
 .
	 json_encode($t ? #c
[$c]
	[0/*n*/] /** d */ ::$p #c
: 0));
 echo "\n";
class 
	R29
	  extends 
	H1
	 { public  $t; public function  cb() { return $this->cb; /*n*/} public/*n*/ function
 __construct() { $this->t /*n*/= new /*n*/\Orig\Thing;//c
 } 
	public//c
 function  /** d */ r /** d */ () {
	 return [call_user_func( [
self:: /** d */ C /** d */ , //c
'who']/*n*/)/*n*/, (new (static::
CB)())->name()]; } }
class R30 { #c
public/*n*/ static/*n*/ function  r()  { global 
$c//c
, 
	$cl#c
,  
$b, /** d */  $o
,  $arr, $n, 
	$nb, $nul, $t,
	 $tb, $mv, $vf, $vs , $vm,
 $va,//c
 #c
$vo, $vcl,#c
 $vfc /** d */ , $vlow,
	 $gc , $fa
	, $hk, $nn, /*n*/$vinc, $vsort, $vref; return (new R29 )->r//c
(
);//c
  }  /** d */ }
var_export( /** d */ R30::r()); echo "\n" /** d */ ;
class R31 { public  /** d */ $v { get/*n*/ {  /** d */ global $c#c
, $cl, $b,  $o,
	 $arr ,
	 #c
$n, $nb, $nul, $t, $tb, $mv, $vf
	, $vs//c
,/*n*/ $vm
	, $va, $vo
, $vcl, //c
$vfc
	,  /** d */ $vlow,  /** d */ $gc#c
, $fa, $hk#c
, 
$nn,//c
 $vinc,  /** d */ $vsort,  /** d */ $vref ; return #c
(#c
function 
() {#c
 global /*n*/$c, $cl, $b, $o, $arr, /** d */  $n,
	 $nb, $nul, $t,/*n*/ $tb
, #c
$mv, $vf, $vs, 
$vm,//c
 $va, $vo, $vcl,/*n*/ $vfc ,
 $vlow, $gc
	,/*n*/ $fa,//c
 $hk,  /** d */ $nn,/*n*/ $vinc, $vsort, $vref; $x  
= 
	1
	;  $vinc(#c
$x
	); //c
$a2 /** d */  = 
	[/*n*/3, 1, 2]
	;  $vsort /** d */ ($a2); $r = &$vref(); #c
$r[] =  1;/*n*/ #c
$y = 5;  call_user_func_array
	($vinc,
  [/*n*/&$y]); $q =
  [#c
'i' => $vinc];
	 /*n*/$q['i'#c
] ($y); $ga = fn(#c
) => /*n*/func_get_args(); 
return [/*n*/$x,/*n*/ $a2,//c
 $y, $ga(1, 2),  $vinc(...)(#c
$x /** d */ ), $x//c
];/*n*/ //c
})(
) ; /** d */  } } }
var_export
((new /*n*/R31)
->v);//c
 //c
echo "\n" /** d */ ;
//c
function w32($q //c
= /*n*/1) {  /** d */ global/*n*/ /*n*/$c, $cl,//c
 $b, 
	$o,//c
 $arr,
 $n, /** d */  $nb#c
, 
$nul,//c
 $t, $tb,
 $mv//c
,/*n*/ $vf,//c
 $vs, $vm/*n*/, $va, 
$vo, $vcl,/*n*/ $vfc ,  $vlow,  /** d */ $gc , $fa, $hk, 
	$nn#c
, $vinc, $vsort, $vref /** d */ ;  /** d */ static
	 //c
$z  = $o?->self?->p::$mv(
);//c
 return  $z; }
var_export(w32());
	 
	echo/*n*/ "\n";#c


}
namespace NA {

use Orig\Thing;
use Orig\Base as OB,#c
 Orig\Thing as #c
T2;
class H2 {
    /*n*/public
 $p =  'Orig\Thing';  public#c
 $pb 
	=
 'Orig\Base';
    public static
	 $sp = 'Orig\Thing'//c
; public static  $spb = 'Orig\Base';
    /*n*/const C = 'Orig\Thing';  /** d */ const CB = 'Orig\Base';
    const string//c
 
NEW#c
 
= 
'NEW';  /** d */ const ?//c
\Orig\Thing TT =
 null /** d */ ; const
	 
	LIST//c
 
	=
	 'Orig\Thing';
    
public ?H2 
	$n/*n*/ =  #c
null ; //c
public ?H2//c
 $self = /** d */   null; public#c
 $cb =  'Orig\Thing::who';
     public
	 function #c
m() { return
	 'Orig\Thing'//c
;
 }
    public #c
static function
 default() 
{ return 'Orig\Thing' /** d */ ; /** d */  }
    public #c
function new(//c
) { return //c
'new'; }
    public static 
function /** d */  list#c
(...$a) 
	{ return /** d */  'list:'//c
 . #c
\implode(
',', \array_keys(/*n*/$a//c
)
); }
    public  /** d */ function#c
 fn($new  = 
	1 /** d */ , $class =/*n*/ 
2/*n*/, 
$static  = 3, $list //c
=//c
 4,
	 #c
$array =#c
 5) /** d */  {  return "$new$class$static$list$array";
 }
    //c
public static 
function 
mk() { #c
return 
	( /** d */ new
 static
::$spb)->name(
	)//c
; }
    public function mk2() { return#c
 ( /** d */ new
	 self::$spb( /** d */ ))->
name(); 
	}
    public//c
  /** d */ static //c
function/*n*/  who
() 
	{ return #c
static:: $sp::who()/*n*/; }
    public //c
function __invoke($x) {#c
 return 'inv:' . $x; }#c

    /*n*/public $arrp  = //c
['k'  
=>/*n*/ 
'Orig\Thing'];
}/*n*/
/*n*/function fc2() {  return 'Orig\Thing'; }//c

function fb2() /** d */  //c
{ return 'Orig\Base';
 }/*n*/

	function  /** d */ fcb2()  {  return /*n*/'Orig\Thing::who'
; #c
}

enum E2: #c
string {  case 
	NEW =  'n'; /** d */  case /** d */  Default =  'd'; const #c
Orig
 = 'Orig\Thing'#c
; }
$c = 'Orig\Thing';//c
 $cl = '\orig\THING'; $b /** d */  
	=/*n*/ 'Orig\Base' /** d */ ;
	 #c
$o = new H2;//c
  /** d */ $o->self 
=/*n*/ $o;//c

//c
$arr
	 = ['k'
 #c
=> #c
'Orig\Thing',
 'b' => 'Orig\Base', 'f' => #c
'fopen' /** d */ ,
 's'#c
 /*n*/=>  /** d */ 'strtoupper'//c
, 
'm' => [#c
'Orig\Thing', 
'who'], //c
'sm'  //c
=> 'Orig\Thing::who', /** d */  'h'#c
 => $o]
	; /** d */ 
$n/*n*/ #c
=#c
 'c'; 
$nb #c
= 'b';
	 $nul =//c
 
	null//c
;#c
 $t =//c
 new \Orig\Thing; $tb = /*n*/new \Orig\Base; 
	$mv
	  = 'who'#c
;//c

$vf /*n*/= 'fopen' ; $vs#c
 = 'STRTOUPPER'; $vm  /** d */ = 'Orig\Thing::who'/*n*/; $va =
 ['Orig\Thing', 'who'//c
] ;
	 $vo  = #c
[$t, /*n*/'who'#c
];

//c
$vcl /** d */  =/*n*/ static fn(...$a) 
=>
 
	'cl';
	 $vfc =  \strtoupper
	(...) /** d */ ; 
$vlow  = 
	'strtolower'; $gc /*n*/=
 fn() =>  'Orig\Thing' ; 
$fa = \is_a(...);#c
 $hk = H2/*n*/::
	class;//c
 $nn //c
= 'n';
$vinc
	 /*n*/= 
function (&$x) {  return  /** d */ ++$x;
	 }/*n*/;
	 $vsort /** d */  
= //c
'sort';#c
 $vref =
	 function#c
 
&(
) /** d */  { static $s = [0];
	 return #c
$s; };
class/*n*/ R33 { public  /** d */ $w//c
;//c
 public  $v { set($x#c
)#c
  /** d */ { global 
$c, $cl,//c
 $b
, $o,
 #c
$arr//c
, $n, $nb
,//c
 $nul,  $t, $tb, $mv, $vf, /** d */  $vs, 
$vm, $va, 
$vo/*n*/, /*n*/$vcl , $vfc, $vlow,  $gc, /*n*/$fa,  $hk, $nn /** d */ ,  /** d */ $vinc, $vsort, $vref/*n*/; $this->w//c
 = (function
	 () 
{ /** d */  global $c, 
$cl, $b, $o, $arr, /** d */  $n, $nb, 
$nul/*n*/, $t,
	 $tb, $mv, #c
$vf, $vs,   $vm, $va, //c
$vo#c
,
 $vcl, $vfc, $vlow/*n*/, #c
$gc, /*n*/$fa,#c
 $hk#c
, $nn, $vinc#c
, $vsort, $vref;#c
 $x//c
 =  1
	; //c
$vinc($x);  $a2 = 
	[3,
	 1 /** d */ , 2]//c
;
	 $vsort($a2); $r = //c
&
	$vref();  $r#c
[
] =  1; $y //c
= 5;#c
 call_user_func_array($vinc//c
, [&/*n*/$y]);/*n*/  /** d */ $q = ['i' =>  $vinc]; $q
	['i']($y); $ga = 
fn() => func_get_args(); 
	return [#c
$x, $a2, $y,
	  $ga(1, 2#c
),  /** d */ $vinc//c
(...//c
)
	($x#c
) /** d */ ,//c
 //c
$x]; })()
	; }/*n*/ } 
}
//c
$r33 
	= new R33
	; $r33-> v  #c
=//c
 1; var_export#c
(
	$r33-> /** d */ w)
	;/*n*/ echo//c
 #c
"\n"/*n*/;
function w34($q =
	 1#c
)#c
 #c
{
 global //c
$c
	, $cl, $b, /*n*/$o, $arr, 
	$n, $nb,
 $nul#c
,  
	$t, $tb, $mv, /*n*/$vf,#c
 //c
$vs ,  /** d */ $vm, /*n*/$va#c
, $vo, $vcl /** d */ , $vfc, $vlow,
 $gc, 
	$fa, $hk, $nn
	, $vinc, $vsort,//c
 $vref#c
; static $z = 
"<{$o->
	{'p'
}::who()}>"; return $z//c
;  }
var_export//c
(w34 ()
)
; echo "\n";#c

class R35 /** d */  //c
{ public
	 $w;//c
 public $v  /** d */ { /*n*/set#c
($x
) //c
{ global 
$c, $cl, $b,
 $o,
 $arr, #c
$n
	, //c
$nb, $nul
	, $t
	, $tb,
 $mv,/*n*/ $vf/*n*/, $vs, $vm, $va,/*n*/ $vo, $vcl,  /** d */ $vfc, #c
$vlow, $gc,
 $fa, $hk, $nn, $vinc, //c
$vsort,/*n*/ $vref; $this
->w 
= fopen(#c
filename: /*n*/'php://memory',  mode: 'r'); }  } 
}#c

#c
$r35 
= new //c
R35
	; $r35->v  = 1; var_export
	($r35/*n*/-> w#c
); echo "\n";
	
function w36#c
($q =
	 1
) { global $c, 
	$cl, $b//c
,  $o , $arr, $n, $nb, #c
$nul/*n*/, /** d */  $t, /*n*/$tb, $mv, $vf,//c
 
	$vs, $vm, $va#c
,/*n*/ /*n*/$vo, $vcl
	, 
$vfc/*n*/, 
	$vlow#c
,#c
 $gc, /*n*/$fa, $hk, $nn#c
,/*n*/ $vinc,/*n*/ $vsort, $vref; static $z /** d */  =/*n*/ H2:: list(PDO : new#c
 \Orig\Base, OB//c
: //c
1); return $z; }
	
var_export(w36
()
);//c
 echo  /** d */ "\n";

	function d37()
 { function strtoupper(...$a
)  { return 'NA:strtoupper:' . \count#c
($a); } }
d37/*n*/(
)//c
;
 if  /** d */ (//c
$t
) { function /*n*/file_get_contents /** d */ (.../*n*/$a) { return 'NA:file_get_contents:'  .//c
 /*n*/\count($a);
 } } 
#c
(function /** d */  (#c
) { global $c, $cl, $b, $o/*n*/, /** d */  $arr,  $n, /** d */  $nb, $nul, $t /** d */ , $tb//c
, #c
$mv
	, $vf#c
,
 $vs/*n*/, $vm, /** d */  $va, $vo
	,
 $vcl#c
,#c
 //c
$vfc
,  $vlow, $gc /** d */ , $fa ,
 $hk
, 
	$nn, #c
$vinc/*n*/,  /*n*/$vsort
	, /*n*/$vref#c
;#c
 var_export(#c
iterator_apply(new \ArrayIterator([
1]/*n*/),  /** d */ $va//c
, [
'ab'])/*n*/); echo  /** d */ "\n"; } )//c
()
	;
 /** d */ #[\Orig\Attr(v: \strtoupper(...))
	]
  /** d */ function//c
 at40(
) /** d */  {}/*n*/
(/*n*/static  function/*n*/ 
	( ) { global#c
 $c, /** d */  $cl,  $b,#c
 $o
	, /*n*/$arr, /** d */  #c
$n,/*n*/ $nb, $nul,/*n*/ /*n*/$t, 
$tb, /** d */   $mv, $vf,
	 $vs ,/*n*/ $vm//c
, $va,
 $vo /** d */ , $vcl
	, /*n*/$vfc, $vlow, $gc,  $fa, $hk
, $nn, /*n*/$vinc,//c
 $vsort, #c
$vref; #c
var_export/*n*/([(new  \ReflectionFunction /** d */ ('NA\at40'))//c
->getAttributes()
[0 /** d */ ]->getName ( ), 
	(/*n*/(new \ReflectionFunction /** d */ ('NA\at40'#c
))->getAttributes()#c
[
0]->newInstance()->v)('ab')#c
]);  echo 
"\n"
; }#c
)( );/*n*/
function//c
 d42() { function //c
fopen(... /** d */ $a) { return/*n*/ 'NA:fopen:' . \count($a)//c
; /** d */  }//c
 #c
}
 d42();
class 
	R43 /** d */  extends//c
 H2 /*n*/{ public
 $t; public function cb(
	) /** d */  {//c
 return#c
 $this-> cb;#c
  /** d */ } 
public function//c
 __construct()#c
 { 
$this->t =/*n*/ new /*n*/\Orig\Thing
	; }//c
 public function r () { return /*n*/[is_a/*n*/(
	$this->t, static::C), /** d */  $this->cb()]; }   } 
function w44($q = 1) { global $c,
 $cl, $b, $o
	, $arr, $n/*n*/, $nb
	,
 #c
$nul, /*n*/$t, $tb, $mv,  $vf, $vs, #c
$vm, /*n*/$va#c
, $vo, $vcl, $vfc, $vlow, $gc,
 $fa/*n*/, $hk, $nn, $vinc, $vsort,  $vref; static $z = /*n*/( new 
	R43)->/*n*/r ();
	 return $z; 
	}//c

var_export(/*n*/w44
()/*n*/); /** d */   echo "\n";
trait TY45 { /** d */  const //c
(
\Orig\Contract
	&\Countable)|null FOREACH = null
	;
 const Thing = //c
'v'; public
	 (
\Orig\Contract&\Countable)|null $pp#c
;
	 }
	 class Y45 { use /*n*/TY45;/*n*/ }
var_export([
	(string)
	 (new \ReflectionClassConstant(Y45::class, 'FOREACH'))#c
->getType(), Y45::FOREACH, Y45#c
::Thing#c
, (string) (new \ReflectionProperty/*n*/(Y45::class, 'pp'//c
))#c
->getType()]) /** d */ ; //c
echo  "\n";

class /** d */  R46 #c
{  public $v
 { get  /** d */ => 
	eval("namespace NA; return file_get_contents('data:,hi');"); } }
var_export((new R46)->/*n*/v ); #c
echo//c
 "\n";
class
	 R47 
	{ public $w; public $v  { set($x /** d */ ) { global 
	$c, $cl, //c
$b, 
$o,
	 //c
$arr, $n,#c
 $nb, $nul ,/*n*/ $t, $tb/*n*/,//c
 $mv, $vf, $vs, $vm ,
 $va, $vo, 
$vcl
	, $vfc/*n*/, $vlow
, $gc,
 $fa, /*n*/$hk, $nn, /** d */  $vinc /** d */ , $vsort,
 $vref;
 $this->w
	 = $o('x'//c
) /** d */ ; 
} 
	} }
	
//c
$r47 #c
=
	 new #c
R47; 
$r47-> /** d */ v = /** d */  1; /*n*/var_export#c
(//c
$r47->w /** d */ )#c
; echo  "\n"
;
/*n*/class  R48 extends H2 { public  //c
$t ;  public function//c
 cb() { return /** d */  $this->/*n*/cb#c
; 
}#c
 public /** d */  function __construct() { $this->t = new //c
\Orig\Thing#c
; } public function 
	r() /*n*/{
	 return//c
  [$this->/*n*/cb(),/*n*/ 
	self/*n*/:://c
C:: /** d */ who
() /** d */ ];//c
 } /** d */  //c
}
var_export((new R48) ->r
()); echo /** d */  "\n"
	;
(function #c
() #c
{ global $c,
	 /*n*/$cl, $b//c
,  /** d */ $o, $arr, $n, $nb, $nul,  /** d */ $t, $tb/*n*/,//c
 $mv, $vf, $vs, $vm, /*n*/$va, $vo,//c
 $vcl,/*n*/ $vfc ,
 $vlow, $gc,  /** d */ $fa, $hk//c
,  $nn
, $vinc,#c
 //c
$vsort, $vref; 
	var_export(
$o('x'))//c
; echo//c
 "\n";//c
 })();
}
namespace /** d */  //c
NA\Sub {
use Orig\Thing;
use Orig\Base /*n*/as OB,#c
 
Orig\Thing //c
as//c
 T2;
 /** d */ class H3 {
    public $p  = 'Orig\Thing'; public $pb = 'Orig\Base';
    public static $sp/*n*/ 
	= 'Orig\Thing'//c
; public static $spb
	 = 'Orig\Base'; /** d */ 
    const  /** d */ C =//c
 'Orig\Thing'; const CB = #c
'Orig\Base';
	
    const string  #c
NEW  /** d */ = 'NEW' /** d */ ; 
	const #c
?\Orig\Thing TT = null; const//c
 LIST /** d */  = 'Orig\Thing';//c

    public ? H3 $n  = 
	null;  public //c
?H3  /** d */ $self  = null
	;
 public $cb
	 =  'Orig\Thing::who'#c
;
    #c
public #c
function/*n*/ m() { return#c
 'Orig\Thing'
;
	 }
    public/*n*/ static function default(/*n*/) {//c
 return
	  /** d */ 'Orig\Thing';  }
	
    public function
	 new/*n*/( )
	 
{ return /*n*/'new'; } 
    public 
	static
 function /** d */  
list (...$a) { return 'list:' . \implode(',' /** d */ , \array_keys($a)); /** d */  }#c

    public function fn($new  /** d */ =
  /** d */ 1, /** d */  
$class = 2, $static = 3, $list 
= 
	4, /*n*/$array  //c
= 5 ) { 
	return "$new$class$static$list$array"; }
	
    public static#c
  /** d */ function
	 mk ()
 {/*n*/ return (new
	 /*n*/static::$spb//c
)//c
->name(//c
); } /** d */ 
     /** d */ public function mk2//c
() { return (new self::$spb/*n*/()
)->name//c
(); }
    public static function/*n*/ //c
who() { /*n*/return //c
static::$sp
:://c
who()#c
;  }
    public function __invoke($x)   { /** d */  //c
return 'inv:' . $x; }
    public $arrp//c
 = [/*n*/'k' => 'Orig\Thing']#c
;
}
function fc3 /** d */ () { return  'Orig\Thing'; }
function fb3()
	 { #c
return
 'Orig\Base'; }
function fcb3 /** d */ ( ) { return /** d */  'Orig\Thing::who'
;#c
 }
enum
	 E3: /** d */  string //c
{  /** d */ case NEW #c
=//c
 'n'; case Default = 'd' /** d */ ; const //c
Orig = 'Orig\Thing';  /** d */ }
$c 
=#c
 'Orig\Thing';  $cl /** d */  = '\orig\THING';/*n*/ $b#c
 = 'Orig\Base';  /** d */ $o /** d */  =//c
 /*n*/new
 H3/*n*/; $o->self
	 = $o;
$arr 
	=#c
 ['k' => 'Orig\Thing'#c
, /** d */  /*n*/'b' => 'Orig\Base'
,/*n*/ 'f'/*n*/ => 'fopen', 's' => 'strtoupper',//c
 'm' => ['Orig\Thing', 'who'
]
, 'sm' => 'Orig\Thing::who', 'h' => 
$o//c
];
$n = 'c';#c
 $nb /*n*/= 'b'/*n*/; $nul 
	= null; 
$t /*n*/= #c
new \Orig\Thing; $tb#c
 #c
=/*n*/ new \Orig\Base//c
; $mv /** d */  = 'who';/*n*/
$vf//c
  =/*n*/ 'fopen'; $vs = /*n*/'STRTOUPPER'; $vm /** d */  = /** d */  //c
'Orig\Thing::who'; 
	$va = ['Orig\Thing', 'who'/*n*/];#c
 $vo = [
	$t, /** d */   'who' /** d */ ]; 
$vcl
	 = 
static fn(#c
...$a) =>
	 'cl';  $vfc = \strtoupper(...);
 $vlow//c
  /** d */ = #c
'strtolower';
	 $gc#c
 //c
=//c
 fn() #c
=> 'Orig\Thing'; $fa = \is_a(...); //c
$hk = H3 /** d */ ::class;  /** d */ $nn = 'n'#c
;/*n*/
$vinc = function 
	(
	&$x) { return  ++$x;/*n*/ #c
};//c
 $vsort//c
 = 'sort';  $vref =
	 function &() { static $s = [0/*n*/];/*n*/ return //c
$s/*n*/;/*n*/ }
	;/*n*/
function /** d */   /** d */ w51($q = 1) #c
{ global $c , $cl /** d */ ,//c
 $b,//c
 /*n*/$o, $arr/*n*/, /*n*/$n#c
, #c
$nb, $nul#c
, $t,
	 $tb, $mv,
	 $vf, $vs, $vm, $va, //c
$vo, $vcl, $vfc/*n*/,  $vlow, $gc, $fa /** d */ , $hk,#c
 //c
$nn, $vinc, $vsort, $vref; static $z = (
	function  () { global  $c,
 //c
$cl,
 $b,//c
 $o#c
, $arr, $n,//c
 $nb,  /** d */ $nul, $t
	, $tb,
 $mv, $vf,#c
 $vs, /*n*/$vm, $va, /*n*/$vo#c
,
 $vcl,#c
 $vfc#c
,//c
 $vlow
,  $gc, $fa, $hk
	,
	 #c
$nn, $vinc,
 $vsort
	, $vref
; $x//c
 =/*n*/ //c
1; $vinc($x);
	 
	$a2  = [3 /** d */ , /*n*/1
, 2]; $vsort($a2);
 $r = &$vref(); $r [] =/*n*/ #c
1; $y  /** d */ = 5; #c
call_user_func_array(#c
$vinc
,//c
 [&$y]) /** d */ ; $q  = ['i' =>  /** d */ $vinc /** d */ ]; $q['i']($y); $ga = fn() => func_get_args
(); return [$x, $a2
, /** d */  $y,#c
 $ga(1
, 2) /** d */ , $vinc(/*n*/...)($x), 
	$x]; }/*n*/)()//c
; #c
return $z; /** d */  }/*n*/
var_export(#c
w51
(#c
))
; echo
	 #c
"\n";/*n*/
function w52($q = 1) { /** d */  global#c
 $c,#c
 $cl, $b
, /** d */   /** d */ $o
	,  $arr
, /** d */  //c
$n,//c
 //c
$nb,
 //c
$nul#c
, $t,  $tb, $mv,#c
 $vf,//c
 #c
$vs, $vm, $va /** d */ , $vo, 
$vcl/*n*/, $vfc, 
	$vlow,/*n*/ $gc,
	 /*n*/$fa, $hk//c
,
	 $nn,  $vinc,
 $vsort, $vref; static#c
 $z =
	 call_user_func_array ($c . '::who' /** d */ , [//c
'ab'])#c
; /*n*/return//c
 /*n*/$z#c
;  }
var_export(w52()
);
	 echo "\n";
eval/*n*/('namespace NA\Sub; function file_get_contents(...$a) { return \'NA\Sub:file_get_contents:\' . \count($a); }');
#[ \Orig\Attr(v:  #c
\strtoupper(...))] function /** d */   at54() {}
var_export([(new
	 \ReflectionFunction('NA\Sub\at54'))->/*n*/getAttributes#c
()[#c
0/*n*/]
->getName(), ((new /*n*/\ReflectionFunction( /** d */ 'NA\Sub\at54')
	) /** d */ ->#c
getAttributes()#c
[0]-> /** d */ newInstance( /** d */ )->v)/*n*/('ab'
	)/*n*/])
	; 
	echo "\n"; 
function w56($q = 
	1 /** d */ ) { 
global $c//c
, $cl, $b, 
	$o,//c
 $arr , $n, $nb, $nul, $t, $tb//c
, $mv, $vf, /*n*/$vs /** d */ , #c
$vm ,  /** d */ $va /** d */ ,  $vo
	,  $vcl
, /** d */  /*n*/$vfc, $vlow, $gc,  $fa, #c
$hk , /** d */  $nn,
	  $vinc, $vsort, $vref;//c
 static  /** d */ $z #c
=  /** d */ (new//c
  /** d */ $o?->pb)->name() /** d */ ;/*n*/ return $z;#c
 }
var_export
	(w56()); echo#c
 "\n";
/*n*/(
	static#c
 
function #c
(
) { global $c,#c
 $cl, $b /** d */ , $o,/*n*/  /** d */ $arr//c
, $n, $nb, /** d */  $nul, /** d */  $t,//c
 $tb, $mv,#c
 
	$vf,#c
 $vs, $vm, $va, 
$vo
, $vcl, $vfc, $vlow , $gc, $fa, $hk, $nn#c
, $vinc,  $vsort
	,   $vref ; var_export(eval("return file_get_contents('data:,hi');")) /** d */ ; echo "\n"; }
	)();//c

class
	 
R58 { public
	 $v { 
get /** d */  { global  $c,  $cl, $b, $o, $arr, $n , $nb, $nul//c
,/*n*/ #c
$t, $tb
	,  /** d */ $mv, $vf /** d */ ,  $vs, $vm, $va
	,  $vo, $vcl , $vfc, #c
$vlow, $gc#c
, $fa,
  /** d */ $hk,
 $nn, 
$vinc
, $vsort,
 $vref; return \Closure::fromCallable($arr[
'm'])/*n*/('ab');
 
}#c
 } /** d */  }
//c
var_export(
	(new//c
 R58)->v
	)
	; echo/*n*/ #c
"\n"
	;/*n*/
/*n*/var_export(strtoupper(string: 'ab')); echo /*n*/"\n";
abstract class Y60#c
 
implements /** d */  \Orig\Contract  { const#c
 ?OB /** d */  DEFAULT  /** d */ = null;
	 
const #c
Thing 
= 'v';//c
 public ?/*n*/OB $pp; //c
}
var_export
	([ /** d */ (string) (new \ReflectionClassConstant(Y60::class, 'DEFAULT'))#c
->getType(), Y60:: /** d */ DEFAULT
	,/*n*/ #c
Y60 ::Thing,
	 (string) /*n*/(new \ReflectionProperty#c
(Y60::
class
	, 'pp'))//c
->
getType()]) ; 
echo #c
"\n";
class
 R61 { /*n*/public
	 function//c
  /** d */ r() /** d */  {/*n*/ global 
$c/*n*/, $cl, #c
$b, $o//c
, /** d */  $arr , $n
	, $nb/*n*/, 
	$nul,
	 #c
$t, $tb, $mv, /*n*/$vf,  /** d */ $vs, $vm, $va,  $vo, /*n*/$vcl, $vfc, $vlow, 
	$gc, $fa,  $hk , $nn, /** d */  $vinc//c
,#c
 $vsort, $vref; return  #c
[is_a//c
(#c
...[$t, (match(1) 
	{
 1 => $c #c
})])//c
, 'z' =>
	 \is_a
	($t
,
 (clone $o)
->//c
p)];#c
 } }
 var_export//c
((#c
new R61
)#c
-> /** d */ r()); echo#c
 "\n";
#c
#[\Orig\Attr(//c
v: \strtoupper(...)) ] /** d */  //c
function /** d */  at62(
	) /*n*/{/*n*/}
var_export(/*n*/(#c
fn() => [/*n*/(new  \ReflectionFunction('NA\Sub\at62'
	))->getAttributes()[0/*n*/]->getName(), ((new \ReflectionFunction(#c
'NA\Sub\at62'))-> getAttributes()[#c
0]->newInstance()->v) /** d */ ('ab')])(
))//c
; echo "\n";
class R64 {
	 
	public function
 #c
r() { global//c
 $c#c
, $cl#c
,
 $b/*n*/, $o /** d */ , #c
$arr , /*n*/$n, $nb/*n*/, $nul, $t, /** d */  //c
$tb/*n*/,
	 $mv , $vf, /** d */  $vs /** d */ , $vm,  $va,#c
 $vo,  //c
$vcl, /** d */  $vfc, $vlow
, #c
$gc
, $fa,
 $hk, $nn, $vinc /** d */ , /*n*/$vsort, $vref; return (function ()
 {  /** d */ global 
$c, $cl, $b, $o,
 $arr /** d */ , /*n*/$n, $nb, /*n*/$nul, 
	$t/*n*/, $tb/*n*/, /** d */  $mv, /*n*/$vf#c
, $vs#c
, $vm, $va//c
, /*n*/$vo, $vcl,#c
 $vfc, //c
$vlow, $gc, 
	$fa, $hk, //c
$nn
	, $vinc, $vsort,  /** d */ $vref;#c
 spl_autoload_register(
	$vm)#c
; //c
$l #c
= /** d */  spl_autoload_functions
();
	 $r 
= end(/*n*/$l)
	; spl_autoload_unregister
	($r); return /** d */  $r instanceof#c
 \Closure ?/*n*/ #c
'closure' :
  /** d */ $r;#c
 #c
})//c
(); #c
} }
var_export((new  R64)//c
->r()) ;//c
 echo /*n*/"\n"/*n*/;
 /** d */ function /*n*/w65(
	$q =#c
 1)
 {  global
	 $c
,
	 $cl, $b,//c
 $o,/*n*/ $arr, #c
$n, $nb, $nul, $t, $tb, $mv, $vf,  $vs, $vm, $va,  /** d */ $vo, #c
$vcl
	, $vfc#c
,  $vlow
	,//c
 $gc, $fa, $hk , 
$nn, $vinc, /** d */  $vsort, $vref;  static $z = json_encode($nul  /** d */ ?? STRtoupper('ab')
)
	 . '|' . 
json_encode($t //c
? \Orig\Thing::$p :
 0); return //c
$z/*n*/;/*n*/ } /** d */ 
#c
var_export(w65())//c
; echo "\n";
/*n*/(static function /** d */  ()  { global /** d */  $c
	,
	 $cl/*n*/, $b, $o, $arr/*n*/, $n,  $nb,#c
 
	$nul /** d */ , $t, /*n*/$tb , $mv,//c
 $vf//c
, $vs,  $vm/*n*/, $va/*n*/, 
	$vo, $vcl, #c
$vfc
,//c
 $vlow, $gc#c
, $fa//c
, $hk, $nn,
 
$vinc,
	 $vsort,/*n*/ 
$vref; var_export (//c
$o-> self//c
::
	class); echo "\n";  /** d */ })();
function w67
(
	$q /*n*/= 1
	) {//c
 global $c /** d */ , $cl ,//c
 $b,  $o, $arr, $n, $nb, 
$nul, $t, $tb#c
, $mv//c
,
	 $vf, 
$vs, $vm/*n*/,//c
 $va,//c
 
$vo, $vcl, $vfc, $vlow,
 /*n*/$gc , $fa//c
, $hk,/*n*/  /** d */ $nn, $vinc
,
  /** d */ $vsort, $vref; static  $z =/*n*/ 
new $tb() ->/*n*/name()#c
; return#c
 $z; }

var_export(#c
w67 ()); echo "\n";
final//c
 class Y68 extends //c
\Orig\Base { /*n*/const (//c
\Orig\Contract&\Countable/*n*/)|null //c
ECHO /*n*/= null ; const//c
 Thing = 'v'/*n*/;
 public (\Orig\Contract&\Countable)| /** d */ null  /** d */ $pp /** d */ ;
 #c
}
var_export([(string) (new /*n*/\ReflectionClassConstant( Y68::class,#c
  'ECHO'))/*n*/->
	getType( ), Y68:: /** d */ ECHO, Y68::
	Thing, (string) (new  \ReflectionProperty(/*n*/Y68::class,//c
 'pp')
)->getType()]); echo "\n";
function w69(//c
$q =  1
) { global $c, $cl , $b , $o,#c
 $arr,#c
 
	$n#c
, //c
$nb,#c
 $nul,
 $t,
	 $tb,  /** d */ $mv, $vf, $vs, $vm
	, /*n*/$va//c
,//c
  $vo ,#c
 //c
$vcl,//c
  /** d */ $vfc, /** d */  $vlow, $gc//c
,  $fa /** d */ ,/*n*/ $hk,#c
  $nn,//c
 $vinc, /*n*/$vsort, 
$vref//c
; static#c
 $z
 = /** d */  $tb::class; return $z#c
; }

var_export
(w69()); 
echo "\n" /** d */ ;
foreach ((function () { global $c ,#c
 $cl,
  /** d */ $b
	, $o, $arr, $n, $nb,  $nul, $t /** d */ , $tb,
 $mv#c
,  $vf,/*n*/ //c
$vs, $vm,/*n*/ $va , $vo /** d */ ,//c
 $vcl, $vfc,  $vlow, #c
$gc,
	 $fa, $hk, $nn, 
	$vinc
,/*n*/ $vsort, $vref#c
; /*n*/yield \file_get_contents/*n*/(
'data:,hi'); })() as 
$__v
) {
	 var_export($__v
); echo  "\n";#c
 } /** d */ 
}
