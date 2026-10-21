<?php
// Differential fuzz regression (r3fuzz gen3 seed 134): dynamic classes, callables, namespace fallback, hooks, typed constants.
namespace NA\Sub//c
 
{
use  /** d */ Orig\Thing; /** d */ 
use Orig\Base as #c
OB,  /** d */ Orig\Thing //c
as T2;
 class H0 
	{
    /*n*/public 
$p =/*n*/ 
'Orig\Thing';//c
  public $pb #c
= 'Orig\Base'
;
    public
 static 
$sp = 'Orig\Thing'/*n*/;//c
 public static $spb //c
= 'Orig\Base' /** d */ ;
    const//c
 C
 
	= 'Orig\Thing';
 const #c
CB #c
= 'Orig\Base';

    
const  /** d */ string NEW =  'NEW';/*n*/ 
const ?\Orig\Thing TT =#c
  null ; const LIST //c
= 'Orig\Thing'//c
;
     public #c
?/*n*/H0 //c
$n 
= null; /** d */  public ?H0 //c
$self  /** d */ = null; public 
	$cb  = 'Orig\Thing::who';
    
public  function m(//c
) { return 'Orig\Thing'; //c
}
    public /** d */  static
 
function
  /** d */ default( ) {  return 'Orig\Thing'//c
; }/*n*/
    #c
public 
function/*n*/ new() { return  'new'; }/*n*/
    public static
  /** d */ function//c
 list (... /** d */ $a) { return 'list:'  
. \implode(','/*n*/,
	 \array_keys($a) )//c
;  /** d */ }
    /*n*/public function fn( /** d */ $new  /** d */ =  1,  /** d */ $class //c
= 2, $static = 3,/*n*/ $list = #c
4
, $array /*n*/=/*n*/ 5) 
{ return "$new$class$static$list$array"; }
    public
	 static function#c
 #c
mk
(
) 
	{ 
	return (new static:: /** d */ $spb)->name
(); }
    public function
	 mk2() { return (/*n*/new self::$spb()//c
)->//c
name()#c
;  /** d */ }
	
    public static/*n*/ function  who(/*n*/) { 
	return //c
static::
	$sp:: /** d */ who//c
( /** d */ );  /** d */ }//c

    public function __invoke($x) /** d */  {
	 return 'inv:'#c
 ./*n*/ $x; /** d */  }
    //c
public
	 $arrp = [ /** d */ 'k' =>/*n*/ 'Orig\Thing'];
}
function fc0 /** d */ () {
	 return//c
 'Orig\Thing'; }
/*n*/function fb0() {/*n*/ 
	return 
'Orig\Base'; }
 /** d */ function fcb0
	(/*n*/) { //c
return/*n*/ 'Orig\Thing::who' /** d */ ; }

enum E0:  /** d */ string {  case 
NEW = /** d */   'n'//c
; case Default  = 'd'; const
 Orig = 'Orig\Thing'; }
$c#c
 = 'Orig\Thing'; //c
$cl  = '\orig\THING'
	;//c
 $b =  'Orig\Base'; $o /*n*/=
 new #c
H0; $o
	->#c
self =
	 //c
$o;
#c
$arr =  [ 'k' 
	=> 
'Orig\Thing'/*n*/,/*n*/ 'b' 
	=>#c
 'Orig\Base'/*n*/, #c
'f' =>  'fopen', 
's'#c
 => /** d */  'strtoupper'//c
, /** d */  'm' => ['Orig\Thing',  'who' /** d */ ], 'sm'  =>
	 'Orig\Thing::who' /** d */ ,
	 
'h' 
=>
 $o ];//c


	$n = //c
'c';//c
  $nb/*n*/  =
	 'b'; $nul#c
  /** d */ = //c
null; 
	$t = new//c
 \Orig\Thing; $tb = //c
new \Orig\Base; /** d */  $mv  /** d */ = //c
'who';
$vf
	 =
 'fopen'/*n*/; /** d */   /** d */ $vs = 'STRTOUPPER'; $vm /** d */  = 'Orig\Thing::who'#c
; $va
	 =  ['Orig\Thing'
	, /*n*/'who']; $vo  /** d */ =
	 [/*n*/$t,  'who'];
$vcl 
	= /** d */  #c
static fn(
...$a)  => /*n*/'cl' ; $vfc
	 
	= /** d */  \strtoupper(...); 
$vlow = 'strtolower'//c
;
 
$gc = fn( /** d */ )/*n*/ =>#c
 
'Orig\Thing'; 
	$fa  = \is_a(...); $hk
	 =  /*n*/H0#c
::
	class;#c
 $nn
 = 'n'
	;
$vinc =
 //c
function ( &
	$x) {/*n*/ 
return 
	++$x; } /** d */ ; #c
$vsort/*n*/ =/*n*/ 
'sort'; $vref /** d */  =  /** d */ function & /** d */ ( ) { static $s #c
= //c
[
0 /** d */ ]; /** d */  return $s; //c
}//c
;
final class Y1
	 extends \Orig\Base
 {  #c
const /*n*/?\PDO NEW = /** d */  null/*n*/;/*n*/  const
 Thing =  /** d */ 'v'//c
; public   /** d */ ? \PDO $pp ;
	 /*n*/}
var_export([/*n*/(string)
	 (new#c
 \ReflectionClassConstant//c
(Y1::class,  'NEW'))//c
->getType(//c
)
	, Y1:: NEW,/*n*/ Y1::Thing
, 
	(string)
 ( /** d */ new#c
 \ReflectionProperty/*n*/(Y1::class//c
, /** d */  'pp' /** d */ )
	) /** d */ ->getType(//c
)]); echo
	 #c
"\n";
foreach //c
(/*n*/(/*n*/function 
	(//c
)
	 {//c
 global  $c, $cl, $b, $o, $arr,#c
 $n , //c
$nb, $nul, $t/*n*/,  $tb
, $mv, $vf, /*n*/$vs, $vm, $va, $vo,  $vcl,/*n*/ $vfc, $vlow , /** d */  $gc,//c
 
	$fa ,#c
 $hk,  $nn,  $vinc,  $vsort
	, $vref#c
;//c
 /*n*/yield call_user_func('file_get_contents', 'data:,hi'); })(
	) as $__v) {  var_export($__v /** d */ );
 echo//c
 "\n"#c
;
 }
//c
class /*n*/R3 extends H0 /** d */  { public //c
$t; public #c
function /** d */   cb//c
() {//c
 return $this->cb; }  public  function __construct
( /** d */ )  { 
	$this->t #c
=  new
 
	\Orig\Thing#c
; //c
} /** d */  //c
public
 function  r()
	 { /** d */  return [//c
static :: $sp::who()
	,//c
 [$this,  /** d */ 'm']()::who(#c
)#c
]; } }//c

class /** d */  R4  
	{  /** d */ public function r() #c
{//c
 
global//c
 
$c,  #c
$cl#c
, $b,#c
 $o/*n*/, $arr,
	 $n
	, 
	$nb, //c
$nul#c
, $t ,/*n*/ //c
$tb, $mv,#c
 
	$vf,/*n*/ 
	$vs, $vm
, $va , $vo , $vcl,  $vfc,//c
 $vlow, #c
$gc//c
, $fa//c
,//c
 $hk
, $nn /** d */ , $vinc,  /** d */ $vsort,#c
  /** d */ $vref; #c
return //c
(new /** d */  R3)-> /** d */ r(); }  }

var_export((//c
new R4)->r()); 
echo #c
"\n";
(function () /** d */  //c
{ global
 /*n*/$c,//c
 $cl /** d */ , /*n*/$b
	,
	 $o,  $arr, 
	$n, $nb /** d */ , $nul, #c
$t,/*n*/ $tb,#c
 $mv, $vf
	, $vs
, $vm, $va, /*n*/$vo, $vcl, $vfc,//c
 $vlow
	, 
	$gc , $fa
	, $hk /** d */ ,/*n*/ $nn, $vinc#c
,  /** d */ $vsort, /** d */  $vref; var_export( $nul?->/*n*/m()
::who(#c
)#c
)#c
;//c
  /** d */ echo/*n*/ //c
"\n";  })();
var_export
($o->self?->
n ?-> /** d */ m(#c
)::
who(
)); echo//c
 "\n"/*n*/;
try  /** d */ {#c
 var_export($arr#c
['h']::class) ; }
 catch (\Throwable $e/*n*/) {  echo
	 get_class(
	$e), 
	':',#c
  $e/*n*/->#c
getMessage#c
(#c
); }/*n*/ 
echo "\n";#c


	if
 ($t)
 { 
	function file_get_contents(...$a) {//c
 return 'NA\Sub:file_get_contents:' . \count(/*n*/$a);//c
 }
	 }#c

#c
var_export /** d */ ($vcl((string)  json_encode//c
($o
->{'p'}::$p)
))
; echo 
"\n";
}/*n*/
//c
namespace 
	NA\Sub
	  /** d */ {
use /** d */  Orig\Thing /** d */ ;
#c
use
 /*n*/Orig\Base 
	as 
OB
	, Orig\Thing 
as T2/*n*/;

	class
	 /*n*/H1/*n*/ /*n*/{//c

    
	public $p = 'Orig\Thing';  public $pb =//c
 'Orig\Base';//c

    public
 static#c
 $sp#c
 =  'Orig\Thing';  /** d */ public /*n*/static  /** d */ $spb  = 'Orig\Base'; 
    const C  =#c
 'Orig\Thing'; const CB
 = #c
'Orig\Base'; /** d */ 
    const  string #c
NEW//c
 = 
	'NEW'; const ? \Orig\Thing TT = null; const LIST = 'Orig\Thing';
	
    
	public
 
	?H1//c
 $n
	 =  
null;
 #c
public
 ?
	H1 //c
$self//c
 =
 null//c
;  public $cb = 
	'Orig\Thing::who'//c
;/*n*/
    public function  m
( /** d */ )  { 
	return#c
 'Orig\Thing'; }
    #c
public  /** d */ static function default() { return 'Orig\Thing'; /*n*/} 
    public#c
 
	function #c
new(
	) //c
{ return
  /** d */ 'new';
	 }
    public static
	 function/*n*/ list/*n*/(...$a#c
)  { return /** d */  
'list:' . \implode
(',' , /** d */   \array_keys/*n*/($a));
 } 
     /** d */ public function fn
(
	$new =  1, 
	$class =#c
 2, $static 
=//c
 3, $list
 
	= 4, $array /** d */  = /** d */  5
	) { /*n*/return "$new$class$static$list$array" /** d */ ; /** d */  }//c

    public /*n*/static function mk( )  { return (new static::$spb
)->name(); }
    public /*n*/function mk2( /** d */ )
 /*n*/{ return ( new#c
 self#c
::/*n*/$spb()
	) /** d */ ->name();/*n*/ }
    public static function//c
 #c
who() {  return /*n*/static//c
::
$sp::who(); }
    public//c
 function/*n*/ __invoke//c
($x) 
	{
	 /*n*/return 'inv:' . $x;/*n*/ }
    public
	 $arrp//c
 = //c
['k' => 'Orig\Thing']//c
; 
}
function  
fc1() { 
return 'Orig\Thing'; }
function fb1() //c
{ return /*n*/'Orig\Base'#c
;
	 }
	
function  fcb1//c
() {//c
 return 'Orig\Thing::who';
 }
enum 
E1:
	  string /** d */  //c
{ //c
case NEW =
 'n'; case Default  = 'd'#c
; const 
Orig/*n*/ = 'Orig\Thing'; }
$c
	  = 'Orig\Thing' ; $cl  = '\orig\THING'; $b /** d */  = 'Orig\Base'; 
$o =
	 new/*n*/ H1;
	 $o->
	self//c
 = $o;
$arr = ['k'  /** d */ => //c
'Orig\Thing',  'b' 
	=> 
	'Orig\Base'/*n*/, 'f'  =>//c
 'fopen',
 //c
's' =>  'strtoupper'
, 'm' => [ /** d */ 'Orig\Thing', 'who']#c
, 'sm'//c
 => 'Orig\Thing::who'//c
, /*n*/'h' => $o];
$n = 'c' /** d */ ;   /** d */ $nb 
	= 'b'; $nul 
	= #c
null; $t =
 
	new \Orig\Thing
; $tb
	 =
 new /** d */  //c
\Orig\Base; $mv#c
 = /*n*/'who' ;
$vf = //c
'fopen'; $vs = 'STRTOUPPER'; $vm
 = 'Orig\Thing::who';//c
 /*n*/$va = ['Orig\Thing', 'who']; $vo 
	=//c
 
[//c
$t, 'who']; 

$vcl
	 
	= static
 
	fn( ...$a) /** d */  => /*n*/'cl';#c
  /** d */ $vfc 
=/*n*/ 
\strtoupper
(.../*n*/) /** d */ ; $vlow =/*n*/ 
'strtolower'#c
; $gc 
=
	 fn#c
() //c
=> /** d */  'Orig\Thing'; $fa = \is_a/*n*/(
...//c
) /** d */ ; $hk/*n*/ = H1
::class
; $nn//c
 = 'n';
$vinc  /** d */ = function (&//c
$x/*n*/) //c
{#c
 return ++$x; /*n*/} /** d */ ; $vsort  = 
	'sort';
 $vref  /** d */ = /** d */  function & /** d */ ()/*n*/ 
	{ static $s /*n*/=#c
 [0]; return $s
; };#c

foreach #c
( (function 
()  { /*n*/global/*n*/ $c, $cl#c
, //c
$b
	, $o,  $arr , $n#c
, $nb
	, $nul,//c
 $t, $tb, $mv, $vf /** d */ , /*n*/$vs#c
,
 $vm, 
$va,  
	$vo, $vcl/*n*/,#c
 
	$vfc, $vlow
,/*n*/ 
	$gc,  /** d */ $fa, $hk,/*n*/ 
$nn , $vinc, 
	$vsort, $vref; yield 
	\Closure::fromCallable#c
(callback
:/*n*/ "Orig\\Thing::who"
	)(#c
'ab');  })() /** d */  as $__v/*n*/) {
 
	var_export /** d */ ($__v) ;  /** d */ echo
	 "\n"; //c
}
#c
var_export(is_callable(['\Orig\Thing'#c
,  /** d */ 'WHO'
	], 
	true))//c
;/*n*/ #c
echo "\n"/*n*/;


	class/*n*/ R12  /** d */ {
	  /** d */ public
	  /** d */ function#c
 r#c
(#c
) //c
{/*n*/ 
global 
	$c,  //c
$cl, $b, $o#c
, $arr,
 $n, $nb /** d */ , $nul, 
	$t, $tb,/*n*/ 
	$mv,#c
 
$vf, $vs , $vm, $va/*n*/, $vo, $vcl#c
, $vfc, $vlow, $gc#c
, $fa,  $hk/*n*/,  /** d */ $nn#c
, 
	$vinc, 
	$vsort, /** d */  $vref; /** d */   return  \call_user_func/*n*/([
	$t,  'who'/*n*/], #c
'ab'); 
}
 }
var_export
((new #c
R12/*n*/)->r()); echo/*n*/ //c
"\n";
/*n*/class/*n*/ 
	R13 { public
 /*n*/$v 
	{ get/*n*/ { global $c, $cl, $b,#c
 $o, $arr, $n//c
, //c
$nb,  /** d */ $nul, $t/*n*/, $tb, $mv/*n*/,//c
 $vf, //c
$vs, 
$vm,/*n*/ $va//c
, //c
$vo/*n*/, $vcl, 
	$vfc
, $vlow, $gc, #c
$fa,/*n*/ $hk#c
,   /** d */ $nn,  $vinc, /** d */   /** d */ $vsort /** d */ , $vref;#c
 return $t::class; } /** d */  } }
var_export
((/*n*/new//c
 //c
R13//c
)->
	v);  echo /** d */   "\n";
eval//c
(
	'namespace NA\Sub; function fopen(...$a) { return \'NA\Sub:fopen:\' . \count($a); }');

abstract class Y15 implements #c
\Orig\Contract //c
{ const#c
 ?
	OB NEW  = 
	null; const
	 Thing #c
=  'v'
	; public  /** d */ ?OB $pp; }
var_export([(string) (new \ReflectionClassConstant(Y15::
	class, 'NEW' /** d */ ))-> getType
(/*n*/)
, #c
Y15::NEW
	,   Y15::Thing/*n*/, /** d */   /** d */ (string) (new \ReflectionProperty(Y15
::class , /** d */  'pp'
))->getType(
)//c
]); echo "\n"//c
; 
var_export( /** d */ $arr
['h'#c
]//c
('ab')); echo#c
 //c
"\n";
class  R17 
{ public  function //c
r()  {
 global $c#c
, $cl, /** d */  $b, 
	$o, $arr,//c
 $n, $nb , #c
$nul,/*n*/ $t, $tb,/*n*/ 
$mv,
 
$vf, $vs
, $vm, /** d */  
	$va, 
	$vo, /*n*/$vcl
	, $vfc,  $vlow, 
$gc, $fa, $hk, $nn,#c
 $vinc , $vsort, $vref
;  return (function//c
 () { //c
global $c, $cl, //c
$b
, $o,#c
  $arr,  $n/*n*/,/*n*/ $nb
	,
 $nul
,  /** d */ $t,  $tb, $mv, $vf, /** d */  $vs /** d */ , //c
$vm,#c
 $va, /*n*/$vo
,  $vcl, $vfc, 
	$vlow,
 $gc/*n*/, $fa,  $hk /** d */ , $nn,  $vinc//c
, $vsort,#c
 $vref;#c
 ob_start#c
(callback:#c
 #c
$c . '::who', /*n*/chunk_size
:
 0
	); echo
 'ab';  /** d */ ob_end_flush(); return ''#c
; /*n*/}
)(//c
);   } /** d */  }
 var_export(
	(new R17)->
	r(/*n*/))//c
;
 echo  /** d */ "\n" ;/*n*/
var_export(match  (#c
true)//c
 { /** d */  
default/*n*/  /** d */ => iterator_apply(new /** d */  
\ArrayIterator(/*n*/[ /** d */ 1, 
2]),//c
 [/*n*/'Orig\Thing', /*n*/'who'],
 [/*n*/'ab'
	]
) 
	}
);  /** d */ echo "\n"//c
;
	
(
static/*n*/ function () {
 global $c, $cl,//c
 #c
$b#c
, $o
	, /*n*/$arr, /** d */  $n, $nb
	,#c
 $nul,//c
 $t, /*n*/$tb, //c
$mv, 
$vf/*n*/,  $vs, /*n*/$vm, $va,/*n*/ $vo#c
,  $vcl//c
,   /** d */ $vfc, $vlow, $gc/*n*/, $fa,  #c
$hk, $nn,  /** d */ $vinc, #c
$vsort, $vref; var_export(
(function //c
() { global  /** d */ $c, /** d */  $cl/*n*/, $b, /*n*/$o
,#c
 $arr, $n//c
, 
$nb, $nul,/*n*/ $t,   $tb, $mv/*n*/, $vf,
	 $vs, $vm,  /** d */ $va,/*n*/ $vo#c
,
	 $vcl, #c
$vfc, $vlow#c
, $gc, 
$fa
	, $hk, /*n*/$nn, $vinc ,  /** d */ $vsort/*n*/, $vref; #c
$w
  /** d */ = ['ab'
	]; array_walk(/*n*/$w /** d */ ,/*n*/ [$t,  'who']); #c
return//c
 $w; /** d */  })(#c
))
;//c
 echo#c
 "\n" /** d */ ; })();
class#c
 R20
 /*n*/extends H1 /** d */   /** d */ { 
	public/*n*/  /** d */ $t;//c
 public function cb /** d */ ()//c
 { 
	return $this->cb
	;/*n*/ } public/*n*/ function __construct()//c
 { $this->t#c
 =/*n*/  /** d */ new \Orig\Thing/*n*/; } 
	public //c
function r() { return /** d */  [(new  parent::$spb( ))->name(), $this /** d */ ->p::who
(#c
) ]//c
;  }
 #c
}
var_export(match (true) { default => (new R20)->r( )   });
	 echo 
	"\n"
	;

class R22 extends//c
 H1  { public/*n*/ $t//c
;   public //c
function cb() { 
return $this->cb;
 } /** d */  public/*n*/ 
function  __construct(
)  { /*n*/$this#c
->t  =  new  \Orig\Thing;#c
  } public //c
function /*n*/r()  { return#c
 [$this->p::who(),/*n*/ self::C::who()];
	 } 
	}
function/*n*/ #c
w23
	($q//c
 #c
= 
	1#c
)//c
 { global /*n*/$c
	,  /** d */ $cl//c
,  $b /** d */ , //c
$o /** d */ ,   $arr,
	 $n,
	  /** d */ $nb/*n*/, $nul,/*n*/ $t/*n*/,  
$tb, $mv#c
, /** d */  
	$vf, /** d */   $vs , $vm, $va
	,#c
  $vo,
 /*n*/$vcl,#c
 
$vfc, $vlow, $gc
, $fa, $hk,  $nn,/*n*/ $vinc /** d */ , /** d */  $vsort, /** d */  $vref;
  /** d */ static
 $z  = "<{$arr[
'm']('ab')
}>"/*n*/; return /** d */  $z;#c
 #c
} /** d */ 
 var_export( w23())#c
; echo#c
 "\n";
 /** d */ try { var_export("<{$arr/*n*/[//c
'k' /** d */ ]::$mv()}>"
); #c
} catch /*n*/( \Throwable
	 #c
$e//c
) { echo 
	get_class($e), /** d */  ':',  $e->getMessage(); } echo 
"\n";
#c
class
 R25 #c
{/*n*/ public $v  {#c
 get { global
	 $c,
 $cl
,//c
 
	$b, $o#c
,  
$arr, /*n*/$n/*n*/, /*n*/$nb, $nul , #c
$t ,  /** d */ $tb /** d */ , 
	$mv
	, /** d */  /*n*/$vf//c
, $vs,#c
 $vm,//c
 $va,//c
 //c
$vo, //c
$vcl//c
, $vfc, $vlow,  $gc, $fa, $hk, /*n*/$nn, $vinc /** d */ ,/*n*/ $vsort, $vref; 
return "<{$vcl(
	... ['ab' ])//c
}>"//c
; }  }  /** d */ }
var_export((/*n*/new R25#c
) ->v); echo /** d */  //c
"\n";

foreach 
	((function #c
() //c
{ global/*n*/  /** d */ $c
, $cl
	, //c
$b, #c
$o//c
, $arr, $n,#c
  $nb, $nul, $t//c
, $tb, $mv#c
,/*n*/ $vf,/*n*/ $vs,  
$vm#c
, 
	$va#c
,#c
 
$vo/*n*/,//c
 $vcl, 
	$vfc#c
, $vlow , 
$gc,  /** d */ $fa/*n*/, #c
$hk, $nn, $vinc /** d */ ,/*n*/ $vsort, $vref; yield 
$arr
[ 'h']::C:://c
who( /** d */ )
; }//c
)#c
()//c
 as $__v
) { var_export
	( $__v)//c
; #c
echo "\n"/*n*/;
 //c
}
(
function//c
 (
) #c
{/*n*/ global#c
 $c/*n*/, /** d */  $cl, /** d */   /** d */ $b, $o, $arr/*n*/,  $n
, $nb/*n*/, /** d */  $nul
,
 /*n*/$t, $tb,#c
 //c
$mv/*n*/, $vf, $vs,/*n*/ #c
$vm,  $va,#c
 $vo,#c
 $vcl/*n*/,  $vfc#c
,
 $vlow,/*n*/ $gc,#c
 $fa, $hk, $nn//c
,//c
 $vinc, $vsort
	, /** d */  $vref; 
var_export(/*n*/get_class_vars /** d */ ($o
	->#c
m())#c
); /*n*/echo//c
 "\n"//c
; })/*n*/();
}
 namespace //c
NC
	 {
//c
use  Orig\Thing; 
 /** d */ use//c
  Orig\Base  as /*n*/OB
	, #c
Orig\Thing
	 
as T2
	;

	class  /** d */ H2/*n*/ {
	
    public $p#c
 = //c
'Orig\Thing' /** d */ ; /** d */  public  $pb 
=  'Orig\Base'/*n*/;//c

     public /*n*/static $sp//c
 =#c
 'Orig\Thing' ; public /** d */  static/*n*/ $spb 
=  'Orig\Base';#c

     const C /*n*/=
	 'Orig\Thing'; const#c
 CB  = #c
'Orig\Base';
    const//c
 string
	 
	NEW/*n*/ = 'NEW'; const ?\Orig\Thing  TT #c
= 
	null//c
;/*n*/ const/*n*/ LIST/*n*/ 
= 'Orig\Thing'#c
;
    public
	 //c
?H2 
	$n  = null; #c
public ?//c
H2 
$self  /** d */ =
 null; public
 $cb 
	= #c
'Orig\Thing::who';
    
	public /*n*/function //c
m
()/*n*/ 
{
 #c
return//c
 /*n*/'Orig\Thing'#c
;
 }/*n*/
    
public
	 static function default()
 
{ return 'Orig\Thing'; #c
}/*n*/
    public#c
 function /** d */  new
()#c
 #c
{ return 'new'; }
     public /** d */  static#c
 #c
function
 list//c
(.../*n*/$a#c
) /** d */  {  return 'list:' . /** d */  \implode( ','#c
,  \array_keys//c
( $a)); 
}/*n*/
    //c
public /** d */  
	function fn#c
(
$new = 1 , $class =
	  2//c
, $static /*n*/= 3, #c
$list = 4,
 /*n*/$array /*n*/= 5)/*n*/ {#c
 return  /** d */ "$new$class$static$list$array"; }
    public static  function  mk /** d */ ( /** d */ ) { return (
	new//c
 static::
$spb)
	-> name(); }
    #c
public  function 
mk2(#c
)//c
 { /*n*/return /** d */  (new self:: $spb/*n*/())
->name
	(//c
); }
    public static function who() {
	 return 
static::$sp::who//c
()/*n*/; /*n*/}
    public//c
  /** d */ function __invoke($x) { return
	 'inv:' . $x;
	 }
    public//c
 $arrp
	 = /** d */  [ /** d */ 'k' /** d */  =>#c
 'Orig\Thing'#c
]//c
;
}
//c
function fc2//c
() #c
{ return #c
'Orig\Thing'#c
; }
function  
	fb2()
 { /*n*/return
 'Orig\Base';  /** d */ }

function//c
 fcb2()
	 #c
{  return 'Orig\Thing::who'
; }

enum//c
 E2
	: string { 
	case NEW =  'n'; case Default =/*n*/  'd'; const /** d */  Orig = 'Orig\Thing'#c
; } 
$c 
	= 'Orig\Thing'; $cl =
	 '\orig\THING'; /** d */  $b =  /** d */ 'Orig\Base'; $o = new H2;#c
 #c
$o-> self #c
=  $o;/*n*/
$arr
 = ['k' /** d */  #c
=>
 'Orig\Thing', 'b'#c
 
=> 
	'Orig\Base', 'f' => 'fopen'
,#c
 's' 
	=> 'strtoupper'#c
,//c
 'm' #c
=>#c
 [/*n*/'Orig\Thing', 
	'who'],
	 'sm'/*n*/ =>/*n*/ /*n*/'Orig\Thing::who'//c
, 
	'h'  => $o];
 $n = 'c'; $nb =  'b'; //c
$nul = /** d */  null;  /** d */ $t = /*n*/new /** d */  \Orig\Thing;//c
 $tb =#c
 new/*n*/ \Orig\Base;
 $mv = 'who'#c
;
	
 /** d */ $vf = 'fopen'; $vs  = /** d */  'STRTOUPPER'; $vm = 'Orig\Thing::who'; $va /*n*/= [/*n*/'Orig\Thing', //c
'who'];/*n*/ $vo
	 =/*n*/ [$t, /** d */  'who'#c
] ; /** d */ 
$vcl = static  /** d */ fn#c
(
... $a) => 'cl'; $vfc =#c
 \strtoupper
(...
	); /*n*/$vlow /*n*/=  'strtolower'//c
;//c
 $gc  = fn
	() 
	=>//c
 'Orig\Thing'
; $fa /** d */  = #c
\is_a
(...);//c
 $hk  /** d */ =
	 H2::class;/*n*/ $nn = 'n';
 /** d */ $vinc 
	=  /** d */ function  (&$x/*n*/)
	 {/*n*/ return//c
 ++$x
;/*n*/ };
	 $vsort = 'sort'; $vref #c
=/*n*/ function &(#c
)  {/*n*/ static
  /** d */ $s =  [0]
	; return/*n*/ $s; }//c
;
	
#c
if
 ($t) { function file_get_contents(...$a#c
)
	 { return //c
'NC:file_get_contents:'  . //c
\count($a) ;  }/*n*/ }
	
function 
	w29/*n*/() {#c
 global //c
$c//c
,/*n*/ $cl, $b,//c
 #c
$o//c
, $arr, $n, $nb,//c
 $nul /** d */ , #c
$t, /** d */  $tb,  $mv
, $vf,/*n*/ $vs /** d */ ,/*n*/ $vm,
	 /*n*/$va, 
	$vo, 
	$vcl//c
, $vfc, $vlow,
	 
	$gc, $fa/*n*/, $hk, //c
$nn, $vinc /** d */ ,  
$vsort,/*n*/ $vref#c
;
 var_export(
(//c
function () { /** d */  global $c , $cl//c
, $b,
	 $o, $arr, $n//c
, $nb, 
	$nul#c
,//c
 $t /** d */ , 
$tb
	, 
	$mv, $vf
, $vs, $vm/*n*/, #c
$va,  /** d */ $vo,/*n*/ $vcl#c
, //c
$vfc#c
,  $vlow, /*n*/$gc, 
	$fa, $hk/*n*/, /*n*/$nn /** d */ , //c
$vinc, $vsort/*n*/, $vref#c
;  /** d */ $w /** d */  =#c
 #c
[ /** d */ 'ab']; array_walk($w, '\fopen') /** d */ ; return/*n*/ $w;
 })
	()
)#c
; echo
 "\n"#c
;/*n*/  /** d */ }/*n*/
w29()//c
;
 /** d */ eval( /** d */ 'namespace NC; function strtoupper(...$a) { return \'NC:strtoupper:\' . \count($a); }');
/*n*/var_export( (
	fn() => \Orig\Thing:: $p)(
)); /** d */  echo "\n"//c
;
var_export/*n*/(/*n*/\file_get_contents(
	'data:,hi'))//c
;  /** d */ echo "\n"; /** d */ 
(
static  /** d */ function ()#c
 { global/*n*/ $c /** d */ ,
	 $cl, $b, $o, $arr,  /** d */ $n ,/*n*/ $nb,/*n*/ $nul, $t, #c
$tb /** d */ ,  /** d */ $mv, /*n*/$vf,
	 $vs,   /** d */ $vm,
 $va , $vo, /** d */  $vcl
	, $vfc, $vlow, $gc, $fa,/*n*/ 
$hk ,/*n*/  $nn#c
, $vinc,//c
  $vsort,  /** d */ $vref;  #c
var_export(($tb instanceof (#c
(match(1/*n*/) { 1/*n*/ =>
 $c//c
 })))//c
)#c
; echo  /** d */ "\n";  }/*n*/)//c
() /** d */ ;
function FOPEN
(...$a /** d */ )//c
 {//c
 
return /** d */  'NC:fopen:' . \count($a); 
}/*n*/
var_export((fn() => (fopen(...)) /** d */ (filename: 'php://memory',
	  /** d */ mode#c
:  /** d */ 'r'))());//c
 //c
echo  
	"\n";
//c
var_export([(
function #c
( ) { global
  /** d */ $c, $cl,/*n*/ 
	$b
	,//c
 $o, //c
$arr,
 
$n, $nb, $nul,/*n*/ /*n*/$t#c
,//c
  /** d */ $tb, /*n*/$mv
, $vf/*n*/,
 $vs ,#c
 /*n*/$vm,//c
 $va, $vo/*n*/, $vcl, $vfc,
	 /*n*/$vlow, $gc,
	 #c
$fa, #c
$hk,/*n*/ $nn, 
	$vinc, 
$vsort,  $vref ; $x //c
=
 1;  $vinc($x);
	 
$a2 = #c
[#c
3 , 1, 2]#c
; //c
$vsort($a2);  $r = 
	&$vref(#c
);#c
 //c
$r /** d */ [
	]  =//c
 1;//c
 $y #c
= 5; call_user_func_array
($vinc#c
, [#c
&$y])
	;#c
 $q /** d */  = /** d */  ['i' => $vinc#c
]; $q[
'i']/*n*/($y); $ga #c
=/*n*/ fn(
) =>
 //c
func_get_args()#c
; 
	return
 [$x, $a2 , $y
	, $ga(1,  
2), $vinc(...)($x), 
	$x /** d */ ]; }
)(),//c
 
'z' /** d */  =>
 (new (
$b))/*n*/->name()])
; /** d */  echo  "\n";
/*n*/function w37($q/*n*/ =/*n*/ 1/*n*/) {
 global/*n*/ $c, 
$cl,#c
  $b, $o, #c
$arr, $n , $nb, $nul, /** d */  $t,  $tb#c
,
 $mv
	,
 $vf, $vs,/*n*/ $vm ,
 $va,  $vo, /*n*/$vcl, $vfc,#c
 $vlow,  $gc/*n*/,
 //c
$fa, 
	$hk , $nn, $vinc, $vsort,/*n*/ /*n*/$vref; static  /** d */ $z  = /** d */  #c
STRtoupper(string:  'ab'//c
); return $z;
 /*n*/}
var_export(w37(/*n*/)); echo #c
"\n" ;/*n*/
var_export( $o(
...
	[
'ab']/*n*/)); echo "\n"; 

class R39  
extends #c
H2 { public $t; public 
function cb() 
	{
 return $this->cb;
	 }  public #c
function
  /** d */ __construct
() { /*n*/$this->#c
t = new
	 \Orig\Thing
	;  }  /** d */ public function //c
r(//c
) { return  [(new 
	(#c
static /** d */ ::CB)())->name//c
(//c
),  call_user_func (#c
[ $this,  'm'
	])]; //c
} }

class R40 
	{ /** d */  public#c
 static  function 
r() { global $c, #c
$cl, /** d */   $b,
 
	$o , /** d */  $arr, $n,//c
 $nb, $nul,/*n*/ /*n*/$t,  $tb,#c
  /** d */ $mv//c
, 
	$vf
	, $vs,
	 $vm, #c
$va, /** d */  $vo, $vcl /** d */ , $vfc, /*n*/$vlow, $gc, $fa,  $hk,#c
 #c
$nn, $vinc, $vsort, #c
$vref;
	  return #c
(new//c
 R39 )->r
	(); }#c
 }
#c
var_export
	(R40
::r
	()); 
	echo "\n"#c
;#c

function /** d */  w41(
	$q =  1)/*n*/ { global $c /** d */ ,//c
 /*n*/$cl,#c
 //c
$b,
  /** d */ $o, /*n*/$arr, $n , $nb, $nul /** d */ , $t, $tb, $mv /** d */ ,  #c
$vf, $vs, $vm
	, $va/*n*/,
 $vo//c
,
 $vcl,  $vfc, 
	$vlow#c
,  $gc, $fa, $hk, /** d */  $nn
	, $vinc
,//c
 
$vsort, $vref#c
;  static $z = 
	array_find_key#c
(['ab'], $vfc);/*n*/ 
return 
	$z;  /** d */ } /** d */ 
var_export(
	w41(
))
; echo  /** d */ "\n" /** d */ ;//c

#c
abstract 
class Y42 implements#c
  \Orig\Contract {  /** d */ const  /** d */ ?OB OB
 = //c
null /** d */ ;#c
 
	const Thing = 'v';
 public ?/*n*/OB 
$pp//c
; }
var_export//c
([(string) /*n*/(new /** d */  \ReflectionClassConstant(Y42
::class,
 'OB' )) -> /** d */ getType
	() , Y42:: /** d */ OB, Y42::Thing, (string)
	 ( /** d */ new//c
 \ReflectionProperty(Y42/*n*/::class,
 /*n*/'pp')//c
)->getType(#c
)]//c
)#c
;  #c
echo  "\n"; /** d */ 
function w43(/*n*/$q
 = 1) {
 global
	 $c/*n*/, #c
$cl,
 //c
$b , $o
,//c
 $arr,  $n, $nb#c
,//c
 $nul ,#c
 $t,/*n*/ 
	$tb,
	  /** d */ $mv, $vf, $vs,
 $vm, $va, /** d */  #c
$vo, 
	$vcl, $vfc
	,  $vlow, #c
$gc, /** d */  $fa /** d */ ,#c
 $hk,
	 /*n*/$nn,
 $vinc, $vsort, 
	$vref; static $z = Thing::class; return 
	$z; /*n*/}
var_export(w43());  /*n*/echo /** d */  "\n";
trait TY44  { const#c
  /** d */ null|\Orig\Contract  TA = null;  /** d */ const Thing = 'v'; 
	public /** d */   /** d */ null /** d */ |#c
\Orig\Contract $pp; }/*n*/ class  Y44 { use  /** d */ TY44;  }
var_export(
[(string) /** d */  (new   /** d */ \ReflectionClassConstant(
	Y44::/*n*/class/*n*/, 'TA'))//c
->getType/*n*/(), Y44::TA, Y44::Thing,
 (string)
 (new /** d */  //c
\ReflectionProperty(Y44::class,  'pp')
	)->
getType /** d */ (
)
]); /** d */   /** d */ echo "\n"#c
;
class/*n*/ R45 {//c
 /*n*/public $v { get #c
{ global/*n*/ 
$c , $cl, #c
$b,  
	$o#c
, 
	$arr/*n*/,#c
 $n
,
 $nb, $nul,//c
 //c
$t, 
$tb//c
, 
$mv, /*n*/$vf,
 $vs,
 $vm, $va,#c
 
	$vo, /*n*/$vcl, //c
$vfc#c
,
 $vlow,  /** d */ $gc,  $fa/*n*/,
 $hk
,/*n*/ $nn, #c
$vinc, $vsort,  /** d */ $vref;  return#c
  call_user_func_array/*n*/(//c
callback: 'Orig\Thing::who', 
args: ['ab' /** d */ ]); }/*n*/ }  #c
}
	
var_export(//c
( new R45)#c
->#c
v)/*n*/; echo /** d */  "\n";
function /** d */  w46()
	 { global  /** d */ $c, $cl, /** d */  $b, $o
	, $arr
	,
	 
$n /** d */ ,//c
 $nb, $nul, $t, //c
$tb#c
,  $mv
	, $vf, /*n*/$vs
	, 
	$vm, $va/*n*/,/*n*/ $vo,   $vcl, $vfc, $vlow
	,  //c
$gc,#c
 
	$fa, $hk, $nn,//c
  $vinc, //c
$vsort,  $vref;  /** d */ var_export(/*n*/H2::
	list(PDO /** d */ : new
	 \Orig\Base//c
, OB/*n*/:/*n*/ /*n*/1#c
)); #c
echo "\n"; }

w46//c
();
var_export(//c
namespace\strtoupper(#c
'ab'//c
)
); echo //c
"\n";
//c
class R48 /** d */  
	{ #c
public
 #c
$w;  public $v {  /** d */ set ( /** d */ $x)   { global //c
$c, $cl, $b, //c
$o, 
	$arr, $n,/*n*/ 
$nb,#c
 $nul#c
, $t,#c
  $tb, $mv#c
, $vf#c
, //c
$vs//c
,//c
  /** d */ $vm
, $va, $vo,//c
 $vcl /** d */ , $vfc, $vlow ,
  /** d */ $gc, //c
$fa, $hk, $nn, $vinc,  $vsort, $vref;  $this ->w 
	=#c
 call_user_func('NC\fopen', 'php://memory', //c
'r');/*n*/ } } /*n*/}
$r48 =//c
 new//c
 //c
R48;/*n*/ $r48->v//c
  /** d */ = 1; //c
var_export($r48#c
->w); echo#c
  /** d */ "\n";
}

namespace 
	NA\Sub/*n*/ //c
{
use Orig\Thing;
#c
use  Orig\Base  /** d */ as/*n*/  OB, //c
Orig\Thing
 as T2 ;
 /** d */ class  /** d */ H3 {
    public $p 
	= 
	'Orig\Thing'/*n*/;  public  $pb#c
 =#c
 'Orig\Base' ;
    public#c
 static $sp  /** d */ = 'Orig\Thing';  public /*n*/static/*n*/ #c
$spb = /** d */  'Orig\Base'/*n*/;
	
    const C = 
	'Orig\Thing'; const CB#c
 = 'Orig\Base'//c
;

    const//c
 string/*n*/ NEW = 'NEW'
	;
 const /*n*/? /** d */ \Orig\Thing#c
 TT /*n*/= null;
 const#c
 LIST = 
'Orig\Thing';
    public /** d */  #c
?
	H3 $n = null; public 
	?H3  /** d */ $self = null#c
;
	  public
	 $cb = //c
'Orig\Thing::who'; 
    public function/*n*/ //c
m(//c
)  {#c
  return 'Orig\Thing';/*n*/ }
    
	public static function  default() {#c
  /** d */ return 'Orig\Thing';//c
 }
    
public /** d */  
	function new(#c
) /** d */  { //c
return 
'new'#c
; }
    public  #c
static function list
	(...$a ) #c
{ #c
return
	 
'list:'
	 /*n*/. \implode(',',/*n*/ \array_keys//c
( $a)
	); /*n*/}
    public function /** d */  
fn($new
 /*n*/= 1#c
, $class = //c
2, $static  = 3, $list = 4
	,//c
 $array
 = 5) { return
  /** d */ "$new$class$static$list$array"#c
; }
    public static function/*n*/ 
mk()  {  return //c
(new static:: $spb)->//c
name (//c
); }
    public function//c
 mk2()//c
 { return
	 
(new self::$spb(
	)
)-> /** d */ name
(); }
    public /** d */  
static function who(/*n*/)  /** d */ {#c
 /*n*/return /** d */  static::$sp::who() /** d */ ; //c
}
	
    public /*n*/function __invoke(//c
$x
)  
{  /** d */ return
	  /** d */ 'inv:' . $x;  /** d */ } /** d */ 
    public $arrp /** d */  =
 ['k' /** d */  #c
=> #c
'Orig\Thing' /** d */ ]
;
}//c


function/*n*/ fc3() {
 return
	 'Orig\Thing' ; } /** d */ 
function fb3() {/*n*/ return 'Orig\Base';
 }
#c
function fcb3()/*n*/ { return 'Orig\Thing::who';/*n*/ }//c

#c
enum E3:  string#c
 #c
{#c
 /*n*/case
 
	NEW#c
 =/*n*/ 'n'; case  Default#c
 //c
= 
'd'; /*n*/const/*n*/ Orig = 'Orig\Thing'; }
//c
$c = 'Orig\Thing'//c
; 
	$cl
 =/*n*/ '\orig\THING'; $b = 'Orig\Base'; /*n*/$o#c
 =  new /** d */  /*n*/H3; /*n*/$o
->self =
 $o;
/*n*/$arr /** d */  =
 
[ 'k'/*n*/ => 'Orig\Thing', 'b' => 'Orig\Base',//c
 'f'#c
 =>/*n*/ 'fopen', 's'
 => 'strtoupper'/*n*/, /** d */  'm' /*n*/=> //c
['Orig\Thing', 'who'],//c
 //c
'sm' //c
=>
	 
'Orig\Thing::who', 'h' => /** d */  
	$o]
;
$n #c
=  'c';//c
 $nb#c
 =
 'b'; $nul /*n*/= /*n*/null
	;  /** d */ $t
	 =  /** d */ new/*n*/ \Orig\Thing /** d */ ; $tb #c
= new 
	\Orig\Base;
 $mv 
	= 'who';//c

 $vf = 'fopen';//c
 $vs =//c
  'STRTOUPPER';//c
 $vm//c
 = 'Orig\Thing::who'//c
; $va#c
 = /** d */  ['Orig\Thing', 'who']/*n*/; 
$vo 
= 
	[#c
$t, /*n*/'who']
	;
$vcl =  /** d */ static fn(...$a#c
) =>  /** d */ 'cl'; $vfc//c
 = /** d */  \strtoupper(...#c
); $vlow  /** d */ =/*n*/  /** d */ 'strtolower' ; $gc 
	=
	 fn() =>
 'Orig\Thing'
	; $fa  = //c
\is_a /** d */ (...) /** d */ ;/*n*/ $hk =
	 H3::class; #c
$nn =  /** d */ 'n'; 

$vinc =
	 function
	 /*n*/(&$x)/*n*/ { return ++$x; //c
}#c
;
 #c
$vsort 
=  'sort' /** d */ ; $vref//c
 = 
function //c
&() {//c
 //c
static $s =  /*n*/[//c
0#c
] ; return
	 $s; /** d */  }; 
 var_export(match//c
 (true)  { default =>#c
 ($o /** d */  #c
instanceof ($o ->//c
{'p'//c
}) /** d */ ) 
	}); echo/*n*/ 
"\n";#c

foreach 
((//c
function (//c
) /** d */  #c
{ global #c
$c, /*n*/$cl /** d */ , $b /** d */ ,/*n*/ //c
$o,
 $arr, $n,  /** d */ $nb,//c
 $nul/*n*/,  #c
$t#c
,  $tb, $mv, $vf,#c
 //c
$vs, $vm,
 
	$va,  $vo /** d */ , $vcl#c
,//c
 $vfc, 
$vlow, /*n*/$gc/*n*/, $fa
	, $hk, $nn,#c
 $vinc//c
, $vsort,  /** d */ $vref/*n*/;//c
  yield is_a($t, $arr[ /** d */ 'h'] /** d */ -> /** d */ p);
 }//c
)#c
() as $__v) /** d */   /** d */ {/*n*/ var_export(#c
$__v /** d */ ); /** d */  echo  /** d */ "\n" /** d */ ; /** d */  }

//c
class #c
R51 { /*n*/public $v { get => Thing::who#c
(); 
	} }
 var_export(//c
(new#c
 R51)
-> v); echo "\n" ;
#[
	\Orig\Attr(v:
 /*n*/strtoupper (... /** d */ )
)
]/*n*/ function at52#c
() {}
(//c
static #c
function () /*n*/{ global  /** d */ $c, #c
$cl, $b/*n*/, $o,
 $arr, $n/*n*/, $nb/*n*/, $nul, $t,
	 #c
$tb//c
, 
	$mv/*n*/, 
	$vf//c
,
  $vs, $vm
	, /** d */  $va /** d */ , $vo, $vcl,
 
$vfc, 
	$vlow#c
, /** d */  $gc#c
, $fa , $hk//c
, $nn,//c
 $vinc, $vsort
	,
 $vref /** d */ ;/*n*/ /*n*/var_export(
[ (new//c
 \ReflectionFunction(
	'NA\Sub\at52'
	)
)
	->/*n*/getAttributes()[0]->getName()/*n*/,//c
 //c
((/*n*/new \ReflectionFunction#c
(/*n*/'NA\Sub\at52'))
->getAttributes(//c
)[0] ->newInstance()->v)( /** d */ 'ab')//c
] /** d */ ); //c
echo #c
"\n"; /*n*/}
)()
	;

	foreach//c
 #c
((function () { global//c
 
$c ,
	 $cl,#c
 $b/*n*/, $o, /** d */  $arr/*n*/, #c
$n, /** d */  #c
$nb//c
, $nul,//c
 $t, 
	$tb, //c
$mv,#c
 #c
$vf,  $vs, $vm
, /*n*/$va, $vo//c
, 
	$vcl,//c
 $vfc, //c
$vlow, $gc, //c
$fa,#c
 /*n*/$hk, $nn, $vinc , //c
$vsort,#c
 $vref; yield 
json_encode( $nul
	 ?? fopen('php://memory'
, 'r'))  /** d */ .
	 '|' . json_encode ($t#c
  ? /*n*/H3::list(fopen: /** d */  1, 
Thing: 2#c
, #c
strtoupper:  3//c
)#c
 :
  0//c
)
;  })
	( ) /*n*/as $__v
	)
 {/*n*/ var_export/*n*/($__v)#c
; //c
echo
	  "\n"//c
; } /** d */ 
var_export((fn(
	) =>//c
 eval("return strtoupper('ab');"))() ); echo "\n"#c
;
class R56//c
 { public/*n*/ function r (
) {  global  $c,
	 $cl//c
,  /** d */ $b#c
, #c
$o/*n*/, //c
$arr#c
,  /** d */ $n/*n*/,  $nb, $nul,  /*n*/$t, //c
$tb, $mv, 
	$vf#c
, $vs /** d */ ,
  $vm, #c
$va, $vo ,  $vcl, /*n*/$vfc, $vlow , /** d */   $gc, $fa ,  /** d */ $hk /** d */ , /*n*/$nn, $vinc
, /** d */   $vsort,/*n*/ $vref; return new $arr[ /** d */ 'b']()->name()
;  }
 }
var_export((//c
new R56)->r(//c
));  /** d */ echo "\n";
class/*n*/ #c
R57 extends H3
	 { 
public $t;//c
 public function cb/*n*/( ) { return $this->cb
; /** d */  } public 
function  __construct()
 /*n*/{ $this/*n*/->t #c
= new //c
\Orig\Thing#c
; } public function /*n*/r()#c
 { /*n*/return  [/*n*/static:: C::
	$p, /** d */   /** d */ "<{$this::$sp::who(//c
)/*n*/}>"]; //c
} }
/*n*/class R58#c
 { public #c
$w; #c
public $v
	 {#c
 set /** d */ (/*n*/$x) { 
global#c
 $c,  #c
$cl, $b/*n*/,
	 
	$o, $arr
, 
$n /** d */ , 
	$nb, //c
$nul /** d */ ,  /** d */ $t/*n*/, 
$tb, $mv
, $vf//c
, $vs,#c
 $vm, $va,
	 $vo, //c
$vcl, $vfc, $vlow,  /*n*/$gc,
 $fa,#c
  $hk/*n*/, $nn /** d */ , $vinc, /*n*/$vsort,//c
  /** d */ $vref;  /** d */ $this->w = (/*n*/new
	 R57)->r
	(
); } 
} }
 $r58 = new R58 ; $r58->v
  =/*n*/ 1 /** d */ ; #c
var_export($r58->w); echo "\n";

	}/*n*/
