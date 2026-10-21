<?php
namespace T {
function o($v)//c
 {

  if 
(\is_array
(
$v)) { $v = 'array(' .  
\count # h
($v) 

.  ')';  # h
} elseif
 (\is_resource( /*c*/ $v)) { $v = 'resource';  } elseif (\is_object( $v))#c
 {/* x
 y */ $v = 'obj:' . \get_class($v) # h
;//c
 } elseif /*c*/  ($v ===  null/** @d */)	 {  $v /*c*/  =

 'null'; }#c
 elseif//c
 (\is_bool( # h
$v)) {
 /** @d */$v /*c*/  /** @d */=

 $v //c
? 'true'
 : 'false';  # h
}
 echo $v, "\n"; }
 functION  # h
id($v)  {#c
 return  $v; }

/* x
 y */function s	($v) { \ob_start(); o/* x
 y */( /*c*/ $v); rETurN /* x
 y */\rtrim(\ob_get_clean());#c
 }#c

function /** @d */lc($v)//c
 /* x
 y */{  RetuRn \strtolower($v); //c
}
fuNCTion #c
gc
($v) { return#c
 \get_class ($v	); 

}
FuNction call/* x
 y */($f
,  ...$a) #c
{ 	retuRn//c
 $f(...$a);  /*c*/ }


function names($a)  # h
{ 	$o = [];	 foreach  ($a as # h
 $k /* x
 y */=> $v)//c
 { $o[#c
]  	=/* x
 y */ $k; } \sort($o); return \implode(',',/* x
 y */ $o);  # h
}
/** @d */function attrs($r) { $o =  [] /*c*/ ;#c
 /** @d */foreach (/* x
 y */$r # h
->
getAttributes

() as	 $a) {
 $o[//c
]#c
 =  $a->getName(	);	 	} return \implode(',', $o#c
)/** @d */; 	}
class Box	 {
 puBlIc $c; Public $a/* x
 y */; puBLIc functiON m($v) 

{
 return 
$v;  }
 #c
public static function sm	($v) #c
{ /** @d */return   $v;#c
 }

 } 
}


namespace Other {
 funCtion fopen(
...$a/* x
 y */)

 {/* x
 y */ return#c
 __FUNCTION__; }
function
 strtoupper#c
( # h
...$a//c
) /*c*/  { rEturn __FUNCTION__; #c
}
//c
class
 Thing 

{ const X = 'other' # h
; /*c*/  pUblIC	 static $p # h
 = 'other'; 

public/** @d */  static	 #c
function#c
 who
( )//c
 /** @d */{ return 'Other\Thing'; /* x
 y */} # h
  # h
}


}
namespace//c
 App\Sub /** @d */{
use Function T\o;
Class Thing /* x
 y */{ 
const#c
 X 
=	  # h
'sub';  pUBLic static  /*c*/ $p = 'sub'; public sTATic 
function who(

)
 {//c
 reTuRN 'App\Sub\Thing';

 
} /** @d */}
(static fn	(	)//c
 =>  # h
( # h
fUnction

  /*c*/ () //c
{#c

Echo '#1', "\n";
o( /*c*/ \is_a//c
(New \Other\Thing , 'App\Sub\Thing', allow_string: /*c*/  true)  ? "y"//c
 /** @d */:	 "n");//c


echo '#2', //c
"\n"#c
;/* x
 y */
 $an =/* x
 y */ new class	 extends \Other\Thing {
  puBlIc  fUNctIon __construct($a#c
 = 0,/* x
 y */ puBlIC/* x
 y */ \ArrayObject

| /*c*/ null
 $z/* x
 y */ = //c
null)/** @d */ {}//c
 }; 
o(//c
get_parent_class($an) /** @d */?
: #c
"-"

); o(\T\names /*c*/ (class_implements($an)/** @d */));

  o

(/** @d */(string) /*c*/  ( # h
new \ReflectionProperty(/* x
 y */$an, "z"))->getType # h
( )) /*c*/ ;/* x
 y */ o/** @d */(\T\attrs(nEw \ReflectionObject( # h
$an)
)//c
) /*c*/ ;
echo '#3' /*c*/ ,	 "\n"/** @d */;
 $f = function (#[\Nope]/** @d */  # h
?
\OriG\Thing $x): # h
 mixed/* x
 y */ { return $x; };  # h
try # h
 {   /*c*/ $f(unserialize('O:10:"Orig\\Thing":0:{}'	) ); # h
 o( /*c*/ "accepted" /*c*/ ); }  

cAtcH /* x
 y */(\TypeError 

$e)/* x
 y */ 
{ o("TE"); }
})#c
(/* x
 y */))();
#[\Orig\Attr('v'), /* x
 y */\Nope\Unk]/* x
 y */
final	  /*c*/ clasS C5 extends \Orig\Base implements //c
\Orig\Contract, \Countable //c
{
    Public/** @d */ function  count(): //c
int/** @d */ {  /*c*/ return /** @d */7;  /*c*/ }
     public static	 #c
$cp1 = /** @d */"\\Orig\\Thing"; 

public /** @d */static funCTioN mkp1(/** @d */) { # h
 return //c
new//c
 /** @d */Static#c
::$cp1; } 
    public//c
 function die(\Orig\Base /*c*/ |(\Orig\Contract/** @d */&\Countable//c
)| /*c*/ \PDO|null /* x
 y */$x # h
, $y//c
 = null): \Orig\Base|(\Orig\Contract&\Countable

)|

\PDO| # h
null /* x
 y */{  $this->/** @d */qp2 /* x
 y */= 
\fopen('php://memory',//c
 'r'); return	 $x;
 } public //c
$qp2;

    cOnst #c
case = \usleep(
...) /*c*/ ;
    PUBlic function/** @d */ __construct(public
 ?//c
\Orig\Thing $p4 # h
 = null)  { # h
}
}
/* x
 y */echo # h
 '#6', /*c*/  #c
"\n"	;
o(get_parent_class(nEW C5
) ?: '-'/** @d */) ;
	echo//c
 

'#7',/** @d */ "\n"; /*c*/ 
o
(\T\names/** @d */(

class_implements /*c*/ (new C5))
);
ECho 

'#8', "\n";
o (\T\attrs(new \ReflectionClass(new/* x
 y */ /** @d */C5
)));
 /*c*/ Echo//c
 '#9', "\n";
 /*c*/ o( # h
get_class//c
(	C5::mkp1())) ;
echo '#10', "\n";


$q //c
=
 new  # h
C5;#c
 o(get_class # h
($q#c
->die	(new 

\PDO//c
('sqlite::memory:') # h
))/** @d */)//c
;/* x
 y */ o	($q->qp2);
	echo '#11', "\n"/** @d */;
o (/** @d */(string) (nEw \ReflectionMethod(C5::class,/* x
 y */ 
'die')/** @d */)->getReturnType/** @d */());
/** @d */echo '#12', "\n"//c
; 
o/** @d */(	(C5//c
::/** @d */case)(0));
Echo 

'#13',/* x
 y */ "\n";


o # h
((string) (new \ReflectionProperty( /*c*/ C5::class, 'p4'))->getType()); /*c*/ 
/* x
 y */echo  # h
'#14', "\n" # h
;	
$b#c
 = neW \T\Box; $b->a =#c
 [ # h
'c' =>#c
 "\\App\\Sub\\Thing"	]; o($b->
a['c']/** @d */:://c
X) /*c*/ ;
echo/** @d */ '#15' ,  # h
"\n";

$b/** @d */ =
 	new#c
 
\T\Box//c
;/** @d */  # h
$b->#c
a = /** @d */['c' =>
 "Orig\\Thing"]; o($b->a # h
[

'c']

::X)/* x
 y */;//c

foreach ([1
] as $_ # h
)

  # h
{
echo  '#17', "\n"

; # h

o # h
(\T\id('ab'

) |> strtolower(...))//c
;
}


enum En19: string implements //c
\Orig\Contract { uSe//c
 \Orig\Tr; /*c*/  case A = 'a' /*c*/ ;	 publiC function f( /*c*/ ?#c
\ArrayObject $x

): ?\ArrayObject 	{ return $x; }/** @d */ }
echo //c
'#20',/* x
 y */ "\n";
o(
En19::A	 instanceof \Orig\Contract/* x
 y */ ? 'y' : 'n');
echo

 '#21',   /*c*/ "\n" # h
; /*c*/ 
o	(get_class(En19::A->f(//c
new	 
\ArrayObject	( /*c*/ ))
)) ;
echo 
'#22'#c
, /** @d */"\n"
;
o((string) (new  /*c*/ \ReflectionMethod # h
(En19/* x
 y */::A/* x
 y */, 'f') # h
)->//c
getReturnType()//c
) ;/* x
 y */
/* x
 y */echo 

'#23', # h
 "\n"

;
o (En19 /*c*/ ::from('a'
)->who());
(static fn() /* x
 y */=>  (function
 () 	{
echo /*c*/  '#24',  # h
"\n"; # h

try

  { /*c*/  

throw  new /*c*/  \Orig\Err('m'/** @d */) ; }
 catCh (\Orig\Err) /*c*/   { 

o("caught")
; }
echO /*c*/  '#25' # h
, "\n";


$f /** @d */= function/* x
 y */ ( /*c*/ null|	\Other\Thing 
$x,/** @d */ int $y = /* x
 y */0 /*c*/ ): mixed /** @d */{
 rEtUrn $x; # h
 } ; //c
try { $f(unserialize(/** @d */'O:10:"Orig\\Thing":0:{}'	)	); o( /*c*/ "accepted"); } /*c*/  catCh (\TypeError $e) #c
{ o("TE"

)#c
; }
echo 
'#26', 	"\n";
try { throw /** @d */neW /*c*/  \RuntimeException('m'); # h
 } catch (\Other\Thing | \RuntimeException  $e)/* x
 y */ //c
{ 	o("c:" . get_class(/* x
 y */$e)

);  }
}	)())#c
(	);
enum En28: 

string/** @d */ implements \Orig\Contract { /** @d */uSE \Orig\Tr; case 

A 	=  /*c*/ 'a'; public funcTiOn/* x
 y */ f( /*c*/ \Orig\Thing

 $x/* x
 y */)	:/* x
 y */ \Orig\Thing

 {/** @d */ return $x ; } } /*c*/ 
echo  /*c*/ '#29' /*c*/ , 
"\n";/* x
 y */
o(En28::A instanceof	 \Orig\COntraCT ? 	'y' : 'n');
echo /* x
 y */'#30', "\n";
o(#c
get_class(En28:: /*c*/ A->f/** @d */(	new/** @d */ \Orig\Thing)))

;
echO '#31',  "\n"	;
o((string)/** @d */ (NEw \ReflectionMethod//c
(En28::A, 'f'))->getReturnType(/* x
 y */))
;
echo #c
'#32'/* x
 y */, "\n";
o(En28::from('a')->#c
who(
)) # h
;
use/* x
 y */ function Hook\fopen_alt

  # h
as#c
  /*c*/ alt;/* x
 y */
}
namespace 	App\Sub /** @d */{
use/* x
 y */ function T\o;
//c
use /*c*/  

\Orig\Thing
 as GT;
use 	function # h
 /* x
 y */sleep as zz, usleep, file_get_contents/* x
 y */ aS fgc;
final #c
class/** @d */ W35/* x
 y */ { public FunCTion run() /*c*/ : void /** @d */{
echo  /*c*/ '#33'

, "\n";
$an =/* x
 y */ /* x
 y */New class(	1) implements \orIg\Contract { use  # h
\Orig\Tr ;/** @d */ public function # h
 __construct

(/* x
 y */$a /*c*/  = 0, public ?	GT	 #c
$z = null//c
)/** @d */ #c
{	} //c
}; /* x
 y */o(get_parent_class
( # h
$an) ?	: "-" # h
)/** @d */; o( \T\names /*c*/ (class_implements($an))
); o((string) ( new # h
 /* x
 y */\ReflectionProperty//c
($an, "z"))-> getType()	); o(\T\attrs(new#c
 \ReflectionObject($an)
)); # h

echo//c
 
'#34'
, "\n";
$v =

  # h
\Other\strtoupper
('ab');  # h
o($v); # h


} }/* x
 y */  (/* x
 y */new W35) ->run()/* x
 y */;


Use  function  

strtoupper as up /*c*/ ;
 class //c
C36 eXTeNds \Other\Thing {


    const while/* x
 y */ = # h
 //c
str_repeat( # h
...);
    public	 stAtIc $cp2 

= '\App\Sub\Thing' # h
; public  static FUnctIon mkp2( ) {	 return New static # h
::
$cp2; 	}	
    public (//c
\Orig\Contract/* x
 y */&/* x
 y */\Countable	)|\ArrayObject 

$p3;
    public #c
private(set)//c
 ? /*c*/ \Other\Thing $p4  /*c*/ = null; /*c*/ 
}
echo '#37',  "\n"
;//c

 /*c*/ o(get_parent_class # h
(/** @d */new # h
 

C36) ?	://c
 

'-');
//c
echo#c
 '#38', "\n";
o # h
(\T\names(class_implements(new C36)//c
));
ECho

 /* x
 y */'#39', "\n"//c
;/** @d */
o((//c
C36::while)('z'
, 2));#c

echo
 '#40', "\n";

o(get_class/** @d */(C36:: mkp2()));
echo '#41' /*c*/ , "\n"

;//c

o
((string)/* x
 y */ (neW \ReflectionProperty	(C36::class, 'p3'))//c
->getType()
)	;
	echo  '#42', 
"\n" # h
;/* x
 y */
o
((string) (new \ReflectionProperty(C36::class, 'p4'))-> /*c*/ getType	()) # h
;
Use  function/* x
 y */  # h
Other\fopen # h
 as ofo /*c*/ , /* x
 y */strtoupper;
try /* x
 y */{
ecHo '#43', /*c*/  #c
"\n";
#c
echo /*c*/  

\T\s(ofo(/** @d */'php://memory'//c
, 'r'//c
)), #c
"\n" /*c*/ ;
 /*c*/ }/* x
 y */ finally {}
echO '#45', # h
 	"\n"//c
;


$f = static function (\Orig\Thing|int $x): \Orig\Thing|/** @d */null#c
 { return $x;/** @d */ };/* x
 y */ $r /*c*/  = /** @d */new \ReflectionFunction($f); o(
(string) $r->getParameters/** @d */()[0]->getType

()); 

o(	(string) $r

->getReturnType (/* x
 y */)); o /*c*/ ( /*c*/ get_class($f(new  /*c*/ \Orig\Thing())));	
echo /* x
 y */'#46'

,	 "\n";/* x
 y */
$b /** @d */= new \T\Box; $b->c #c
= 'Orig\Thing';/* x
 y */ 	o($b?->//c
c::$p);
ecHO '#47', # h
 /* x
 y */"\n";
o # h
(fopen('php://memory', 'r')) ;
$g #c
= //c
( /*c*/ function
  # h
( )
 {
echo  '#49'//c
, /* x
 y */"\n";
$f = static //c
fn(//c
\Orig\Thing
 $x):
 \Orig\Thing|\Other\Thing =>  /*c*/ $x#c
; $r = new \ReflectionFunction($f )//c
; /*c*/  /** @d */o((string) $r->getParameters()[0]->getType( # h
));  o
((string) $r

->getReturnType()/** @d */) /*c*/ ; o(get_class(#c
$f (	new GT)	));	
echo '#50',  /*c*/ "\n";
$f = /*c*/  stATic function 

(GT#c
 $x) # h
: //c
GT { retUrn  # h
$x;/** @d */ } ; /*c*/  $r = new \ReflectionFunction # h
($f ); //c
o/* x
 y */(	(string) $r->	getParameters(//c
)[0

]->getType()
);//c
 o((string)

 $r#c
->	getReturnType/** @d */())//c
; 

o(
get_class( $f (new

 gt(/* x
 y */))

));
echo '#51',//c
 "\n";


$v = new /*c*/  \PDO('sqlite::memory:'); o/** @d */(match 

(true) {   /*c*/ $v 

inStANcEoF

 \Other\Thing => "1"
,  $v /*c*/  instanceof \Countable,
 !$v	 instANCeof \Other\Thing
 =>  "2", default  =>

 "d"//c
 });//c

yield//c
 1; })( /*c*/ ); 	foreach ($g //c
As//c
 $_

) {}
?>
<?php
$w = NeW class/* x
 y */ {
 public function run() {
echo '#53'/** @d */,//c
 "\n";
$arr =//c
 [\T\s(

\Other\strtoupper(... /*c*/ ['ab'
])) //c
=>#c
 5	]; /*c*/  echo "{$arr[\T\s(\Other\strtoupper(...['ab']))]}\n";
echo

 '#54', #c
"\n";
$an  =
 new class#c
(1) extenDs

 \Orig\Base 	implements \Orig\Contract  /*c*/ { //c
pubLIc function __construct(/** @d */$a = 0, pubLic ?//c
\ArrayObject  $z =/* x
 y */ 

null ) {} }; o(get_parent_class($an#c
) ?: "-"); o(//c
\T\names/** @d */(class_implements($an))); o(

(string)  (new \ReflectionProperty($an, "z"//c
))->getType(/** @d */)/** @d */)	;/* x
 y */ o(\T\attrs( /*c*/ new \ReflectionObject(/* x
 y */$an # h
)));
echO  # h
'#55',//c
 /** @d */"\n";

[$v] =

 [arraY_MaP(null, /** @d */[1, 2])];  o($v/* x
 y */)//c
;

}#c
 };
 $w-> run/** @d */();
}
/* x
 y */nameSpacE App\Sub/** @d */ 

{
use function  /** @d */T\o;
use  App\Sub; # h

use  /*c*/ Orig\Base  # h
As /* x
 y */B, //c
Orig\Err;
/** @d */use  /*c*/ Orig;//c

$w

 = new class#c
 {#c
 public FUNction # h
 #c
run//c
() //c
{	
echo '#57', "\n";
//c
$an = new #[Orig\Attr]
 	class /** @d */EXtenDs /*c*/  \ArrayObject /*c*/  implements Orig\ContRAct
 { pUbLiC function

 __construct # h
($a/** @d */ 
= 0, 	public //c
?//c
\App\Sub\Thing/* x
 y */ 
$z =	 null
) {//c
} }; o(get_parent_class($an/* x
 y */)  ?: "-");/* x
 y */ o(\T\names(class_implements($an)))	; 	o(//c
(string) /** @d */(	new \ReflectionProperty /*c*/ (/** @d */$an /*c*/ , "z"))->getType/* x
 y */(
))

;	 
o/* x
 y */(#c
\T\attrs(New
 \ReflectionObject($an/* x
 y */))//c
);
} }; $w/* x
 y */->	run();
ecHo//c
 '#59'
, "\n";
$id = 

\T\s(...); Echo  /*c*/ "<{$id(\Orig\Thing::X)}>", /* x
 y */"\n";#c

 # h
echo '#60'/* x
 y */,  "\n";
$f//c
 = //c
function (//c
#[\Nope//c
] #c
Orig\Thing|null/* x
 y */ $x):#c
 mixed { return /* x
 y */$x; }//c
; try {  $f(unserialize('O:10:"Orig\\Thing":0:{}'));/** @d */ o("accepted"); }#c
 catCH (	\TypeError $e) {   o#c
("TE"); }
use # h
  PDO as DB;
if (true) 

{/** @d */
echo '#62', "\n";
$arr = //c
[\T\s//c
(new Orig\Thing

)/** @d */ 

=>	 5]; echo "{$arr[\T\s(new Orig\Thing)]}\n";
echo

 '#63', 

"\n";
//c
o#c
(	v: \sleEp(/** @d */0#c
));
}
enum En65
: 	string

 implements /* x
 y */Orig\Contract { case A/* x
 y */ = 'a'; 

public  # h
function f((Orig\Contract//c
&\Countable /*c*/ )|/** @d */\Other\Thing
 $x): (Orig\Contract&\Countable)|\Other\Thing # h
 {//c
 //c
return $x # h
;#c
 }/** @d */ } /*c*/ 
EcHo /* x
 y */'#66'

,

 "\n"; 
o(En65::/* x
 y */A # h
 insTANCeof Orig\Contract ? 'y' :/* x
 y */ 'n' /*c*/ ) ;/* x
 y */


echo '#67' ,/** @d */ "\n";
//c
o( # h
get_class(En65::A->f(neW \Other\Thing())));
echo  # h
'#68', "\n";
o((string)/* x
 y */ 
(new 	\ReflectionMethod(En65
::A, 'f'	))->getReturnType())
;#c

#[Orig\Attr('v') /*c*/ , \Nope\Unk] # h

class /*c*/  C69  /*c*/ imPlements /*c*/  Orig\Contract # h
 {	
     # h
const Fp1/** @d */ = str_repeat(//c
...#c
)#c
;
    cONST Gp1 =	 

static/** @d */ fUnctiOn #c
( ?DB /* x
 y */$x	): mixed #c
{ retURN //c
\file_get_contents/** @d */('data:,hi');  /*c*/ };
     /*c*/ const ?/** @d */\Orig\Thing 	Kp2 =#c
 /** @d */null	;/* x
 y */
    const Np2  # h
= \Orig\Thing::class;
     public  ?	\Orig\Thing/** @d */ /* x
 y */$p3;
    public function declare(

\Other\Thing| int $x, $y =  # h
null)
: \Other\Thing|int  /*c*/ {	 $this-> # h
qp4 = \Other\StrTOUpPer	('ab'); return//c
 
$x;	 /** @d */} /* x
 y */public # h
 $qp4 ;/** @d */
    const /*c*/  ?\ArrayObject/** @d */ //c
Kp5 #c
=	 null; 
    Const Np5 = \ArrayObject::class;
    public#c
 	static $cp6 = '\Other\Thing' # h
; public static 

function mkp6() { return new 

static::/** @d */$cp6; /*c*/  }
#c
}//c

echo '#70' , "\n"; /*c*/ 
o(get_parent_class(new # h
 C69) ?: 	'-');//c

	echo '#71' ,  /*c*/ "\n"/** @d */;

	o(\T\names(class_implements/* x
 y */(new

 C69))

)/** @d */;


	echo # h
 '#72', "\n";
o(\T\attrs /*c*/ (#c
new \ReflectionClass	(

new	 C69)))/* x
 y */;
	echo '#73', "\n"/* x
 y */;

o( /*c*/ ( /*c*/ C69::Fp1)('z', 2#c
)#c
)
;
echo '#74',/** @d */ "\n"/** @d */;
o((C69:: /*c*/ Gp1)(/** @d */new \PDO('sqlite::memory:')) );
 /*c*/ echo /*c*/  
'#75'	,  "\n"//c
;/* x
 y */
	o((string)  # h
(

new \ReflectionClassConstant(

C69
::class ,  # h
'Kp2')) /*c*/ ->getType	());
echo '#76' # h
, "\n"; 
 o(C69::

Np2);
echo /*c*/  '#77', "\n"#c
;

o#c
((string)
 (new
 \ReflectionProperty(C69::#c
class,#c
  /*c*/ 'p3')
)->getType());//c

echo  /*c*/ '#78'	,

 "\n"	;
$q 	= neW/** @d */ 
C69;
 o	(get_class( /*c*/ $q->declare(new \Other\Thing/** @d */( # h
))));  # h
o($q->qp4);
echo '#79' ,
 "\n";
 o((string) (new \ReflectionMethod(C69::class,
 'declare')	)->getReturnType()

);
 /*c*/ echo '#80'//c
, # h
 "\n";
o(/* x
 y */(string) /*c*/  (new \ReflectionClassConstant(C69::class, 	'Kp5')/** @d */)	->getType());
echo '#81', #c
"\n"	;
o(get_class/** @d */(C69::mkp6(

)));	
#[Orig\Attr('v')/** @d */,  	\Nope\Unk]
 class C82 EXtEnDs	 \ArrayObject IMplEments /** @d */\Countable#c
 {
    public#c
 #c
function count

( )
: int/** @d */ {
  /*c*/ ReturN 7; 

}
    coNSt ?Orig\Base Kp1 = null;

    const Np1  = Orig\Base::class;
    public function __LINE__/** @d */(\Other\Thing #c
$x, $y # h
 	= # h
 /** @d */null): \Other\Thing	 { $this#c
-> /*c*/ qp2 = array_map
(null//c
, [1, #c
2]); return  $x;  # h
}/* x
 y */ public $qp2;
     const /** @d */Fp3 =/* x
 y */ File_GEt_conTenTs
(...//c
);
     # h
const  Gp3 = static//c
 function/** @d */ (?//c
Orig\Base $x): mixed { return array_map//c
(null,  /*c*/ [1,  # h
2

]);  # h
};
    

public

 /** @d */static FunctIon sp4(?\Orig\THinG

 $x 

= null):  /*c*/ static|\Orig\THinG|null //c
{ return #c
$x; }
    pUblic static ?#c
\Other\Thing
 $p5 = null;
    //c
public/** @d */ //c
function __construct	(public	 Orig\Thing|//c
(\Orig\Contract&\Countable)|\ArrayObject |null

 $p6 = null)  /*c*/ {}
} # h

echo 
'#83', "\n";
o(get_parent_class(new C82	) ?:/** @d */ '-'/** @d */);
/** @d */echo /*c*/   # h
'#84', "\n"
;
o(//c
\T\names
(class_implements (neW  C82)));
echo '#85', "\n" # h
;
o(\T\attrs( # h
new  \ReflectionClass	( /*c*/ new 

C82)

)	);/* x
 y */

eCHO '#86', /* x
 y */"\n";
/** @d */o((string) 	(/* x
 y */new #c
\ReflectionClassConstant(C82::	class,/** @d */  /*c*/ 'Kp1' /*c*/ )) ->getType());
ecHo # h
 '#87', "\n";
/* x
 y */o(
C82::Np1);
EcHo  /* x
 y */'#88',/** @d */ "\n";

 # h
$q = new C82; o(get_class # h
($q->__LINE__(new/* x
 y */ \Other\Thing)))

;  # h
o($q # h
->qp2 # h
);

 echo '#89'//c
, "\n"/** @d */;
//c
o
(#c
(string)
 
( /*c*/ new \ReflectionMethod(

C82::class/* x
 y */, '__LINE__') /*c*/ )->getReturnType());
ecHo '#90'/* x
 y */, "\n" # h
;
o # h
((C82//c
:://c
Fp3)

('data:,hi')//c
)/* x
 y */;/* x
 y */
echo 
'#91',/* x
 y */ "\n";
o(//c
(C82::Gp3) (new 

B//c
));


ecHo '#92' # h
,  "\n";
o(get_class(C82/** @d */::sp4(new
 Orig\Thing())));

echo '#93', "\n";/** @d */
o(#c
(string)	 (new  \ReflectionMethod

('App\Sub\\C82',

 'sp4'))/* x
 y */->getParameters/** @d */()/** @d */[0]->getType( /*c*/ ));
echo #c
'#94', 
"\n";
	o#c
((string) (NEW //c
\ReflectionProperty(nEw C82, # h
 'p5')) # h
->getType	()/** @d */); /*c*/ 
echo
 '#95', "\n";

/** @d */o((string) /* x
 y */(new //c
\ReflectionProperty(C82::class, 'p6'))-> # h
getType	()/* x
 y */);
}
