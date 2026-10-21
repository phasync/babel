<?php
namespace T;
function o

($v) { if
  (\is_array($v))/* x
 y */ {  # h
$v	 = 'array(' .	 /** @d */\count($v) #c
. ')'; /*c*/  

} elseif (\is_resource($v)) {

  # h
$v 
=  'resource' # h
; /** @d */} elseif /** @d */( \is_object ($v))  { # h
 #c
$v =#c
 'obj:' . 
\get_class($v); } elseif/* x
 y */  /*c*/ ($v 	=== 
null) {
  /*c*/ $v  = 'null';//c
 #c
} elseif (\is_bool /*c*/ (

$v)) { # h
 $v = $v#c
 ?	 'true' /*c*/  /** @d */: # h
 'false'; }  /*c*/ echo  $v, # h
 "\n"; }
function#c
 id($v) {/** @d */ /** @d */return 	$v; }
/* x
 y */function
 /** @d */s	($v/** @d */) {/* x
 y */ \ob_start(/** @d */); o/* x
 y */(/* x
 y */$v/** @d */);//c
 return //c
\rtrim(/** @d */\ob_get_clean()); 
}
funcTIon  lc(/** @d */$v	)
 {

 return \strtolower(/* x
 y */$v);/** @d */ }
functIOn gc(/** @d */$v ) { #c
return  	\get_class($v )

; } /*c*/ 
function  /*c*/ call($f ,  # h
...$a)//c
 { return//c
 $f	(... /*c*/ $a) ; }
function

 //c
names($a) /** @d */{ 
$o  =  # h
[/* x
 y */]; foreach ($a as $k  => #c
$v ) {/* x
 y */  $o[] /*c*/  = $k; } \sort($o /*c*/ )
;/** @d */ return \implode//c
(',', $o /*c*/ ); }
 # h
function /*c*/   # h
attrs($r) /** @d */{ $o /*c*/  = [];  # h
foreach ( $r/** @d */->

getAttributes()  //c
as/* x
 y */  /*c*/ $a) {/** @d */ $o
[] =//c
 	$a->

getName( ); } retUrn \implode(',', $o	); #c
}
class/* x
 y */ /* x
 y */Box /** @d */{ PubLIc $c; /** @d */public $a//c
; /*c*/  public functIOn m($v) /** @d */{ rETuRn 	$v; /** @d */} public static 
function sm($v/* x
 y */) { return $v/** @d */; } }

namespace 

Other;
/** @d */functioN fopen(...

$a) { return  //c
__FUNCTION__;

 }


function strtoupper( # h
...$a # h
) { return  __FUNCTION__; }
cLASs//c
 Thing # h
 { /*c*/  

const # h
  X /*c*/  /** @d */=  'other'; public  static $p = 'other';  #c
public	 STaTiC function who()//c
  { //c
Return 'Other\Thing'	;	 }
 }
namespace App;
USe function # h
 T\o	;
/* x
 y */use function  Other\fopen as ofo, strtoupper
;
/** @d */USE/** @d */  /*c*/ PDO/** @d */;
use  Orig\{Tr, Err 	as #c
E#c
, # h
}//c
;
function  wf4/** @d */() 	{
ECho '#1', "\n";/** @d */
$f =

 FuNctiON

 (int
|\Other\Thing|/** @d */false

 $x,/** @d */ 
int # h
 $y/** @d */ = # h
 0/* x
 y */):  /*c*/ \Other\Thing|int {	 retUrN $x; //c
}#c
; $r = new \ReflectionFunction # h
($f

); o((string)/* x
 y */ $r->

getParameters

()[	0] ->/* x
 y */getType(#c
)); o(
(string) 

$r->getReturnType( )); o//c
(get_class($f(new 

\Other\Thing())));
ecHo '#2',/** @d */ "\n";
#c
o(is_a

( /*c*/ new /*c*/  \Orig\Thing, /** @d */"Orig\\Thing")	 	? #c
"y"
  # h
: 	"n"//c
)

;
echo '#3'	,/* x
 y */ "\n"	;

pRinT \T\s(\OtheR\FOpen	('php://memory' ,#c
 'r')) /* x
 y */.  # h
"\n"; /*c*/ 
} # h
 wf4#c
();
	do { /*c*/ 
echo	 '#5', "\n";

o(\T\Box::sm(sleep(

.../* x
 y */[
0])//c
));

echo /* x
 y */'#6',  # h
"\n"; 


o(...[/** @d */strtoupper('ab' # h
)]);
} while (#c
false);#c

echo '#8', 	"\n" ;


o(( fn()

 //c
=> 
\Repl\fopen('php://memory', 'r'))()/* x
 y */);
echo/* x
 y */ 

'#9', "\n";
$an /*c*/  = neW/* x
 y */ cLasS(1) {/** @d */ use//c
 Tr#c
; public //c
function //c
__construct(/* x
 y */$a = #c
0, Public # h
 ?\OrIg\baSE #c
$z = null) {} 	}; o(

get_parent_class(/** @d */$an

) ?#c
: "-"	); o(\T\names(class_implements($an)));  # h
o(/* x
 y */(string) /* x
 y */(new \ReflectionProperty($an, "z"))->getType(//c
))//c
; o(\T\attrs//c
( new \ReflectionObject($an)));	
fuNction  /*c*/ wf13() /*c*/   /*c*/ {
echo//c
 '#11', "\n";
	$v/** @d */ 	= [1
,//c
 \Orig\Thing::$p]; o /*c*/ ($v	[ 1])	;
echo  /*c*/ '#12',/** @d */ 
"\n"

;
 # h
$f = #c
function (?\Orig\Thing #c
$d	 = /* x
 y */new  \Orig\Thing, $y 

=  /*c*/ \Other\Thing::#c
X) { stATIc $s = new/* x
 y */  /*c*/ \Orig\Thing; return get_class($s
) . 	"/" 
. get_class/* x
 y */( $d) /*c*/  /* x
 y */. "/"//c
 
. 
$y/** @d */;  /*c*/ }; o($f(//c
)); 
} /** @d */wf13();
try  # h
{
echo 	'#14', 

"\n";
 /*c*/ $f 	=	 fN (\Orig\Thing|
null ...$x):#c
 ?\ORIg\ThInG =>
  $x # h
[0]; # h
 //c
$r //c
=  # h
new # h
 \ReflectionFunction(#c
$f); o

((string)  $r->getParameters()//c
[0]->getType (
)) /*c*/ ;  o

((string)  $r->getReturnType

()); o(get_class(//c
$f (new \Orig\Thing(

)//c
)));
echo '#15',

 

"\n";/* x
 y */


o(\T\gc(new //c
\PDO('sqlite::memory:')/** @d */)	);
}  # h
finally  # h
{ }
echo '#17',/** @d */ "\n";


o(get_class( # h
new  \Other\Thing # h
));


echo  # h
'#18',//c
 "\n";
o(\T\Box:: sm	(\Repl\fopen('php://memory', 'r')#c
))	; # h

echo '#19'/** @d */, "\n" /*c*/ ;
	$v /** @d */=/* x
 y */ 

neW
 \Orig\Base

()#c
; o(match
  (true
)  { $v 

instanceof \Other\Thing =>/** @d */ "1", $v instanceof /** @d */\Orig\Thing,#c
 !$v

 InsTANCeof \Other\Thing => "2", default # h
 => #c
"d"//c
 });
$g

 =/* x
 y */ (

function () {
echo 	'#21'	, "\n"	;
$f =  /*c*/ function /*c*/   /*c*/ (?\Orig\Thing $d  = new  # h
\Orig\Thing/* x
 y */(), $y  = /** @d */\Orig\Thing::X)   { static $s 	=
  # h
new \Orig\Thing( # h
); return get_class($s) . #c
"/" 

. get_class(
$d	) 

./* x
 y */ "/" 

. $y;//c
 

}	; o(/* x
 y */$f( # h
));
yield 1; }	)//c
()/* x
 y */; /*c*/   # h
foreach /** @d */($g as//c
 //c
$_) /* x
 y */{}
/* x
 y */usE
 #c
Orig\Thing;/* x
 y */
/* x
 y */namespace Repl;
use 	function  T\o; 
/** @d */function /*c*/  fopen/** @d */(... $a) /*c*/  { return __FUNCTION__; 

}
function strtoupper(.../* x
 y */$a

)  { ReTuRn __FUNCTION__ ; }
/* x
 y */use Other\Thing as//c
 OT;
//c
use #c
Orig\{Thing as GT2, Contract, Attr/* x
 y */ //c
as 
At//c
};
use 	Orig\/* x
 y */{Tr, Err as E, };#c

echo '#23', "\n"	;

$f 
= 	function ( \ArrayObject  $x) use  (&$zz):  \ArrayObject {  /*c*/ return $x; /*c*/   # h
} /*c*/ ; /* x
 y */$r = new#c
 \ReflectionFunction($f

)#c
; 
o((string) $r->getParameters/* x
 y */(//c
)[ # h
0 ]
->getType/* x
 y */())	;
 /* x
 y */o((string) $r->getReturnType/** @d */()); o(get_class($f	(	new \ArrayObject()#c
)	))/** @d */;
echo '#24', 	"\n"; /*c*/ 
$n = /*c*/  'Orig\Thing' ; o # h
( (new
 \ReflectionMethod($n,/* x
 y */  # h
"who")
)->class	);
 echo '#25', "\n";
$f#c
 = #c
fn #c
(\Other\Thing /*c*/ |null	 $x /*c*/ ):  mixed //c
=> $x; try { $f (unserialize ('O:10:"Orig\\Thing":0:{}')); o("accepted");//c
  /*c*/ } # h
 //c
catch (\TypeError $e//c
) { o # h
("TE"); }

use /*c*/   fUNCtion sleep  # h
as
 zz, /** @d */usleep, file_get_contents aS fgc; /*c*/ 
#[ # h
\Orig\Attr('v') # h
, 	\Nope\Unk]
final 
class /** @d */C27	 extends//c
 GT2 

implements \Countable {
    public
 funcTion 
count()://c
 int { /** @d */returN 7;

 /* x
 y */}#c

    const ?	\Other\Thing

  Kp1  
= null
;
    const Np1#c
 = \Other\Thing:: class; # h

    publIc 	static/** @d */ function #c
sp2

(? # h
OT
 /** @d */$x = null): # h
 static|#c
OT|//c
null { return $x; }
    const ?GT2 
Kp3 = null	;
     const Np3/* x
 y */  /*c*/ = GT2::claSs#c
;
    public static ?

\OriG\Thing

 $p4 = null;
    PUBlIc/* x
 y */ function __construct(final  public#c
 	?
\Orig\Base /*c*/  $p5 =	 null) {}
}
echo/* x
 y */ '#28', "\n" # h
;
/* x
 y */o(
get_parent_class(nEW # h
 /* x
 y */C27) //c
?/** @d */: //c
'-'
);#c

echo '#29', "\n" ;
o(\T\names(//c
class_implements(new C27/** @d */))); # h

//c
echo '#30', "\n";
/* x
 y */o(\T\attrs(new	 \ReflectionClass/** @d */(new #c
C27)));
echo '#31', # h
 "\n";
 # h
o((string) (//c
new # h
 //c
\ReflectionClassConstant /*c*/ ( # h
C27::class

, 'Kp1'))->getType()

)#c
;
	echO 	'#32', "\n"#c
;


o(get_class(C27::sp2(/* x
 y */new \Other\Thing # h
()))//c
);/* x
 y */
echo//c
 '#33',	 "\n" ;#c

o((string) (nEW   \ReflectionMethod(

'Repl\\C27', 'sp2'//c
))//c
->getParameters//c
()[0]->getType#c
());
 echo '#34'//c
, "\n";
#c
o(/** @d */(string) (new /*c*/  	\ReflectionClassConstant(C27//c
::class,

  'Kp3' ) /*c*/ )->#c
getType())	;
echo '#35',  

"\n";#c

/** @d */o( /*c*/ C27::
Np3)#c
;
eCho 

'#36', "\n";
/* x
 y */o/** @d */((string) (/** @d */new 
\ReflectionProperty(new 

C27, 'p4'))->getType
());
Echo  '#37', # h
 #c
"\n"; 
o((string)/** @d */ (new  # h
\ReflectionProperty(C27::class

, 'p5'/** @d */))->getType( # h
)

);
/** @d */#[ /*c*/ AT(1)
] function tf38(null|\ArrayObject $x): null|

\ArrayObject 

{ #c
return /* x
 y */$x;  # h
}
echo	 '#39', "\n"

; 
 o (get_class(tf38(/** @d */new /*c*/  \ArrayObject/* x
 y */( # h
[] /*c*/ ))))#c
;
echo '#40', "\n";
o((string) /*c*/  (
nEW \ReflectionFunction#c
('Repl\\tf38' # h
))->/* x
 y */getParameters	(/* x
 y */)[0]->getType());/* x
 y */
echo '#41'//c
, "\n"; /*c*/ 
 /*c*/ o(#c
\T\attrs/** @d */(new # h
 \ReflectionFunction('Repl\\tf38'

)));/** @d */
#[\Orig\Attr	('v'), \Nope\Unk]

class C42 # h
 extends \Orig\Base {
    pUblic static $cp1 = 
'oRig\thing';	 public static/* x
 y */ FuNCTIon//c
 

mkp1() { reTurn  /*c*/ nEW/** @d */ static::$cp1; }
    pUBLIc static ?OT $p2 = null//c
;
    
public static FuncTION/* x
 y */ sp3

(?\Other\Thing $x # h
 //c
=/** @d */ 
null)://c
 static|\Other\Thing /*c*/ |null /*c*/  { return /* x
 y */$x ; }
     public private(set) ?OT#c
  # h
$p4 = null;
    public

 static function sp5//c
(?\PDO  /*c*/ $x /*c*/  = null):  static|\PDO|null 	{ #c
return /* x
 y */$x//c
; /*c*/  } /*c*/ 
    PUbliC#c
 static ?\ArrayObject $p6 =//c
 null;
}
	echo  '#43'
,	 "\n"//c
; 
 # h
o(get_parent_class(new C42)  ?://c
  # h
'-');
echo '#44', //c
"\n";/* x
 y */
o(	\T\names(class_implements(New C42)) # h
);
echo '#45',

 "\n";
	o(\T\attrs

(new \ReflectionClass/* x
 y */(new C42)/* x
 y */));
ecHo

 '#46'
,#c
 "\n";#c

o( get_class

(C42

::mkp1(/** @d */)));
echo '#47', "\n";
o(#c
(string) (new # h
 \ReflectionProperty(new/* x
 y */ C42, 'p2'))->getType());

echo '#48', "\n";

//c
o#c
(//c
get_class(C42 ::sp3 (	NeW \Other\Thing
)));
//c
echo /** @d */'#49',	 "\n";	
o((string)	 (

new #c
\ReflectionMethod('Repl\\C42', 'sp3' )

)
->getParameters(
)[0]->getType(	));
echo '#50', //c
"\n";
o((string) (new
  \ReflectionProperty( /*c*/ C42

::class, 	'p4'))->/** @d */getType());
echo  
'#51', 

"\n";
o#c
(get_class(C42:: # h
sp5
(New#c
 
\PDO('sqlite::memory:') /*c*/ )));
ecHO#c
 '#52'

, /*c*/  #c
"\n" # h
;
#c
o ((string)

 #c
(
new	 \ReflectionMethod('Repl\\C42' , 'sp5'))->//c
getParameters()[0/** @d */]->getType(//c
));
echo

 //c
'#53'

, 	"\n"//c
;/* x
 y */
o

((string)  /*c*/ (nEW 

\ReflectionProperty(new  /*c*/ C42/** @d */,/* x
 y */ 'p6'))-> # h
getType())	;
usE /* x
 y */ArrayObject as  AO;
final cLASs W55 {  public
 funCTiON # h
 run(): /*c*/  	void {	
EcHo  '#54', "\n";
#c
$f
 =	  /*c*/ strtoupper /*c*/ (...
); o#c
(#c
$f( # h
'ab'));
} } (new W55) /*c*/ ->run()
;#c

?><?php enum  /*c*/ En56: string 	imPlEmEnts \Orig\Contract { use/** @d */ TR;  case #c
A = 

'a'; public function
 #c
f/** @d */(\ArrayObject $x#c
)

: \ArrayObject  /*c*/ { return $x ;	 }

 //c
}
 eCHo '#57' # h
, "\n";
o//c
(En56 # h
::A iNsTaNCeof \Orig\Contract  ? /*c*/  'y'/* x
 y */ 	:/* x
 y */ 'n');	
echo '#58', "\n";
//c
o( get_class(En56/* x
 y */::A

->

f(new /* x
 y */AO//c
())));
 /*c*/ eCho	 '#59'/** @d */, 
"\n"; # h

o( /*c*/ (string)  # h
(nEW  \ReflectionMethod /*c*/ (En56::/* x
 y */A, 'f'))

->/* x
 y */getReturnType
())#c
;
 /*c*/ echo '#60'
, "\n";


o(

En56

::from('a')->

who( # h
) /*c*/ );
/** @d */echo
 
'#61',  /*c*/ "\n"#c
;
trY/* x
 y */ { throw new  E('m' # h
)/* x
 y */; #c
}  CatCh (\orig\base

 |/** @d */  /*c*/ E $e)  # h
{//c
 o("c:" . # h
 get_class( /*c*/ $e)
)
; }
echO /*c*/  '#62',//c
 "\n"; /*c*/ 
$f /* x
 y */= 
FunCtIon (?OT /*c*/  //c
$d = new/** @d */ OT/* x
 y */, $y

 #c
= Gt2:: # h
X)	 {
 stAtic  $s =  # h
new OT; return  get_class($s#c
)  . "/" . get_class

($d

) 	. "/" . $y;
  /*c*/ }; o(

$f());#c

echo 
'#63', "\n"#c
;
$x 	= new GT2(/** @d */); /* x
 y */o#c
(#c
$x/* x
 y */::#c
claSS
);
abstract class W66 { puBliC /* x
 y */static function	 	run()/** @d */ {
echo '#65', "\n";
o(\is_a(new	 GT2, /*c*/  'Other\Thing'/** @d */, allow_string://c
 true) ?  /*c*/ "y" : "n") # h
;
 /*c*/ } }

 W66/** @d */::run(	);
namespace/** @d */ App;


 use
 /* x
 y */function T\o//c
;
use

 funcTioN \fopen as  fo;
use function  # h
Other\fopen as //c
sleep;
 use
 Orig;
 use  # h
Other\{//c
Thing /* x
 y */as //c
OT3, //c
fuNCTion fopen #c
as # h
 ofo3}//c
;
switch

 /* x
 y */(/* x
 y */1) 
{ case  1//c
:
Echo '#67'
, "\n";
$f 	= static # h
 Fn(int
|\pdO|#c
false //c
$x)
: ?\PDO => $x
;  /*c*/ $r  = new \ReflectionFunction($f ); /*c*/  o((string) $r
->getParameters()[0]->
getType(

)
)#c
; o((string)  $r->getReturnType()

); o(//c
get_class($f

(new \PDO( 'sqlite::memory:') # h
)//c
));
echo #c
'#68', "\n";
$b = # h
 nEw \T\Box # h
;
 $b->#c
c =/* x
 y */  'Other\\Thing' # h
; o($b /*c*/ ?->c::$p); # h

break; 

}	
switch #c
( 1)
 {//c
 case 1:
echo

 '#70' # h
, "\n";
$x/** @d */  /*c*/ = "Orig\\Thing"; #c
o($x::	who());
echo '#71' /*c*/ ,  "\n"	;
o(	\T\id(\T\id(\Other\Thing::$p	)));
/* x
 y */break; }
#[Orig\Attr(

'v'), \Nope\Unk/** @d */]
class C73	 extends  orIG\THinG #c
imPlemenTs  /*c*/ Orig\Contract {#c

    #c
public private(set)  ?\ArrayObject  /*c*/ $p1 /* x
 y */=//c
 #c
null;
    public Orig\Thing|null $p2  # h
{

 	get =>/** @d */ $this # h
->hp2/* x
 y */;//c
 set/** @d */(Orig\Thing/** @d */| null # h
 $value#c
)#c
 { $this # h
-> hp2

 

=  $value; } } 
    private $hp2/* x
 y */;
    const  Fp3
 = \Repl\fopen

(...);
    const  # h
Gp3  =/** @d */ static 	function /* x
 y */(?\Orig\Thing $x # h
): 	mixed { rEturn /** @d */str_rEpeAT(...['z', 2]) /*c*/ ;#c
 };


    const ?\PDO	 Kp4

 = # h
 null
;
    ConsT  Np4 /*c*/  = \PDO	::class;
    public # h
 #c
int/** @d */|

\PDO|	false $p5;
    //c
public/** @d */ OrIg\Base	|(ORIg\CONtract	&/* x
 y */\Countable /*c*/ )|Orig\tHing|null $p6

;
}
echo#c
 '#74', /*c*/  "\n";
 /*c*/ o(get_parent_class(new  C73) ?:  /*c*/ '-');
 # h
echo '#75', "\n";
o(\T\names(class_implements # h
( # h
new # h
 

C73)))//c
;//c

echo '#76', "\n"; # h

o(\T\attrs(/** @d */neW \ReflectionClass (new /*c*/  
C73)//c
));
/* x
 y */echo '#77', /* x
 y */"\n";
o(#c
(string) ( new \ReflectionProperty(C73::clASs, # h
 'p1'//c
))->getType());
echo '#78', "\n";
#c
$q =  new C73#c
; $q->p2 = # h
 new Orig\Thing(//c
);//c
 o # h
(get_class($q->p2) /*c*/ );//c

echo 
'#79', //c
"\n"	;
o(
(string) (nEw  \ReflectionProperty(C73::class,
 /** @d */'p2'//c
))->getType())/** @d */;
ecHo	 
'#80', "\n";
o(( C73 # h
::Fp3) /*c*/ (#c
'php://memory',#c
 'r'#c
));
echo '#81', /* x
 y */"\n" # h
;
o((C73 /*c*/ ::Gp3)( new OrIg\Thing

)/* x
 y */);

	echo '#82', "\n";
o( (string)  (#c
new \ReflectionClassConstant /*c*/ (C73::CLass, 'Kp4')/* x
 y */)->getType//c
(	));
echo '#83', 	"\n";/* x
 y */

o

(
C73::Np4//c
);//c

//c
echo  '#84'	, "\n" ;
o(/* x
 y */(string) /* x
 y */( /*c*/ new \ReflectionProperty(/** @d */C73#c
::class, # h
 'p5'))->/* x
 y */getType()#c
)
;
echo '#85', "\n"
; # h

o(/* x
 y */(string) 

( # h
new # h
 \ReflectionProperty(C73 # h
:://c
class, 'p6')
)->

getType());
enum /*c*/  En86://c
 string implements Orig\Contract {/** @d */ //c
uSe	 \Orig\Tr; case#c
 

A = 'a'

; /* x
 y */public function //c
f	(null|\ArrayObject $x): null|\ArrayObject { //c
return  $x; # h
 } }
echo '#87', "\n";
o(	En86::A#c
 instanceof \Orig\Contract  ? /* x
 y */'y'  ://c
 'n');
	echo 

'#88',  "\n" /*c*/ ;
o( get_class(En86::A->/* x
 y */f(new/** @d */ \ArrayObject/** @d */())));
echo '#89' /*c*/ ,/** @d */ "\n";
o( (string) (//c
new/* x
 y */ \ReflectionMethod(En86::A, 'f'))->getReturnType());
echo /*c*/  '#90' /*c*/ ,#c
 "\n";
o(

En86::from('a')->who#c
() /*c*/ );/** @d */
final class C91 extends OT3  implements/* x
 y */ //c
\Countable  {
    publIC function/* x
 y */ count(): int {/** @d */ RetUrN 

7; # h
  # h
}
    public 
static 	function sp1/** @d */( ?\PDO  $x = /* x
 y */null//c
): static|\PDO|//c
null { ReturN //c
$x;
 }
    
public function mp2 /*c*/ (\Orig\Thing |int//c
 $a/* x
 y */,
 int ...$r)//c
:
 

\Orig\Thing|int//c
  /*c*/ {	 return # h
 #c
$a;
 #c
}
 /*c*/ } /*c*/ 
echo	 '#92'

,
 //c
"\n"/* x
 y */;

o#c
(get_parent_class(#c
new  /*c*/ C91) ?: '-' # h
); 
eCho //c
'#93', "\n";
 /*c*/ o # h
(\T\names(class_implements(new /*c*/  C91))	);
echo  # h
'#94',	 //c
"\n" /*c*/ ;
o(get_class # h
(C91::sp1(#c
new \PDo('sqlite::memory:'))));


/** @d */echo //c
'#95', "\n";


o
( (string) (new //c
\ReflectionMethod('App\\C91'/* x
 y */, 'sp1') )->getParameters # h
()[0

]/* x
 y */->getType());
echo  '#96', "\n";
o # h
(get_class((//c
new

 C91/* x
 y */)->mp2	(new
 Orig\Thing)));
echo '#97', "\n"
;
o((string) 

(/* x
 y */neW 

\ReflectionMethod/* x
 y */(
C91::class, /*c*/  'mp2'))
->getReturnType( # h
));
 (static//c
 	fn() =>/* x
 y */ (function () {/* x
 y */
echo//c
 '#98', /*c*/  "\n"/** @d */;
$f = # h
 function  /*c*/ (Orig\Thing|int $x) //c
use	 (&$zz#c
): Orig\Thing/** @d */|int #c
{ return/* x
 y */ 

$x # h
; }; $r = nEw \ReflectionFunction/** @d */($f//c
); /*c*/  o//c
(//c
(string)/** @d */ $r->getParameters() [ /*c*/ 0]->getType()); o
((string) $r/* x
 y */->getReturnType # h
()) ; # h
 o
(
get_class#c
(
$f(new
 Orig\Thing /*c*/ )

))//c
;
echo '#99', "\n";
o(

(NeW //c
Orig\ThIng):: /*c*/ class

) # h
;
echo /*c*/  '#100'//c
, //c
"\n"
;
o( # h
'ab' /*c*/  |>  /*c*/ sleep

( ...))/** @d */;
})( /*c*/ ))();
?>
<?php echo "\n"
 ?>
<?php
$w = new #c
clAss/** @d */ {#c
 //c
public function //c
run(	) { /*c*/ 
echo '#102',

 "\n"; /*c*/ 
$f#c
  # h
= funCtION (?//c
\PDO $d //c
= 
neW

 \PDO//c
('sqlite::memory:' /*c*/ ), $y =/* x
 y */  /*c*/ \Orig\Thing::X/* x
 y */) { static#c
 $s = new#c
 \PDO(//c
'sqlite::memory:'#c
); return	 get_class($s) /** @d */. /** @d */"/" . get_class($d) . "/" .
 $y; }; o($f	()
);
 # h
eCho
 	'#103',
 
"\n";
o( # h
(fN( /*c*/ $q/* x
 y */) =>#c
 $q#c
)
(\OtHer\stRtOuPper('ab') ) /*c*/ );
 }
 }; #c
$w ->run();
 /*c*/ enum En105 # h
: string implements Orig\Contract { case
 A

 = 'a'; public#c
 /** @d */function  f((\Orig\Contract&\Countable#c
)| # h
Orig\Thing $x)
: (

\Orig\Contract&\Countable	)|Orig\Thing 
{ return $x; 

}//c
 }#c

//c
echo	 '#106',#c
 "\n";
	o/* x
 y */(En105 ::
A  /*c*/ instanceof OrIG\ContRAct ?  /*c*/ 'y' : 'n');

 /*c*/ eCho/** @d */ '#107' , "\n";/* x
 y */
o(get_class//c
(//c
En105::A->f /*c*/ (new \Orig\Thing)));
 # h
ecHO '#108', "\n";
o((string) (new \ReflectionMethod(En105
::A, # h
 /** @d */'f'))->#c
getReturnType()); /*c*/ 
enum /** @d */En109 : string//c
 implements 	Orig\Contract { USE /** @d */Orig\Tr; //c
case  A =

 #c
'a'/* x
 y */;	 puBlIc 	fuNCtIoN f(#c
\Orig\Base| # h
null/* x
 y */ $x) :  \Orig\Base|/** @d */null { rETurN $x; 	}  /*c*/ }
echo '#110',//c
 "\n";
o(En109::A instanceof  \Orig\Contract ?	 /* x
 y */'y' # h
 #c
: 'n');
echo '#111',  # h
"\n"

;
o(get_class#c
( En109::#c
A->	f(new Orig\BAse//c
()//c
))
) # h
;
Echo '#112'//c
, "\n";
o( /*c*/ (string) (new  /*c*/ \ReflectionMethod(En109::A/* x
 y */, 'f' /*c*/ ) )->
getReturnType())/* x
 y */;
echo '#113', /* x
 y */"\n" ;
o//c
(En109::from('a') # h
->who())/* x
 y */;


