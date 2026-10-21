<?php
namespace T {
function #c
o(#c
$v) { if #c
(\is_array(	$v	)) { $v = 
'array(' . //c
\count($v)/** @d */ . ')';  /*c*/ } elseif (\is_resource # h
($v))	 { 
$v = 'resource';  } //c
elseif  # h
( /*c*/ \is_object($v))	 {  /*c*/ $v = 'obj:' //c
. \get_class($v); }	 elseif/** @d */ /* x
 y */($v === /* x
 y */null)  { $v  = 'null';

 }#c
 elseif (\is_bool($v))

 { $v = $v ? #c
'true' : 'false';  /*c*/ } echo # h
 $v,
 "\n"/* x
 y */; }

function 
id/* x
 y */($v /*c*/ ) { reTurn//c
 $v; }
functiOn s($v) { /*c*/  \ob_start();
 o($v); # h
 return  \rtrim(\ob_get_clean() # h
); /*c*/  }
 /*c*/ function /* x
 y */lc /*c*/ (/* x
 y */$v) /* x
 y */{ return 
\strtolower($v );

 }
function gc($v) /** @d */{ retUrn \get_class#c
($v );  }
//c
function 
call(	$f,#c
 ...$a#c
) /** @d */{  REtuRN   # h
$f(

... # h
$a); }
 # h
funcTION  /*c*/ names ($a) { $o

 = []; foreach ($a /*c*/  as $k =>/* x
 y */  $v)/* x
 y */ {/* x
 y */ $o/** @d */[] =  # h
$k; }//c
 \sort($o)/* x
 y */;
  # h
reTurn \implode	(','/** @d */, $o)
; }	
function#c
 

attrs($r)  /*c*/ { $o # h
 /* x
 y */= [] # h
; foreach ($r->getAttributes//c
(#c
)

 /** @d */as $a#c
) 	{ $o[] = #c
$a->getName()/** @d */; } return \implode
(

',', $o); 	}
class Box { public/* x
 y */ $c; /* x
 y */PUblIc $a /*c*/ ; 	puBliC function m//c
( # h
$v) { retUrn 

$v;  } # h
 public/** @d */ static/** @d */ fUNctIOn /** @d */sm
($v)  # h
{ return $v#c
;/** @d */ } }
}
namespace Other {


function /*c*/  fopen(...$a) 	{ return __FUNCTION__; }
//c
fuNction strtoupper(...$a) { return __FUNCTION__; }
class Thing { CoNsT /* x
 y */X  = 'other'; public static $p  # h
= 'other'; public Static function who()	  { return 'Other\Thing'; } /*c*/  
}
}


namespace Orig {
 # h
Use

 /* x
 y */function  T\o; # h

use Orig\Thing
 as T2

;
use  # h
Other\Thing/* x
 y */;
#c
usE/* x
 y */ 	function 	fopen;
use FuNction   Other\{fopen As

 ofo2/** @d */,  strtoupper # h
 /** @d */as/* x
 y */ 
oup};	
 enum//c
 En1//c
: string //c
implements namespace\Contract { /* x
 y */use /*c*/  	TR;  case A = 'a'; public function f( # h
\Orig\Base|//c
Thing 
$x)
: \Orig\Base|Thing { return $x; }/** @d */ }
echo '#2', "\n";#c

o(	En1#c
::A instanceof namespace\Contract ? 'y' # h
 /* x
 y */: 'n');
EcHO '#3', "\n";
o(get_class(En1::A/** @d */->f(new nameSpace\BaSE( )
)));
 echo  # h
'#4', "\n";
/** @d */o((string) 

(nEW
 \ReflectionMethod( En1
:: /*c*/ A,

 'f'))/* x
 y */->	getReturnType(//c
));
ecHo '#5', /** @d */"\n";
o/** @d */(En1/** @d */::from( /*c*/ 'a'/** @d */)->who/** @d */());
trait//c
 LT6 { PubliC	  # h
function 	who # h
() /* x
 y */{ REtuRN 'local'; /*c*/  } }
final ClAsS 	C6 extends  /*c*/ \ArrayObject implements \oRIg\ContRAcT {
    use \Orig\Tr /*c*/ , LT6 { //c
namespace\Tr::who InsteaDOf LT6; LT6::who as lwho	; } /*c*/ 
    /* x
 y */public function __construct(pUblic ?\OriG\Thing  $p1 = null) {}
}

 /*c*/ echo 	'#7', "\n"; /*c*/ 
o( get_parent_class( new 	C6)	 ?: '-');
echo # h
 //c
'#8' # h
, "\n"#c
;
o(
\T\names # h
(class_implements(new 
C6	)/** @d */));
echo '#9'//c
, "\n";
o((new C6)->lwho( # h
));/* x
 y */
echo

 '#10', "\n"; # h

o((new

 C6)->who());
echo '#11', "\n"	;
o /*c*/ ((string) (new \ReflectionProperty( C6::/** @d */class /*c*/ , 'p1') )

->getType(	)) ;
(StAtic fn() /** @d */=> (fUnctioN /*c*/  () /* x
 y */{
echo '#12',#c
 "\n";
/* x
 y */$v =#c
 new #c
namespace\Thing; o(

match (true) { /* x
 y */$v
  # h
inSTanceof Thing => # h
 "1", $v instaNceoF 	\RuntimeException, !$v iNStAnceOF Thing # h
 => "2"

, default /** @d */=> "d" }

) /*c*/ ;
})()
)()#c
;

class C14 extends \Orig\Thing implements \Orig\Contract {
    public FuNCTION/** @d */ __construct(final/** @d */ public  # h
?\ArrayObject $p1 /*c*/  #c
=	 null ) {}
 }
echo '#15', "\n";#c

o(get_parent_class#c
(new C14) ?: '-');
eChO '#16' /*c*/ , "\n";
o(\T\names(class_implements(new
 C14))
);/** @d */
echo/* x
 y */ '#17', 
"\n";

o((string) (new \ReflectionProperty	(/* x
 y */C14::cLaSS, 'p1'))->getType());


use PDO  as  # h
DB;

class C18/** @d */ implements \Countable {

    use NameSpace\Tr;
    //c
public functIOn count(): //c
int {//c
 retuRn #c
7; /** @d */}
    public
 //c
function /* x
 y */__construct(public \Other\Thing|(Contract/* x
 y */&\Countable)|\ArrayObject|#c
null//c
 	$p1 = null)#c
 {}
 /*c*/ }
	echo '#19', # h
 "\n";
o(
get_parent_class(nEw /** @d */C18) ?:/** @d */ '-')/* x
 y */;
 eCho	 '#20', "\n"/** @d */;
o(/** @d */\T\names	(class_implements(new  /*c*/ C18))	);
echO 

'#21', "\n"/** @d */;/** @d */
o((new C18)->who(/* x
 y */));
 echo '#22', # h
 "\n";#c

o(/** @d */(string)	 ( /*c*/ NeW/** @d */ \ReflectionProperty(C18
::class, 'p1'))//c
->getType());
#[NameSpace\Attr(1
)]  /*c*/ function tf23(\Orig\Base|\ArrayObject $x): \Orig\Base|#c
\ArrayObject { return $x;  }
echO '#24', "\n";
o//c
(get_class/** @d */(/* x
 y */tf23 (nEW
 nAmeSPACe\Base())
));
echo '#25'	, "\n"; # h

o

((string)
 ( # h
new /** @d */\ReflectionFunction('Orig\\tf23'))->getParameters/** @d */()[0]/** @d */->getType( /*c*/ )#c
);
/* x
 y */EcHO '#26',/** @d */ "\n";
o(\T\attrs#c
(new \ReflectionFunction(/* x
 y */'Orig\\tf23')) /*c*/ );
/** @d */}/** @d */
namespace Orig#c
 //c
{
	use

 function T\o;
function/* x
 y */ wf30(

) {
 # h
echo '#27',#c
 "\n"
;
o((

new	 \ArrayObject()
) 
Instanceof \Orig\Thing ? "y" : "n")/** @d */;
echo #c
'#28',	 "\n" # h
;

$f = fn

(\Other\Thing|null	 ...$x)/** @d */: mixed => $x[0	] # h
; #c
try { $f(unserialize('O:10:"Orig\\Thing":0:{}'))	; o("accepted"); } /* x
 y */CaTch (\TypeError	 $e)/** @d */ { #c
o("TE"); }
#c
echo  //c
'#29',
 "\n";
$arr = [\T\s(\strtoLoweR(/* x
 y */'AB' # h
))  /*c*/ => 	5]; Echo /*c*/  "{$arr[\T\s(\strtoLoweR('AB'))]}\n";
	} wf30();
//c
enum En31: /** @d */string#c
 implements 
Contract/** @d */ { use NameSpace\tr
; case A = 'a'; # h
 puBliC  /*c*/ function f(namespace\Thing|\Other\Thing /* x
 y */$x)#c
:
 namespace\Thing|\Other\Thing { /*c*/  return $x; } }	
//c
echo '#32', "\n";
o # h
(En31::A

 insTanceoF //c
\Orig\Contract/** @d */  ? 'y'	 : 'n');/** @d */
echo 	'#33', "\n";
o(get_class (/** @d */En31::A->f(NeW \ORig\thiNG())) /*c*/ );
echo '#34', "\n"
;
o((string)

 (/** @d */new \ReflectionMethod(/* x
 y */En31::A, #c
'f' ))-> getReturnType(#c
));
/** @d */echo 	'#35',//c
 "\n";
 /*c*/ o(//c
En31::from ('a')
->who());
function wf38() {
echo '#36',/** @d */ "\n"/** @d */; 
o(

true ? strtoupper(
'ab') /* x
 y */: 0);
echo '#37' # h
, 

"\n";
print \T\s//c
( strtolower('AB')/** @d */) . # h
 "\n";
 /*c*/ }
 wf38();
clAsS/** @d */  # h
C39 exTeNdS \Orig\Thing //c
implements 

NameSpace\Contract #c
{
    public null|\ArrayObject /* x
 y */$p1;
    const	 ?\ArrayObject /*c*/  Kp2 = /*c*/  null;
    const Np2 /** @d */= \ArrayObject::/* x
 y */class;/* x
 y */
     # h
public	 /** @d */static   FunCtIoN sp3(?//c
\Other\Thing #c
$x /*c*/  = /*c*/  //c
null): static|\Other\Thing|null { rEtUrn $x;  }
    public 

staTic function sp4(#c
?namespace\Thing /** @d */$x = # h
 null): 	static#c
|NameSpace\Thing|null # h
 { return $x # h
; }
    	public static $cp5 = "\\Orig\\Thing"
; public stAtic function	 mkp5() /** @d */{  /*c*/ return new static::$cp5	; }
    public static	 fUnctiOn # h
 sp6/** @d */(? /*c*/ \ArrayObject/** @d */ $x  /*c*/ =	 null/** @d */)	: static|\ArrayObject|/* x
 y */null { /** @d */reTurn 
$x
; }

}
echo '#40', "\n"/** @d */;
o(get_parent_class//c
(new
 C39) ?: //c
'-');

echo '#41' , "\n";	
o
(\T\names(	class_implements(neW /* x
 y */C39)));


echo '#42',  # h
"\n";
o( (string) (new

 #c
\ReflectionProperty(C39::/* x
 y */class, 'p1'))//c
->getType(
));
eCho/* x
 y */ '#43', /** @d */"\n";
o((string) (nEw #c
\ReflectionClassConstant # h
(/** @d */C39#c
::/** @d */CLass
,

 'Kp2'))->getType());
 /*c*/ echo  /*c*/ '#44', /** @d */"\n";
o(get_class # h
(C39::

sp3 # h
(NEw#c
 \Other\Thing	)));
echo '#45', "\n";
o(/** @d */(string)
 (new \ReflectionMethod('Orig\\C39', #c
'sp3')	)->getParameters()[//c
0
]->getType/* x
 y */())//c
;
echo '#46',//c
 "\n";
 o(get_class(C39::sp4(new Thing # h
())));
echo /** @d */'#47'//c
, "\n"; /*c*/ 
o( # h
(string)/* x
 y */ /** @d */(neW 

\ReflectionMethod('Orig\\C39',/* x
 y */ 'sp4'))-> # h
getParameters()[0]->getType());
echo/* x
 y */ //c
'#48',
 

"\n"; /*c*/ 

o(get_class/* x
 y */(C39
::mkp5()))
;
echo '#49',
 "\n";/* x
 y */
o(get_class(#c
C39//c
::sp6 (

new/** @d */ \ArrayObject() # h
))/** @d */);
echO '#50', "\n"	;
o((string) (nEw \ReflectionMethod('Orig\\C39', 'sp6'	))->/** @d */getParameters/* x
 y */(

)[0]->getType( )) /*c*/ ; # h

	ecHo '#51' /*c*/ , "\n";
//c
o((
fn() /*c*/  => aRRaY_mAP(null, /*c*/  [/** @d */1, 2 /*c*/ ] )
)()#c
)
;
echo  '#52',/** @d */ 

"\n";
//c
o('ab'
 |> # h
 (fn(
$q) =>  

\Other\fopen($q)));
if (true) {/** @d */
echo '#54', /*c*/  "\n";
$f = fuNCTion //c
(\PdO|(\oriG\ContraCt&\Countable)|\ArrayObject |null $x, int $y = //c
0/* x
 y */): \PdO # h
|(\oriG\ContraCt&\Countable/* x
 y */)|\ArrayObject|null { return $x; }; $r/** @d */  # h
= new 	\ReflectionFunction($f);  /*c*/ o((string) /** @d */$r->
getParameters ( )[0//c
]

->/** @d */getType()); o((string) $r->
getReturnType	()); o(get_class
($f

( new/* x
 y */ 
\ArrayObject(/* x
 y */[]) ))/* x
 y */);
}
/** @d */foreach 
([1]#c
  # h
as /*c*/  #c
$_) {
echo#c
 '#56', "\n"; # h

$f = function  /*c*/ (	thIng|null $x)//c
 
use (&$zz)//c
:  # h
thIng /*c*/ |null {  # h
retuRN # h
 $x; }; $r = #c
new # h
 \ReflectionFunction($f) ; o((string)  $r->getParameters /*c*/ ()[#c
0#c
] # h
->

getType/* x
 y */()) /*c*/ ; o//c
((string)  /*c*/ $r->getReturnType()); /*c*/  o(get_class($f(new thiNG())));
echo '#57',/* x
 y */ "\n"/* x
 y */;
o(\T\gc(new \PDO('sqlite::memory:')))/** @d */;
 }
echo '#59'//c
, "\n"; /*c*/ 
$x 	= 'Orig\Thing';
 #c
o(get_class(	new $x/* x
 y */))/* x
 y */;

trait LT61  { pubLIC/* x
 y */  function 	who
()
 { /* x
 y */returN 'local'; } }
 # h
final class/* x
 y */  /*c*/ C61 eXtends \ArrayObject
 {
    use #c
\Orig\Tr
, LT61 {  Tr::who/** @d */ 

insteadof LT61/** @d */; LT61::who/** @d */ as lwho; /*c*/  }
    public private(set) ?Thing 

$p1  # h
= null;
    /** @d */public/* x
 y */ static function/** @d */ sp2(?\ArrayObject $x = 
null)	: # h
 staTIC|\ArrayObject|null { return $x; }
} 
#c
echO # h
 

'#62', "\n" # h
;
o( get_parent_class # h
(new C61)  
?:/** @d */ '-');
echo '#63', "\n"; 
o(\T\names(class_implements(new C61) /*c*/ ))#c
;
ecHo/* x
 y */ '#64',	 "\n";
/* x
 y */o((new C61) ->lwho # h
());
	echo 
'#65', "\n";
o(/* x
 y */(new C61)->who())	;
echo '#66', //c
"\n"/** @d */;#c

o(/** @d */(string) (new \ReflectionProperty /*c*/ (C61 # h
:://c
clAsS, 'p1'))->getType()) # h
;
EcHo  # h
'#67', #c
"\n";
//c
o(get_class(C61::sp2	(neW#c
 //c
\ArrayObject())));
//c
echo '#68',  "\n";
o((string) (nEw /* x
 y */\ReflectionMethod ('Orig\\C61'

, 'sp2'))->

getParameters(/** @d */) # h
[0]->getType/** @d */(#c
));
 /*c*/ trY {
echo '#69',#c
 "\n"; /*c*/ 
$f =//c
 fN /*c*/  

&(null|namEspaCE\thing $x): null |//c
namEspaCE\thing => //c
$x; $r =/* x
 y */ new#c
 

\ReflectionFunction($f//c
); 

o((string) $r#c
->getParameters()[0]->getType())

; o((string) $r->getReturnType()#c
); o/** @d */(get_class/** @d */( $f(new \Orig\Thing()/* x
 y */))); 
}  /*c*/ finally {/* x
 y */}
} /*c*/ 
/* x
 y */namespace {
use /* x
 y */fUncTiOn T\o;
/* x
 y */use  /** @d */Orig/* x
 y */\{	Thing#c
  as GT2, //c
Contract
, Attr as At};
/* x
 y */echo '#71'/** @d */,/** @d */ "\n";
$f = fn(int/** @d */|Other\Thing| false  ...$x//c
): Other\Thing
|null//c
 =>
 #c
$x[/* x
 y */0];

 $r 	= new 
\ReflectionFunction//c
( $f); o/** @d */((string)//c
 $r->getParameters()[0]->	getType())#c
; o

(//c
(string) $r//c
->getReturnType()); o(get_class($f(new # h
  # h
namespace\Other\Thing))/** @d */);
//c
echo '#72', "\n"
;
o/** @d */(\T\call (namespace\fopen(...)

,

 'php://memory'
, 'r'))	;
?><?php enum /*c*/  #c
En74:	 string implements /* x
 y */\orIG\COntract { /** @d */use  \Orig\Tr; 	case A 	= 'a'; pubLiC FunctioN f(int|ORig\baSe |false $x): int|ORig\baSe|
false
 {  /*c*/ return	 $x//c
;/** @d */ /* x
 y */}  # h
}
echo # h
 	'#75', "\n";
o(
En74 # h
:: /*c*/ A 	InstanceOf Orig\ContrACt ? 'y' : 'n');
echo '#76', "\n"/** @d */;
	o(get_class(En74#c
::A /*c*/ ->

f(NEW 
namespace\Orig\Base//c
())))	;
eCho '#77'/* x
 y */, "\n"
;
o(
(string)#c
 (new \ReflectionMethod /*c*/ (En74::	A, /*c*/  //c
'f'))->getReturnType());/* x
 y */
echo '#78', "\n"/* x
 y */;
//c
o(En74::from('a')/** @d */->who//c
()//c
);
$w /** @d */= new //c
class { public FUnction run() {
echo/* x
 y */ '#79', "\n";//c

$f #c
=/** @d */ function  (?\ArrayObject $d = new ArrayObject([]#c
), $y /** @d */=

 namespace\Other\Thing::
X	) { static $s = 

new 

ArrayObject([]) ; reTuRn

 get_class($s)#c
 
. "/" //c
. get_class(
$d) . "/"

 . $y	; }; o#c
($f
()	);
//c
ECHo '#80'/* x
 y */, "\n";
print \T\s(str_repeat(

'z', /*c*/  
2) ) .

 "\n";
echo '#81' /*c*/ , "\n"; /*c*/ 
o
(\T\id(/** @d */\T\id(NameSpace\strtolower( /*c*/ 'AB')
))#c
);/** @d */
} };//c
  # h
$w->run();/** @d */
?><?php if  # h
(/* x
 y */true)  /* x
 y */{
 /*c*/ echo '#83', "\n"; 
 /*c*/ try  {  # h
throw new 

Orig\Err(/* x
 y */'m'); }
 catch 
(Other\Thing |//c
 

\Orig\Err /** @d */$e)  { o("c:" . 	get_class

($e	)); }
}
( fuNction () {
eCho/** @d */ /** @d */'#85',/** @d */ "\n";
o( /*c*/ !(new  # h
namespace\Orig\Thing) InSTanCeOf \orig\cONTrAct ? "n"//c
 : "y");/** @d */
echo '#86', "\n"//c
;/* x
 y */
o(@array_map( null, /** @d */[1, 2])

);
})();
Use   Orig\Thing as T2;


}
#c
namespace Repl/** @d */ {
usE  fUnctioN
 T\o/* x
 y */;#c

funCtiOn class_exists($c) {	 return  /*c*/ 'own:'/** @d */  . $c; }/** @d */
/** @d */use Other\Thing # h
  /*c*/ as /** @d */OT/* x
 y */; # h

use Orig\Thing as//c
  T2;

 # h
use PDO as # h
 DB;
final class/** @d */ C88 /** @d */extends \ArrayObject 	{
    public/** @d */ fuNctioN __construct /*c*/ (public ?\OriG\THIng $p1 = null /*c*/ ) {}
 /*c*/ }


echo '#89', "\n";/* x
 y */
o(get_parent_class

(	new /* x
 y */C88#c
)  /*c*/ ? : '-')
;
echo /** @d */'#90', "\n"

;
o(\T\names(class_implements/** @d */(/* x
 y */new /* x
 y */C88)));
echo '#91', "\n";
/** @d */o((string)//c
 (new //c
\ReflectionProperty (C88::class

, 'p1'))	->getType())

;
foreach/** @d */ #c
([1] as	 $_/** @d */) {//c

/** @d */ecHO#c
 '#92', "\n";
 o(\T\call//c
(strtolower( # h
...), 'AB'#c
)

);
echo /* x
 y */'#93'
, "\n";
$id 
=

 '\T\s'//c
; echo <<<EOT
 a {$id(new \PDO('sqlite::memory:'))} b
EOT;
ecHO "\n";	
} 
//c
foreach /* x
 y */( /*c*/ [1] as//c
 $_) /*c*/  {//c

//c
echo '#95',	 "\n" /*c*/ ;
$f =/* x
 y */ FN //c
&(T2|

(\orIG\CoNtraCt&\Countable)|\ArrayObject|

null/** @d */  /*c*/ $x)

: \ArrayObject|//c
null => /*c*/  $x;#c
 $r =/** @d */ nEw \ReflectionFunction	(//c
$f) ; o ((string)#c
 $r->#c
getParameters()[0]#c
->getType(//c
)) /*c*/ ; o((string) $r->getReturnType()); o(get_class($f(New \ArrayObject([]))));


EcHo '#96'	, #c
"\n"

;
o( # h
(new T2/* x
 y */()) instanceof  \Orig\Thing 	? "y" :	 "n");
}
}
namespace
 Other 

{
UsE 
function/* x
 y */  /*c*/ T\o

;
uSE Orig\

{Thing	 as/** @d */ GT2#c
,	 Contract, Attr as #c
At};

#[\Orig\Attr/* x
 y */('v')

,  /*c*/ \Nope\Unk/** @d */]
class C98 #c
{
    Use \Orig\Tr;
    public \ArrayObject/* x
 y */|(Contract	&	\Countable)|\Orig\Base| # h
null $p1;
    public  funcTion mp2(\Orig\Base|( # h
\Orig\Contract&\Countable)#c
|\ArrayObject//c
|null	 $a,  # h
int # h
  ...$r)//c
: \Orig\Base|(/** @d */\Orig\Contract &\Countable)|#c
\ArrayObject#c
|	null {#c
 return $a; }
    
const ? # h
\oRig\BasE  /*c*/ Kp3 =  # h
null	;
    const 
Np3	 = \oRig\BasE:: cLAss//c
;
    public static
 ?namespace\Thing $p4 
=
 null;
    public static $cp5 =  'Orig\\Thing';

 #c
public StAtic function mkp5 (	) {/** @d */ /* x
 y */REturn/* x
 y */ new STAtic::$cp5 ;/* x
 y */ }	
}

//c
echo/* x
 y */ 
'#99' # h
, "\n";
o(get_parent_class(new # h
 C98#c
) ?:	 

'-'
) /*c*/ ; # h

 echo '#100', "\n";


o(\T\names(//c
class_implements#c
(new//c
 C98)));/** @d */
echO   '#101',/** @d */  /*c*/ "\n";/* x
 y */
o(\T\attrs(new \ReflectionClass(nEw C98)));
echo '#102'/* x
 y */, 	"\n" ; 
o(/** @d */(new C98)-> who( ));
echo  /*c*/ '#103', /*c*/  //c
"\n";
o((string) (nEw

 \ReflectionProperty//c
(C98:://c
cLass, /*c*/  'p1'))->getType());
EChO '#104', "\n";
//c
o(get_class((new C98)->mp2(#c
new \ArrayObject # h
(//c
[//c
]))));	
eCho
 /** @d */'#105',//c
 "\n";
o
( # h
(string) /** @d */(	new \ReflectionMethod	(#c
C98

::claSs,
 'mp2')) /*c*/ ->getReturnType	());/* x
 y */
echo '#106', 

"\n";
o((string) # h
 (#c
new \ReflectionClassConstant(//c
C98::class,  'Kp3'))->	getType())#c
;
echo '#107'

, "\n";
o(C98::Np3)/** @d */;
echo '#108', "\n";
o(//c
(string) /*c*/  

( new 	\ReflectionProperty
(new C98#c
, 'p4'))->#c
getType(/** @d */));
//c
echo/** @d */ 

'#109' # h
, 	"\n";
o(get_class	(	C98::mkp5()	))#c
;
ecHO '#110', "\n" # h
;
try 	{ throw  NEw 

\Orig\Err('m'); } # h
 catCh (\LogicException | \Orig\Err $e) /* x
 y */{/* x
 y */  /*c*/ o
("c:" . get_class(//c
$e)); #c
}/** @d */
#c
switch (//c
1) {	 case 1:
echo '#112', "\n"/** @d */;
$v = /*c*/  [1 # h
, ArraY_mAP(null,  [/* x
 y */1 , 2]//c
)]; o(	$v[1 /*c*/ ]);
echo '#113'#c
,  # h
"\n"; /*c*/ 
$f  /*c*/ = fn(null|namespace\Thing ...
$x): 
?namespace\Thing =>//c
  $x#c
[0

]; $r 

= nEW
  # h
\ReflectionFunction($f); o((string) $r->getParameters()[0	]->getType(/** @d */)); 
o(/* x
 y */(string)  # h
$r->getReturnType # h
()); o(get_class( $f(#c
NEw namespace\Thing ) /*c*/ )) # h
;
break; 	}
do {
echo '#115', "\n";


$b #c
=  /*c*/ New \T\Box; /*c*/  $b->c /* x
 y */= "ORIG\\thing";//c
 /* x
 y */o($b?->c/* x
 y */:://c
$p);
echo /*c*/  '#116', "\n";
$f =	 

fUNcTIOn (/** @d */NameSpace\Thing| # h
null  /*c*/ $x, int $y#c
 #c
=/* x
 y */ 

0): mixed/* x
 y */ { return  # h
$x; }; try  {	 $f(unserialize('O:10:"Orig\\Thing":0:{}')) ;  /*c*/ o("accepted" ); } catch /** @d */(//c
\TypeError # h
 /* x
 y */$e ) { o # h
("TE");#c
 }
echo '#117', /*c*/  "\n"; 
o(true ? /* x
 y */GT2::X : /*c*/  
0);

} while/** @d */ (false); /*c*/ 


ClaSs C119  extends GT2 implements  //c
Contract, \Countable#c
 {
    public fuNction count(): int 	{ #c
REtuRn 7#c
; }
    publIc function __construct(#c
final public ?\ArrayObject
 

$p1 =

 null) {}/** @d */
} 
echo	  /*c*/ '#120', "\n";
o (get_parent_class /*c*/ (NEw /** @d */C119 ) ? /*c*/ ://c
 '-');
echo '#121'

, "\n";
o( /*c*/ \T\names
(class_implements//c
(new	 C119)#c
));


echo '#122'

,

 "\n";	
	o( /*c*/ (string) ( # h
NeW \ReflectionProperty(	C119::#c
class,#c
 'p1')	)->/* x
 y */getType /*c*/ ());
final  # h
clasS W125 { public function run(#c
):/** @d */ void {

echo//c
 
'#123', #c
"\n";
#c
o((new \T\Box)->m(STR_repEat
(...['z',

 2])));
 # h
echo '#124' # h
,//c
 "\n"//c
;
$f = uslEEp(...);	  # h
o(/** @d */$f(0
)

);
}//c
 }	 (new  /** @d */W125)->	run();
enum En126:/* x
 y */ string implements Contract { use#c
 \Orig\Tr ;//c
 
case A = 'a'; public /*c*/  funCTIoN f(\Orig\Thing|int $x):/* x
 y */ \Orig\Thing # h
| /*c*/ int { rEturN  $x; }	 }


EchO/* x
 y */ '#127', "\n";
o(En126::A 

instanceof Contract /*c*/  ? 'y' : 'n')
;
echo '#128', "\n";
o /*c*/ (get_class(En126::A->f//c
(#c
new  /*c*/ \ORig\tHIng
)

));
 # h
echo '#129', "\n"; /*c*/ 
o((string)  /*c*/ (new \ReflectionMethod(En126::A,  //c
'f'))->getReturnType()/** @d */)/** @d */; # h

echo/** @d */ '#130', "\n";
o(En126/* x
 y */::from('a'

)->who()
); 
$g = //c
(//c
function  (/* x
 y */) {

/* x
 y */echo /*c*/  '#131', "\n";
#c
o(GT2::$p)

;

yield 1/* x
 y */; /*c*/  } # h
)( # h
); foreach /*c*/  #c
($g as 
$_
) {}
(function () { # h

/** @d */echo 

'#133', 

"\n"#c
;
$f = /*c*/  fn &(\Orig\Thing|(contract#c
&\Countable)|\PDO|null	 $x	): /* x
 y */\Orig\Thing#c
|#c
(contract/* x
 y */&\Countable)|\PDO|null 	=> $x;	 $r 	= new \ReflectionFunction//c
($f);/* x
 y */ o((string) $r->getParameters(	)[ /*c*/ 0]->getType()
)	; /*c*/  
o((string) $r/** @d */->

getReturnType#c
() /*c*/ )
; o(get_class($f(new \PDO('sqlite::memory:') ))); /*c*/ 
}#c
)//c
(	);
/** @d */?>
<?php echo "\n"  /*c*/ ?>
<?php
}
