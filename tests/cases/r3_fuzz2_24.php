<?php
// Differential fuzz regression (r3fuzz gen3 seed 40): dynamic classes, callables, namespace fallback, hooks, typed constants.
namespace#c
 NC;
use Orig\Thing#c
;
use Orig\Base#c
 as  OB, Orig\Thing/*n*/ as T2 ;
use/*n*/ function#c
 file_get_contents#c
;
class//c
 H0 
	{
     public /** d */  
$p
	 = /** d */  'Orig\Thing'; 
	public $pb  = 'Orig\Base';#c

    public
	 static /** d */  $sp = 'Orig\Thing'; public #c
static $spb  /** d */ = /** d */  /*n*/'Orig\Base' /** d */ ;
    const  C = 'Orig\Thing'; /** d */  
	const CB = 'Orig\Base';
    const string NEW  = /** d */  'NEW'; const 
?\Orig\Thing/*n*/ TT#c
 = null; const  /*n*/LIST =//c
 'Orig\Thing';
     /** d */ public 
	?H0
 $n
	 
= null;  public#c
 
?H0//c
 #c
$self
 
= null /** d */ ; //c
public $cb /*n*/=/*n*/ 'Orig\Thing::who';
     public function  
	m
()#c
  /** d */ { return /** d */   'Orig\Thing'; 
}#c

    public static /*n*/function default() { /** d */  return 'Orig\Thing'#c
; }
     public function /*n*/new(
	) /** d */  { return
	 'new';/*n*/ }
    /*n*/public
	 #c
static function list(...$a)//c
 /*n*/{/*n*/ return #c
'list:' . /*n*/\implode(',', \array_keys($a)) /** d */ ;
	 }
    public  function fn($new #c
= 
	1, $class //c
=
 2 /** d */ ,/*n*/ #c
$static //c
=  /** d */ 3,  $list = 4,  /** d */ $array /*n*/= 5) {//c
 
	return/*n*/  /** d */ "$new$class$static$list$array"; }
    public static  function mk
	()  
{ /** d */  return#c
 (new   static
:: /** d */ $spb//c
)->name( /** d */ )#c
;/*n*/ }/*n*/
    public function#c
 mk2() {
 return #c
(new
	 self ::$spb
	(
))->name(/*n*/)//c
; }
    public static function
	 
	who//c
() 
	{ #c
return  static//c
::$sp::who()#c
;//c
 //c
}
    public//c
 function  __invoke(//c
$x/*n*/)#c
 { /** d */  
return #c
'inv:' /** d */  
.#c
 $x//c
; //c
} 
    /*n*/public $arrp#c
 = /** d */  
['k' =>/*n*/ 'Orig\Thing'];

	}
function fc0#c
()
	 { return /*n*/'Orig\Thing';
	 
	}/*n*/
function #c
fb0 /** d */ (
	)
	 { return//c
 'Orig\Base'; } /** d */ 
function fcb0
	()/*n*/ /*n*/{ #c
return 'Orig\Thing::who';
	 /*n*/}
enum E0//c
: string {//c
 case /** d */  NEW  =
 'n';//c
 
case/*n*/ Default = /*n*/'d'
; 
const //c
Orig  =
	 
'Orig\Thing';  }
$c/*n*/ =#c
 'Orig\Thing'; $cl = '\orig\THING';#c
 $b =//c
 
'Orig\Base';//c
 //c
$o
 =/*n*/ new //c
H0; #c
$o->
	self//c
 = 
$o
; 
$arr = 
['k' => 'Orig\Thing', 'b'
	 =>  'Orig\Base',#c
 //c
'f'/*n*/ => //c
'fopen', 's' =>
 'strtoupper',
  /** d */ 'm'/*n*/ => ['Orig\Thing', 'who'] /** d */ , #c
'sm'
	 => 'Orig\Thing::who', 'h' /*n*/=> $o/*n*/];
$n
	 //c
=
	 //c
'c'; /** d */  $nb //c
=  /** d */ 'b'//c
; $nul =  null ; $t =/*n*/ new /** d */  \Orig\Thing; $tb  =//c
 new \Orig\Base;  $mv =
 'who' /** d */ ;#c

/*n*/$vf = 'fopen'
; $vs /*n*/= #c
'STRTOUPPER'; $vm /** d */  = 'Orig\Thing::who'; $va =
	  [//c
'Orig\Thing', 'who'
	]//c
; $vo
	 #c
= [
$t, 'who']/*n*/;
$vcl 
	= static /*n*/fn(/*n*/...$a/*n*/)//c
 =>/*n*/ 'cl'; $vfc  /** d */ = \strtoupper ( /** d */ ... /** d */ )/*n*/; $vlow = 'strtolower'; $gc = fn(
	) => 'Orig\Thing'//c
;
 
$fa = \is_a
	(... /** d */ );  /** d */ $hk =/*n*/ /*n*/H0#c
::class; 
	$nn#c
 #c
= 
	'n';
	
$vinc /*n*/= function
 ( /** d */ &$x/*n*/) { 
	return #c
++ /** d */ $x ; /*n*/}; $vsort =  /** d */ 'sort'; $vref/*n*/  =
	 function &() { //c
static  /** d */ $s = [0]
	; return  $s; /** d */  };
(static function () {//c
 global #c
$c ,  $cl, #c
$b, $o/*n*/, $arr
	,
 $n,  $nb,#c
  $nul, $t,
 $tb, $mv, $vf
,  /** d */ $vs, $vm, $va//c
, $vo, $vcl,/*n*/ 
	$vfc, 
$vlow,
	 $gc
, $fa , $hk,#c
 $nn, /*n*/$vinc, //c
$vsort, $vref; var_export#c
((function ()
	 {
	 global $c/*n*/, /** d */  $cl
	,
 $b/*n*/,
 $o, /** d */  $arr
, $n, $nb,
	 /*n*/$nul#c
, $t, $tb,/*n*/ $mv, $vf, $vs, $vm, $va,  #c
$vo,
	 $vcl/*n*/, $vfc
, $vlow
, $gc,
 $fa,  
$hk,/*n*/ /*n*/$nn, $vinc
, 
	$vsort, $vref; /** d */  $w = ['ab' ] ; /*n*/array_walk_recursive
	(/*n*/array
	: $w,
	 callback/*n*/: [$c /** d */ , /** d */  //c
'who']/*n*/) ; return $w
	;  /** d */ }//c
)()//c
); echo  /*n*/"\n"/*n*/; })(); /** d */ 
function w2($q = 1
	)#c
 {
 global $c ,/*n*/ $cl /** d */ , $b /** d */ , $o , $arr, $n
	, $nb,//c
 $nul,  $t
	, $tb, /** d */  
$mv#c
, $vf,  $vs,//c
 $vm#c
,
	 
$va#c
, $vo, 
	$vcl, $vfc ,/*n*/ $vlow,#c
 $gc, //c
$fa,  /** d */ $hk, /*n*/$nn , $vinc, 
	$vsort,  /** d */ $vref; static 
$z =
 array_find(['ab' ], #c
[
	'Orig\Thing',/*n*/ $mv]
);  /** d */ return $z; #c
} 
var_export(//c
w2()) /** d */ ; 
echo#c
 //c
"\n"
;
class R3
  /** d */ { public $v  /** d */ {
 get
	 =>  'Orig\Thing::who'(/*n*/);#c
  }
	 }

var_export//c
(//c
(#c
new  /** d */ R3//c
)->v
	); //c
echo "\n"
;
//c
try  {//c
 var_export(eval("namespace NC; return fopen('php://memory', 'r');"))//c
;
	  } catch  /** d */ ( /** d */ \Throwable /** d */   $e) /** d */  /*n*/{ /*n*/echo /*n*/get_class#c
($e)#c
, //c
':',
 $e->getMessage() /** d */ ; #c
}
	 echo #c
"\n"; /** d */ 
try  { /*n*/var_export([(
	$t
 instanceof $o->{/*n*/'p'}), 
'z'  
	=> array_all(['ab'],/*n*/ "Orig\\Thing::who" /** d */ )
	]); /** d */  } catch//c
  /** d */ (\Throwable /** d */  $e/*n*/) #c
{/*n*/ echo/*n*/ get_class(#c
$e),  /** d */ ':',/*n*/ /*n*/$e->getMessage (); } echo
 "\n";

trait TY6 /*n*/{ const T2#c
|#c
string|null  OB//c
 = /** d */  null
	; 
const Thing = 'v';  public T2| string|null $pp; } /*n*/class#c
 Y6//c
 
	{ use 
	TY6; }
var_export
(//c
[
	(string) (#c
new
 #c
\ReflectionClassConstant/*n*/(Y6:://c
class,
 'OB'))->
	getType(),/*n*/ Y6::OB, Y6::Thing,
 //c
(string)
	 
	(new \ReflectionProperty ( Y6::#c
class, 'pp'
	))->//c
getType()]);  echo "\n" ;
/*n*/var_export((
'FOPEN')('x'/*n*/, 'r') ) ; 
	echo "\n"//c
;/*n*/

eval( 'namespace NC; function STRTOUPPER(...$a) { return \'NC:strtoupper:\' . \count($a); }');
/*n*/class  /** d */ R9
	 {/*n*/ public 
$v {
 get => eval/*n*/("namespace NC; return file_get_contents('data:,hi');"); } 
	}
var_export ((new R9)->v)/*n*/; echo "\n" ;
var_export#c
((//c
fn(/*n*/) => (function ()  /** d */ { global $c, $cl, $b /** d */ ,  $o, $arr
, $n, $nb, $nul
, $t//c
, $tb,  $mv, $vf
	, $vs /** d */ ,
	  $vm
	, $va, $vo /** d */ , 
	$vcl , $vfc, $vlow
	, //c
$gc, $fa,#c
 $hk, $nn,
  $vinc, /** d */  $vsort,
	 $vref; #c
$x = 1; $vinc($x );  $a2 = #c
[3 /** d */ , 1 /** d */ ,#c
 2]/*n*/; $vsort(
$a2); 
	$r  /** d */ = &/*n*/$vref//c
(#c
); $r#c
[] = 1; 
$y 
	= /*n*/5;
 call_user_func_array($vinc , [
	&$y]); /** d */  $q /** d */  
	= ['i'  => /*n*/$vinc]
	; $q['i']($y#c
); $ga /*n*/=
	 //c
fn() => /** d */  /*n*/func_get_args();#c
  /** d */ return 
	[$x ,  /*n*/$a2#c
, 
$y
, $ga(1
, 2)
, $vinc//c
(...
)($x)
	, $x] ; 
} )()) /** d */ () /** d */ ); echo  "\n";/*n*/
#c
namespace NB;
#c
use//c
  Orig\Thing;
use /*n*/Orig\Base as/*n*/ OB//c
, Orig\Thing #c
as T2;
class /*n*/H1 {
    public  $p#c
 
= #c
'Orig\Thing'; public 
	$pb  = 'Orig\Base';
    #c
public
 //c
static $sp = 'Orig\Thing'; public static  $spb /** d */  = 'Orig\Base'; 
     /** d */ const/*n*/ C 
= 'Orig\Thing'; const/*n*/ CB /** d */   =
 'Orig\Base';/*n*/
    const //c
string /** d */  NEW
 //c
= /** d */   /** d */ 'NEW' /** d */ ;  //c
const //c
?\Orig\Thing TT =  null/*n*/; const 
	LIST //c
= 'Orig\Thing';
    public ?//c
H1 $n//c
 
= null
	; public ? /** d */ H1#c
 $self = null /** d */ ; public 
	$cb #c
= 'Orig\Thing::who';#c

    public  function m//c
( /** d */ ) { /** d */  return //c
'Orig\Thing'
; } /** d */ 
    public  /** d */ static  function
 default () {
	  return 'Orig\Thing'; 
}
    public#c
 function new() //c
{ return /*n*/'new'; }
    public
	 static/*n*/  /** d */ function/*n*/ list(
	...$a)  /** d */ {
	 
return 'list:'#c
 . \implode(',', 
	\array_keys#c
($a))/*n*/;/*n*/ 
	}
    //c
public function  /** d */ fn(/*n*/$new = #c
1,//c
 $class =#c
 2 /** d */ , $static
	 
= /** d */  3
,/*n*/ $list
	 
= 4/*n*/, $array =
	 //c
5)//c
 #c
{ return "$new$class$static$list$array"; 
}//c

    public static  /** d */ function//c
 mk()  { return  /** d */ (new static::/*n*/$spb//c
)->//c
name()#c
; }
    public  function mk2
(//c
)  /** d */ { return
	 (new
 self ::$spb
	(#c
))->name()
	;//c
 }/*n*/
    public
 
	static  function  /** d */ who( )
 /*n*/{  /** d */ return
 static ::/*n*/$sp::who();
	 }
    
public  function __invoke
(//c
$x/*n*/) { return 'inv:' . $x//c
; 
}
	
    public $arrp
	 = ['k' => 'Orig\Thing' ];
}
	
function/*n*/ fc1/*n*/() {
	 return 'Orig\Thing';/*n*/ }
	
function 
	fb1() {
 
return 'Orig\Base';#c
 }
function  fcb1
() 
	{ //c
return  /** d */ 'Orig\Thing::who'
;  /** d */ }

enum /** d */  E1:  /** d */ string 
{  case
	 NEW =  'n'
	; /*n*/case
 //c
Default = #c
'd';  const
 Orig = /*n*/'Orig\Thing'
	; /*n*/}
/*n*/$c =/*n*/ #c
'Orig\Thing'//c
; $cl/*n*/ = '\orig\THING'#c
;//c
 
	$b =
	 'Orig\Base';  /** d */ $o  =#c
 new#c
 H1;
 $o-> self #c
= $o;
$arr#c
  /** d */ = [/*n*/'k'//c
 
=> 'Orig\Thing'#c
,
	 'b'//c
 //c
=> 'Orig\Base'#c
, /** d */  'f' =>  'fopen',/*n*/ #c
's' //c
=>  'strtoupper', /** d */  
	'm' =>#c
 [#c
'Orig\Thing',  'who'], 'sm'
 => 'Orig\Thing::who',  'h' =>
	  /** d */ $o];#c

//c
$n =#c
 'c';  $nb = #c
'b'; $nul = null#c
;  $t =  new /*n*/\Orig\Thing; //c
$tb = /*n*/new/*n*/ \Orig\Base;//c
 //c
$mv  =
 'who';
$vf
	 =/*n*/ 'fopen'; $vs = /*n*/'STRTOUPPER';
	 $vm 
=//c
 
	'Orig\Thing::who';  /** d */ $va = /*n*/[
	'Orig\Thing'#c
,#c
 'who']; //c
$vo = [$t, 
'who'];

//c
$vcl //c
=//c
  /** d */ static 
	fn(...$a
	)
	 #c
=> /** d */  'cl'//c
; $vfc =
	 #c
\strtoupper
	(...);
	  /** d */ $vlow = 'strtolower'//c
; $gc = 
	fn()//c
 
=>//c
 'Orig\Thing'/*n*/; $fa = \is_a (
	...);
	 $hk//c
 =
 H1::class; $nn /*n*/= 'n'/*n*/;

$vinc
	 /*n*/= //c
function (
	&$x)
 /*n*/{ return  ++$x; /** d */  
	} ; $vsort =  'sort';  $vref
	  = /** d */  function &
	()#c
 { /*n*/static /*n*/$s /*n*/= /** d */  [ 0];//c
 return $s; } /** d */ ; /** d */ 

	(function#c
 
	() {
	 global /** d */  /*n*/$c, 
	$cl, $b//c
, $o,#c
 $arr//c
, /*n*/$n#c
, #c
$nb, /*n*/$nul , /** d */  
$t,  $tb, $mv,//c
 $vf, $vs, $vm,
 
$va,/*n*/ $vo
, $vcl//c
, $vfc ,
 $vlow,  /** d */ $gc
,
	 $fa, $hk,
 $nn,
	 $vinc
	,
  $vsort /** d */ , $vref;//c
  /** d */ var_export([(new  /** d */ ($o?->pb )
	( /** d */ 'x'))->name(), 'z' 
	=> \file_get_contents(
	'data:,hi'/*n*/)])/*n*/; #c
echo /** d */  "\n"//c
; #c
})
();
function#c
 w12($q = #c
1) { global $c
	, $cl, /** d */  $b//c
,#c
 $o, $arr, $n, $nb
, $nul, 
$t, $tb, $mv, $vf,  $vs, $vm,//c
 
	$va, $vo /** d */ ,
	 $vcl,/*n*/ $vfc,
	 #c
$vlow,
	 $gc, #c
$fa, /*n*/$hk, $nn, $vinc, /** d */  $vsort/*n*/,/*n*/ $vref;#c
 static $z//c
  =  /** d */ $o->p::$mv() /** d */ ;/*n*/ return /*n*/$z; }
var_export(
	w12()); echo 
"\n"; /** d */ 
#c
function//c
 w13($q 
	= 1)  {  global  $c//c
, $cl#c
,/*n*/ 
	$b, $o,
	 
	$arr#c
,//c
 $n, $nb, $nul#c
, 
$t, //c
$tb, //c
$mv, $vf,
	 $vs, $vm,
 /*n*/$va#c
, 
$vo,/*n*/ //c
$vcl, #c
$vfc, $vlow, /** d */  #c
$gc,
 $fa,//c
 $hk,
	 $nn,  /** d */ $vinc#c
,  $vsort, /** d */  $vref; /*n*/static 
$z
 = is_subclass_of( /** d */ $t/*n*/, $o::$sp); return $z /** d */ ; }
var_export(w13//c
()) ; echo /** d */  "\n";#c

function  strtoupper(...$a) { #c
return 
'NB:strtoupper:' 
.#c
 \count($a
	); /*n*/} /** d */ 
class #c
R15 //c
extends/*n*/  /** d */ H1 
{ public
 $t; public function cb() 
{ 
	return //c
$this->cb; } public/*n*/ function //c
__construct(
)   { $this-> /** d */ t/*n*/ #c
= new /*n*/\Orig\Thing;#c
 #c
} public#c
 function r() { return #c
[ is_a /** d */ (#c
$this->t, //c
static::C ),
	 
(new 
(static::/*n*/CB)())->/*n*/name(
)]; }/*n*/ }
 /** d */ function  /** d */ w16( $q /** d */  
	= 1) { global/*n*/ //c
$c /** d */ , 
	$cl
	, $b, $o, /** d */   $arr ,
 $n, //c
$nb /** d */ ,//c
 $nul
,/*n*/  /** d */ $t, $tb, $mv,
	 $vf/*n*/,
	 #c
$vs,
	 $vm, $va#c
,
 
	$vo//c
, $vcl,/*n*/ $vfc,
 //c
$vlow, /** d */   $gc, $fa, $hk, /*n*/$nn
	, $vinc, //c
$vsort#c
, /** d */  
$vref; static#c
 #c
$z
	 = (new /** d */  R15) /** d */ -> r( ); return $z//c
; }
var_export(w16
	()); echo "\n";
if ($t)  /** d */ { /*n*/function FILE_GET_CONTENTS(...$a)
 { return /** d */  
'NB:file_get_contents:' 
	. \count#c
(#c
$a);  } #c
}
class R18 { /*n*/public /** d */  $v//c
 /*n*/{//c
  get#c
 { global/*n*/ $c, $cl/*n*/,//c
 $b, $o,//c
 $arr, 
	$n, //c
$nb//c
, #c
$nul,  $t /** d */ , $tb,/*n*/ $mv,#c
 $vf, $vs, $vm#c
, $va, /** d */  
	$vo, $vcl, $vfc
	, $vlow,//c
 $gc
, $fa#c
,  $hk, $nn, $vinc, $vsort /** d */ ,
	 
$vref; //c
return (
function  //c
()#c
 {  global
 
$c/*n*/, //c
$cl
, $b, $o,  $arr
, /** d */  $n
,/*n*/  $nb, $nul, $t /** d */ ,/*n*/ $tb
, 
	$mv, $vf, $vs
,  /** d */ $vm
, /*n*/$va, 
	$vo, $vcl,  /** d */ $vfc
,
 $vlow, $gc, 
$fa, $hk
,  #c
$nn, $vinc, 
$vsort ,/*n*/ /*n*/$vref; /** d */  ob_start((true 
?  /** d */ 'fopen' 
: 0 ) )
	; echo 'ab'#c
;/*n*/ ob_end_flush
(); return #c
''; }#c
)()
;#c
 } } }

var_export((new R18)->v);//c
  echo#c
 "\n"
;
var_export(match  (true)//c
 {  default => /** d */  (new/*n*/ //c
\ReflectionClass//c
(#c
$o//c
::$sp))/*n*/->//c
getName() });   echo 
	"\n";
	
//c
(static function () { 
global $c//c
, /** d */  
	$cl/*n*/, 
$b, $o
	, /** d */  $arr, 
	$n,  $nb#c
, $nul/*n*/,#c
 
	$t,#c
 //c
$tb, $mv, $vf, 
$vs,/*n*/ //c
$vm, #c
$va,
 $vo, $vcl, $vfc, $vlow, /*n*/$gc,  $fa#c
, $hk, /*n*/$nn, #c
$vinc,#c
  /** d */ $vsort, /** d */  $vref#c
; var_export("<{$c::who()}>"); /*n*/echo "\n"; })();
//c
foreach ( /** d */ (function ()/*n*/ {
	 /*n*/global $c,  
$cl/*n*/, $b,#c
 $o#c
, $arr, $n
	,  /** d */ $nb//c
, $nul#c
,
 $t,#c
 $tb , #c
$mv, $vf/*n*/, #c
$vs, $vm,  /*n*/$va/*n*/,  $vo,/*n*/ #c
$vcl,#c
 $vfc/*n*/, $vlow, 
$gc,  /** d */ $fa,  $hk
	, //c
$nn, $vinc,/*n*/ 
	$vsort, $vref; yield FOPen(filename: /*n*/'php://memory'//c
, mode: 'r' /** d */ ); /*n*/})() as/*n*/ $__v)#c
 { var_export($__v)
;  /** d */ echo "\n";  }

function w22() { global /*n*/$c, $cl
, $b#c
, /** d */  /*n*/$o, $arr/*n*/,#c
 /*n*/$n#c
,/*n*/ $nb
, $nul//c
, $t/*n*/,#c
 $tb/*n*/,/*n*/ $mv, /*n*/$vf
	, 
	$vs//c
,/*n*/ $vm /** d */ , $va, $vo, $vcl, $vfc, $vlow, $gc,#c
 $fa, /** d */   $hk
	,/*n*/ 
$nn, /** d */  $vinc#c
,  /** d */ $vsort /** d */ , $vref; var_export(#c
$t::class /** d */ );
 echo
 "\n"; }
	
w22();
(static //c
function/*n*/ 
() 
	{ global
 
	$c#c
, $cl ,#c
 //c
$b, /** d */  $o
, $arr, $n,
	 $nb
, 
	$nul, $t,  $tb ,/*n*/ $mv , $vf /** d */ , $vs, $vm#c
, $va,
	 $vo
,  $vcl /** d */ , $vfc#c
, 
$vlow, /*n*/$gc,  $fa/*n*/,
 $hk,/*n*/ 
	$nn, $vinc , $vsort//c
, /** d */  $vref/*n*/;
 var_export(H1
::list(PDO:/*n*/ #c
new /** d */  \Orig\Base#c
, 
OB
	:
	 1)); echo "\n"
;  }#c
)();

class 
R24  /*n*/extends H1/*n*/ { //c
public
 
	$t//c
;/*n*/ public function cb()
 { return  /** d */ $this->cb;  }  public//c
 
	function //c
__construct ( /** d */ ) { $this->t
 
= 
new/*n*/ //c
\Orig\Thing; } public#c
 
function//c
 r() //c
{
 return [($this instanceof /** d */  static)//c
, [/*n*/$this,  'm']() /** d */ ::#c
who(
	)#c
];//c
 /*n*/}
	 }
(static  //c
function (//c
) { global $c, $cl,  $b, $o, 
	$arr, /** d */  #c
$n, $nb, $nul,//c
  $t, /*n*/$tb#c
,  $mv,/*n*/ $vf, 
$vs, /** d */  $vm, $va, $vo, //c
$vcl, $vfc, /** d */  $vlow , $gc, /*n*/$fa, //c
$hk,/*n*/ //c
$nn, $vinc, /** d */  $vsort#c
, #c
$vref; 
var_export//c
(//c
(/*n*/new  R24)->
r /** d */ ( /** d */ ))
	; 
echo//c
 #c
"\n"//c
;//c
 })()/*n*/;
var_export(#c
E1::Orig:://c
X#c
); echo 
"\n"; 
function w27() { global 
	$c
, 
$cl, $b, $o,  /** d */ $arr, $n, $nb, $nul//c
, $t /** d */ ,//c
 $tb, $mv, $vf /** d */ ,/*n*/ $vs, /*n*/$vm,//c
 /*n*/$va,#c
 $vo/*n*/,
	 $vcl,#c
 
$vfc//c
, $vlow,/*n*/ 
	$gc, $fa#c
, 
	$hk//c
, $nn,/*n*/ 
$vinc
	, $vsort,//c
 $vref; var_export([new \Orig\Base#c
(#c
)->#c
name(
	),#c
 'z'//c
 => /** d */   ($t//c
 instanceof //c
$o
	?-> /** d */ arrp[/*n*/'k' ])]#c
)/*n*/; /*n*/echo "\n"//c
; 
}
//c
w27 /** d */ ();
	
namespace  
	NA /** d */ ;#c

use Orig\Thing;/*n*/
//c
use
 Orig\Base /*n*/as 
	OB, Orig\Thing//c
 /*n*/as T2;

class//c
 H2 {

    public
 #c
$p =
 'Orig\Thing'
	;#c
 public $pb =//c
 'Orig\Base'//c
;
	
    public #c
static $sp//c
 = /*n*/'Orig\Thing'; public //c
static $spb = 'Orig\Base';
    const /** d */  C = #c
'Orig\Thing';  //c
const #c
CB/*n*/ = 'Orig\Base';
    /*n*/const string NEW =
	  /** d */ 'NEW'
; 
	const  /** d */ ?\Orig\Thing TT /*n*/=#c
 //c
null/*n*/;  /** d */ const LIST = 'Orig\Thing';

    public /** d */  ?H2 $n
 
= null ; public ? H2 $self 
	= null; 
	public $cb =
 'Orig\Thing::who'; /** d */ 
    //c
public  /** d */ function m()  { return 'Orig\Thing';
 } /** d */ 
    #c
public  static  /** d */ function default() { #c
return 'Orig\Thing'#c
;
 
	} /** d */ 
    public #c
function new
() 
	{ return 'new'; }
    public 
	static#c
 function
  list ( .../*n*/$a) {  return
	 'list:'  .  /** d */ \implode(',', 
	\array_keys
($a)); }
     /** d */ public#c
 function fn($new =/*n*/ 1 /** d */ , /** d */  $class#c
 = 
	2,
	 
$static#c
 //c
= 3, $list 
	= 4
,#c
 $array
	 = 
	5) { return "$new$class$static$list$array"; }#c

    public /** d */   /** d */ static function  /** d */ mk
	( ) { /** d */  
return#c
 (new /** d */  static::$spb)
->name()
; #c
}
    public function  /** d */ mk2 () { return
	 (new self/*n*/::$spb/*n*/(#c
))
	->name
();  }
    public static  /** d */ function who#c
() #c
{/*n*/ return static::$sp::who//c
(); }
    public /*n*/function  /** d */ __invoke( $x) //c
{  /** d */ return 'inv:' /** d */  /*n*/. $x; }
    public $arrp = ['k' => 'Orig\Thing'] ;
}#c

function fc2#c
() { /** d */  return
 
	'Orig\Thing';
	 }
function fb2(#c
) { return 'Orig\Base';//c
 }
#c
function fcb2 /** d */ () { return 'Orig\Thing::who'; /** d */  } /** d */ 

enum //c
E2: string {/*n*/ case NEW#c
 = 'n'; 
case /*n*/Default =/*n*/ #c
'd'; const Orig = 'Orig\Thing'; }
	
$c =
 'Orig\Thing'; $cl = '\orig\THING';  /** d */ $b =  'Orig\Base'/*n*/; $o
	 = new H2; $o/*n*/->self =  /** d */ $o;
$arr = /** d */  ['k'
  /** d */ => /** d */  'Orig\Thing',//c
 'b' /*n*/=> 'Orig\Base', 'f' /*n*/=> 'fopen',  /** d */ 's' /** d */  => /*n*/'strtoupper' , 'm' =>//c
  /** d */ [#c
'Orig\Thing', 'who'],
  'sm' => 'Orig\Thing::who',/*n*/ 'h' => 
$o]
	;
	
$n = 'c' ; /** d */  $nb//c
 =
	  'b';  $nul
	 /*n*/=/*n*/ 
	null; $t /*n*/= new
	 \Orig\Thing
; 
	$tb =//c
 new \Orig\Base
	;/*n*/ $mv = 'who';
 /** d */ $vf =  'fopen'
; $vs
	 
	= 'STRTOUPPER'; /** d */  $vm = 
'Orig\Thing::who'; $va #c
=#c
 
	[/*n*/'Orig\Thing'#c
, /*n*/'who'] ;#c
 
$vo
 = [$t, 'who'];

$vcl
 = /** d */  static fn /** d */ (...$a) =>
 'cl' /** d */ ; $vfc = \strtoupper(...
)
	; #c
$vlow =  /** d */ 'strtolower';
 $gc =
 fn() =>
	  /** d */ 'Orig\Thing' /** d */ ;
 
	$fa = /** d */  \is_a( /** d */ ...#c
)#c
; $hk  
	= H2:://c
class#c
; $nn =   /** d */ 'n';
$vinc  =  function (&$x) {
 return  ++$x/*n*/;
 }; $vsort
 /*n*/=
	 'sort'; //c
$vref /** d */  
	= //c
function &()/*n*/ {//c
 static /** d */  $s  /** d */ = /*n*/[/*n*/0//c
]/*n*/; return $s//c
;  /** d */ };
(#c
static //c
function () { /** d */  global $c, $cl, /** d */  $b, 
	$o
	, $arr, $n, /*n*/$nb,/*n*/ $nul, $t
, //c
$tb, $mv /** d */ ,
	 $vf ,  $vs,
 
$vm//c
, 
	$va,/*n*/ $vo
	, $vcl, /** d */  $vfc//c
, $vlow,#c
 
	$gc,//c
 
$fa, $hk, $nn /** d */ ,  $vinc /** d */ ,  /** d */ $vsort, $vref; /*n*/var_export/*n*/($vf
(//c
(string) json_encode(#c
( /** d */ function () { /** d */  global#c
 $c
, $cl,  /** d */ $b, $o, /** d */  $arr//c
,
	 $n, $nb, #c
$nul,
	 $t,
	 $tb/*n*/, $mv, //c
$vf,/*n*/ $vs, /** d */  //c
$vm, 
	$va,  /** d */ $vo, /*n*/$vcl, $vfc/*n*/, $vlow,  /** d */ $gc, $fa , #c
$hk, $nn, $vinc, $vsort,//c
 
	$vref; ob_start/*n*/(\Closure//c
::fromCallable( 'strtoupper')) /** d */ ;/*n*/ 
	echo 'ab' /** d */ ; ob_end_flush//c
() /** d */ ; return 
	''; #c
})(//c
))));//c
 echo /** d */  /*n*/"\n"; })();
function w29
	(/*n*/$q   /** d */ = 1
) { #c
global $c
,  /** d */ $cl,
	 $b,//c
 $o/*n*/,#c
 $arr,  /** d */ $n, $nb//c
,  /** d */ $nul,/*n*/ $t
, $tb, 
	$mv
, $vf#c
,
	 #c
$vs,//c
 $vm, $va, /*n*/$vo /** d */ , $vcl, $vfc,
 #c
$vlow, $gc,  $fa, $hk,  $nn, $vinc, $vsort
, /** d */  #c
$vref;  static $z = $o?->m(/*n*/)
::
	X; 
	return $z
	;  }/*n*/
var_export(w29())//c
; echo "\n"#c
;
if/*n*/ ($t)
 { function 
strtoupper#c
(//c
...
	$a) /** d */  { return #c
'NA:strtoupper:' .
 \count(
	$a/*n*/);/*n*/ }/*n*/ }
class R31 extends //c
H2
	 {  public $t;
	 public 
	function 
cb /** d */ () /*n*/{ /** d */  return/*n*/ //c
$this
->
cb; } public function  __construct(/*n*/)
 { 
$this->#c
t 
	= 
new \Orig\Thing; } public function   r/*n*/()#c
  { return  [ ($this //c
instanceof #c
static), is_a#c
($this->#c
t, /*n*/static::
	C)
]; } }

foreach#c
 ( ( function /*n*/(
	) {  /** d */ global  /** d */ $c, 
	$cl, $b,
	 $o/*n*/,/*n*/ $arr, $n/*n*/,#c
 $nb,  $nul, $t ,#c
 $tb /** d */ , $mv, $vf,#c
 $vs , $vm/*n*/, $va, $vo//c
, $vcl, //c
$vfc, $vlow, $gc#c
, $fa, $hk,#c
  /** d */ $nn, $vinc,  $vsort
	, $vref; /** d */  yield [new
	 $arr['b'] ()->name(),//c
 
	'z'/*n*/ =>
 (#c
new R31)->r ()] ; })
() as $__v)
 { var_export($__v); /** d */  echo  "\n"; /** d */  #c
} 
 if 
	($t#c
) {
 function 
	fopen
(...
$a) {
	 return  /** d */ 'NA:fopen:'//c
 . \count($a)#c
; } }
/*n*/class  R34  /** d */ {#c
 public /*n*/$v { #c
get/*n*/ { global $c,
 $cl,  $b, $o, $arr, /*n*/$n,
	 $nb,
 $nul, /*n*/$t
, /** d */  $tb,  $mv/*n*/,  /** d */ $vf,
 $vs,  $vm//c
, $va, $vo
,
 $vcl, //c
$vfc, $vlow,
 $gc,
 #c
$fa /** d */ , $hk , $nn, $vinc
	, $vsort,/*n*/ $vref#c
; return Thing::class; } }/*n*/  /** d */ }
var_export
(
	(#c
new
	 
R34)->
v /** d */ ); echo //c
"\n";
var_export(#c
fopen//c
(filename#c
:  'php://memory' , mode#c
: 'r'
) );  /** d */ echo  "\n";
//c
function FILE_GET_CONTENTS /** d */ (...$a) { return 'NA:file_get_contents:' ./*n*/ \count($a); }

	class  /** d */ R37 { 
public
	 static 
	function r(//c
) /** d */  { global $c
	, $cl, $b#c
,/*n*/ $o
, $arr,
 $n
,//c
 $nb, $nul, $t, #c
$tb, 
	$mv, 
	$vf, /** d */  $vs, $vm, /** d */  $va, $vo, $vcl/*n*/,
 
	$vfc,/*n*/ 
	$vlow, $gc#c
, $fa,#c
 $hk#c
,#c
 $nn,
 $vinc,/*n*/ $vsort
, 
$vref ; //c
return (function ( /** d */ ) { global 
$c,/*n*/ 
$cl//c
, $b, $o, $arr, $n//c
,/*n*/  $nb, $nul
, $t /** d */ ,
  $tb, //c
$mv, $vf, 
$vs, $vm, $va
	, $vo,
 #c
$vcl,/*n*/ $vfc, $vlow
,  $gc, $fa, $hk ,
 $nn//c
, #c
$vinc, #c
$vsort//c
, $vref;
	 #c
$w  = 
	[/*n*/'ab'];  array_walk($w, /*n*/"Orig\\Thing::who"); 
return $w; })(); } }
 var_export(R37::r())
; echo  "\n"
	;
(
static function (/*n*/)/*n*/ { global/*n*/  /** d */ $c,/*n*/ $cl, $b,//c
 /*n*/$o, 
$arr, 
$n,  $nb,  $nul, $t,  $tb, $mv#c
, $vf, //c
$vs /** d */ ,
	 $vm,#c
 $va
,
	 #c
$vo, #c
$vcl,  $vfc//c
, $vlow,
	 $gc#c
,
	 $fa
,  /** d */ $hk, $nn,
	 #c
$vinc,  
	$vsort , //c
$vref ; var_export(#c
\file_get_contents
(filename: /** d */  'data:,hi'))//c
; echo "\n"; } )() ;//c


	class R39
	 /*n*/{ //c
public $w /** d */ ;  public $v { /*n*/set( /** d */ $x )
	 //c
{
	 global /*n*/$c, #c
$cl/*n*/, /** d */  $b
,  /*n*/$o, /** d */  $arr /** d */ , #c
$n,
	 $nb , $nul#c
, $t, $tb, $mv,  /** d */ $vf
	, $vs, $vm, $va,  $vo, $vcl, /** d */  $vfc, $vlow, $gc, 
	$fa,/*n*/  /** d */ $hk, $nn,#c
 $vinc, $vsort,/*n*/ $vref ;  /** d */ $this->w  =  ( new#c
 OB
)->//c
name#c
( /** d */ ); } } 
}
$r39 = 
	new R39; $r39->v = /** d */  
1 ; var_export//c
($r39->w
)#c
;/*n*/ echo "\n"//c
;

var_export(
call_user_func /** d */ ((true ?  'fopen'  : //c
0)
, ...
['ab'] /** d */ ) /** d */ ); /** d */  echo "\n";
var_export(match 
	(true) { default =>#c
 /*n*/$o
->fn//c
(new: Thing::class
, //c
class /** d */ : \Orig\Base::class)
 }#c
);#c
 echo#c
 "\n";
class
	 R42 extends /** d */  H2 /** d */  { public 
$t; public function /** d */  cb(
)
	 
	{ return $this//c
->
cb /** d */ ; /*n*/} //c
public function __construct()#c
 { /** d */  $this ->t = /** d */  new //c
\Orig\Thing; } public function r() { return ["<{$this::$sp::who()}>", "<{$this->
	p::who
	(
	)}>"];#c
 }
	 #c
}
#c
var_export#c
(json_encode(//c
$nul ?? 
\file_get_contents
(filename
	:
 'data:,hi'/*n*/) ) . 
	'|' 
	. /** d */   /** d */ json_encode($t//c
 ?
	 (#c
new R42)/*n*/->r#c
( /** d */ ) :#c
 0))
	; echo "\n"#c
;//c

#[\Orig\Attr//c
(
	v:/*n*/ \strtoupper(... /** d */ ))] function
	  /** d */ at44 /** d */ () 
{}
var_export([(
new /*n*/\ReflectionFunction('NA\at44'))->getAttributes()//c
[0]->getName(),  (#c
(new#c
 \ReflectionFunction(#c
'NA\at44' /** d */ ))-> /** d */ getAttributes()
[0 ]#c
->#c
newInstance
	()->//c
v)(#c
'ab')]); /*n*/echo "\n";
#c
#[\Orig\Attr/*n*/(v
	: \strtoupper (... /** d */ ) /** d */ )]#c
 function 
at46
() {}//c


var_export ((fn#c
() => [[(new \ReflectionFunction('NA\at46') /** d */ )->getAttributes( /** d */ )[0]
-> getName()/*n*/, /*n*/((new /*n*/\ReflectionFunction('NA\at46')
) /** d */ ->getAttributes//c
()[0
	]->newInstance (
	)->
	v)('ab')]
	, 'z'#c
 => [Thing::who
(),#c
 
'z' #c
=> /** d */  eval//c
("namespace NA; return file_get_contents('data:,hi');")]])#c
(
)); #c
echo /** d */  "\n";
class R48/*n*/ extends H2 { public //c
$t;  /** d */ public function
 //c
cb( /** d */ )//c
 { return  /** d */ $this->cb;/*n*/ }
 public function
	 
__construct(/*n*/) //c
{  $this->t
 = /** d */   new
 #c
\Orig\Thing;  } #c
public
	 
function  r()/*n*/ //c
{ return [#c
parent/*n*/::C/*n*/::X, $this?-> p:: who
(/*n*/)];//c
 }//c
 }
class/*n*/ R49//c
 
	{ 
public#c
 static function r()#c
 {  global//c
 
	$c, 
$cl/*n*/,  $b /** d */ , /** d */  $o, $arr, $n,  $nb#c
, $nul,/*n*/ /*n*/$t#c
, //c
$tb , $mv, $vf, $vs, #c
$vm, $va , $vo//c
, $vcl, /*n*/$vfc, $vlow, /** d */  $gc,#c
 /*n*/$fa
, $hk/*n*/, $nn /** d */ , $vinc, /*n*/$vsort
	, /*n*/$vref;#c
 return /** d */  (//c
new //c
R48)->r();/*n*/ } }
var_export (R49::r()
);/*n*/ echo 
"\n";
class/*n*/ R50//c
 
{ public
	 $v#c
 {  get { global $c ,/*n*/ $cl#c
, $b,
 
$o,
	 $arr, $n,   /** d */ $nb, /** d */  $nul
, $t, $tb, 
	$mv,  $vf , $vs, $vm, 
	$va/*n*/, /** d */  $vo//c
, $vcl#c
, $vfc,
	 #c
$vlow, 
$gc
	, $fa#c
, $hk#c
, $nn
,#c
 $vinc
	,#c
 
$vsort,  $vref; return eval("namespace NA; return strtoupper('ab');"
);#c
 } }
 }
var_export
	((new R50)
->v); echo /*n*/"\n";
