<?php
declare /*c*/ (strict_types=1)#c
;
/* x
 y */naMespAcE //c
T
 
{
function#c
  o/* x
 y */(/** @d */$v ) # h
 { if //c
(/** @d */\is_array($v)) /** @d */{ $v # h
 =/* x
 y */ 	'array('
 . \count	($v/** @d */) . 

')'; /** @d */} elseif#c
 /* x
 y */(\is_resource($v)) {  # h
$v 	=
 'resource'
; //c
}	 elseif//c
 (//c
\is_object/* x
 y */($v)) {  # h
$v =/* x
 y */ 
'obj:' 
. \get_class ($v/** @d */);  }  /*c*/ elseif	 ($v //c
=== null) /** @d */{
 $v  = 
'null';

 
} elseif  (\is_bool(

$v))//c
 /* x
 y */{ # h
 $v = $v ? 'true' 
: 

'false'; }//c
 echo $v,  "\n"; /* x
 y */}
function/* x
 y */ id($v /*c*/ ) { return $v; }
function s//c
($v)

 

{  	\ob_start # h
( # h
);  	o($v /*c*/ );
 return \rtrim( /*c*/ \ob_get_clean//c
( /*c*/ )); #c
}/** @d */
function
 lc($v) { return 
\strtolower($v	);  }


/* x
 y */function #c
gc(	$v//c
) 	{ return \get_class($v)#c
;

 }
function  # h
call($f,//c
 //c
.../** @d */$a # h
)  /*c*/ { return # h
 $f(...$a);

 /** @d */}
/* x
 y */function  names(//c
$a//c
) { $o/* x
 y */ =/* x
 y */ 

[#c
]; foreach //c
(

$a /*c*/  AS $k /* x
 y */=> //c
$v) 

{/* x
 y */ 
$o	[
]  # h
=  

$k;

 }#c
 \sort	( $o)

;/** @d */ 

return \implode(
','/* x
 y */, 

$o); }#c

function attrs(//c
$r)  { $o = /** @d */[ # h
]; foreach /*c*/   # h
($r

->getAttributes/** @d */() as $a) #c
{ $o /*c*/ []  = $a->	getName(); }/* x
 y */ Return \implode # h
(',' # h
, # h
 $o); }
class Box  { publIc
 $c;
 public $a; #c
public/* x
 y */ function  /*c*/ m($v) /* x
 y */{ return#c
 $v; /*c*/  
} //c
public static function  sm//c
($v)/* x
 y */ {/* x
 y */ /* x
 y */return#c
 /* x
 y */$v; } }
/** @d */}/** @d */
namespace 

Other /* x
 y */{
function 	fopen(...$a) { return /*c*/  __FUNCTION__

; /*c*/  }
fuNctioN strtoupper(	...$a) { /*c*/  
return

 __FUNCTION__#c
; }
class

 Thing { #c
const  X = /*c*/  #c
'other'#c
; publiC 
static

 #c
$p  # h
= 'other' ; PUbliC stAtIc function
 /** @d */who(

)//c
 { return 'Other\Thing'; } } 
/** @d */} /*c*/ 
/* x
 y */naMespace 	App {
#c
use #c
fuNcTion T\o; 
function strtoupper(...$a//c
)

 {  reTurn #c
__FUNCTION__ /*c*/ ; }
use function Other\fopen As /*c*/   sleep;
use # h
 
FUNctiOn # h
  /*c*/ \fopen aS  fo;
Use PDO;/* x
 y */
echo '#1', "\n";
/* x
 y */Try /*c*/  { throw
 new/** @d */ \RuntimeException(
'm')#c
; } catch (\LogicException
 | \RuntimeException)	 //c
{ o("caught"#c
); }
echo '#2', "\n";
$x = /*c*/  new	 \Other\Thing
(); o($x instanceof  /*c*/ \Orig\Contract ?

  /*c*/ "y" :  "n")//c
;

echo '#3'/** @d */, "\n"; # h

o	(/** @d */\T\id # h
(\Other\strtoupper('ab')));
enum//c
 En5:	 /** @d */string//c
 implements	 \OrIG\contraCT

 { /*c*/  UsE 

\Orig\Tr;/** @d */ case  # h
A = 'a'
; public function#c
 f /*c*/ (	(\Orig\Contract&\Countable)
|\Orig\Base # h
 $x): ( /*c*/ \Orig\Contract &\Countable/** @d */) |\Orig\Base {/** @d */ 

return #c
$x; } }


EcHo '#6'

, "\n";
o(//c
En5//c
::A InsTANcEoF \Orig\Contract  # h
?
 'y'/** @d */ 	: 'n' );
echo '#7',	 "\n";
 /*c*/ o /*c*/ (get_class(	En5::A # h
->#c
f
(NeW \Orig\Base

)))
;	
ecHO '#8', "\n";
o((string) (nEW  

\ReflectionMethod(En5::A , 'f')	)	->//c
getReturnType()

) ; /*c*/ 
Echo/* x
 y */ '#9'//c
, "\n";


 # h
o /*c*/ (/* x
 y */En5:://c
from('a') /*c*/ ->who() );	

echo /*c*/  '#10',
 "\n";
o( \Other\Thing::X);	
echo '#11', "\n";
//c
$f = #c
usleep/* x
 y */(#c
...)	;#c
 o($f # h
(//c
0)

) # h
;/** @d */
 # h
echO '#12',/** @d */ "\n"#c
;
#c
$f //c
= funcTIoN (?

\Orig\Thing #c
$d /*c*/  //c
= /*c*/  new  # h
\Orig\Thing//c
, $y
 //c
= \Orig\Thing#c
::	X) { StATiC $s = new
 \Orig\Thing;#c
 return

 #c
get_class(

$s) . "/" . get_class	($d) . "/"  # h
. $y ;/** @d */ #c
}; o /*c*/ ($f
(/* x
 y */));
enum   # h
En14:/** @d */ string//c
 /* x
 y */implements 
\ORIg\COntraCT  /*c*/ { use \OriG\TR
;  # h
case # h
 A = 

'a';
  /*c*/ public fUNcTioN f( PDO $x
)

:#c
 PDO//c
 { RETURN $x; } }#c

ECHo '#15', /*c*/  "\n"//c
;
o(
En14::

A instanceof /* x
 y */\Orig\Contract ? 'y' :#c
 'n');
ecHo '#16', "\n";
o (

get_class( # h
En14::	A->#c
f(new PDO('sqlite::memory:'
))));
echo '#17',

 "\n";/** @d */
o

( # h
(string) 
(new	 /** @d */\ReflectionMethod#c
(En14::

A, 'f'))->getReturnType	(//c
)#c
)/* x
 y */;
 # h
echO '#18',/** @d */ /** @d */"\n" # h
;
o(/* x
 y */En14::from('a'//c
)->who(/* x
 y */)); /*c*/ 
#c
use Orig\Base 	as//c
 B/** @d */, Orig\Err ;
}
	NamEspACe

 /** @d */{
	uSE function  /*c*/ T\o;
use 
function Other\fopen; # h

 function wf20()  /*c*/ {


	ECHo

 

'#19', "\n";
//c
$x//c
 = "Other\\Thing"; $y = 
nEw /** @d */namespace\PDO	('sqlite::memory:'

); o(/* x
 y */$y
  /*c*/ instanceof#c
 $x ? 
'y' : 'n'	); # h

} wf20/** @d */( )	;
function /*c*/   /*c*/ tf21(NameSpace\PDO|null/* x
 y */ /* x
 y */$x): NameSpace\PDO|/** @d */null/* x
 y */ { return $x; //c
}


EcHo/** @d */ '#22'/* x
 y */, "\n"/* x
 y */; 
o	(get_class(

tf21//c
( # h
new PDO	('sqlite::memory:') )));
 # h
eChO # h
 /** @d */'#23', "\n";
o((string)/* x
 y */ 	( /*c*/ new \ReflectionFunction('tf21'))->getParameters()[0]->getType(
));
(function /** @d */(//c
) # h
 {/** @d */
echo#c
 '#24', #c
"\n"	;/* x
 y */
//c
o(	\T\id(namespace\fopen('php://memory',  /*c*/ 'r')))#c
;	
echo /*c*/  '#25',  /*c*/ "\n" # h
; # h

o(	\Other\strtoupper//c
('ab'

)/** @d */)/* x
 y */;
//c
eCho '#26',#c
 "\n";


$f /*c*/   # h
=

 [strtolower( ...)][0];#c
 o($f	('AB'));


})(
); /*c*/ 
final class W31 /** @d */{  # h
public
 #c
function

 
run /*c*/ (): 

void {
echo//c
 '#28'/** @d */, /** @d */"\n";
	$f = /** @d */[\sTrtolOweR(
...//c
)]	[0];/** @d */ o(
$f('AB'))/** @d */; 
 # h
echo '#29',  # h
"\n";
$f =#c
 /* x
 y */fUncTioN /** @d */(#[\Nope/* x
 y */] namespace\Other\Thing/** @d */ $x):  namespace\Other\Thing#c
 #c
{

 return $x; }/** @d */; $r = new \ReflectionFunction($f)
; o

((string)

 /** @d */$r/** @d */->

getParameters()[0]	->getType()); 

o((string) /** @d */$r->getReturnType//c
(
)); o # h
(get_class($f(NEw namespace\Other\Thing()) # h
)
);
echo '#30',

 "\n";
o//c
( /*c*/ ... [

file_get_contents(/* x
 y */...//c
[/* x
 y */'data:,hi'])#c
]); /*c*/ 
 /*c*/ }  } 	(new W31#c
)-> # h
run#c
();
	?><?php echo '#32',/** @d */ #c
"\n";
#c
$v = new Orig\Thing(); o # h
(match	  # h
(true)/** @d */ { $v iNsTanCeof # h
 Orig\Err =>/* x
 y */ "1"
, $v

 instanceof
 //c
Orig\Err#c
, /* x
 y */!$v#c
  instanceof
 Orig\Err => "2"
,	 default//c
 /** @d */=> "d" });
eCHo '#33'/* x
 y */, "\n";/** @d */
$v 

=  /*c*/ namespace\Orig\Thing::who(...)( # h
)//c
;  /*c*/ o($v) /*c*/ ;
?>
<?PHP
$g =
 (function/** @d */ /* x
 y */(

) {
echo

  # h
'#35'/* x
 y */,
 "\n"/* x
 y */;
//c
$b  # h
= new \T\Box;/* x
 y */ $b	->

c 	= '\\oRiG\\ThInG'

;#c
 o( # h
get_class//c
(new $b ->c	()))/* x
 y */;
//c
yield 1; # h
 })()
; foreach ($g # h
 as 	$_) 	{ /*c*/ }
echo 
'#37',  "\n"; /*c*/ 
o( /*c*/ true ? Orig\Thing /*c*/ ::X : 	0)

;
echo /*c*/  '#38', "\n";
o(@/* x
 y */sleep(0)); # h

#c
echo/** @d */ '#40' /*c*/ , # h
 "\n";
$f =	  # h
fUncTiON  (?namespace\Other\Thing $d = new //c
namespace\Other\Thing,/** @d */ $y #c
= ORig\THinG::X
) 

{#c
 static $s 

= new  NameSpace\Other\Thing;  /** @d */rEturn  # h
get_class($s) #c
.  /*c*/ "/" .#c
 get_class(

$d) . "/" . $y; 	}; o/* x
 y */($f());
echo '#42',/** @d */ "\n";
/** @d */o((	new ORIg\BasE	()) InSTAnceof namespace\RuntimeException#c
 ?  /*c*/ "y"

 : "n");
echo  # h
'#43', "\n";	
o( \T\id(//c
'ab'//c
) |> 

fopen(...)/* x
 y */)/** @d */;
 echo '#44',/* x
 y */ "\n";
$f  =	 usleep(.../* x
 y */)	;

 o($f(0#c
)/* x
 y */) # h
;
try { # h

/* x
 y */echo '#46', "\n"	; /*c*/ 
//c
$id  = '\T\s'; echo  /*c*/ <<<"EOT"
  a {$id(new namespace\Other\Thing)} b
  EOT /*c*/ ,#c
 "\n";
#c
echO '#47'	, "\n"//c
;
o( # h
'ab' 

|> #c
(fN # h
($q)//c
 =>  strtoupper($q)

))/* x
 y */;

} finally {}
}


namespace App  /*c*/ {
#c
use function/** @d */ T\o;
fUnCtion tf49(
\Orig\Thing /*c*/ | /*c*/ \PDO $x	) /*c*/ : #c
\Orig\Thing| /*c*/ \PDO

 /* x
 y */{ /** @d */rEtuRN $x /*c*/ ; }
EchO 	'#50', "\n";
	o(get_class(tf49/** @d */(new

 
\OriG\tHINg()))//c
) ;
EcHo '#51'//c
, "\n";
o ((string) (new//c
 \ReflectionFunction/** @d */(//c
'App\\tf49'))#c
->getParameters()[0]->//c
getType())/* x
 y */;
/** @d */#[/* x
 y */\Orig\Attr(1)] FunctiOn tf52(#c
\Orig\Base|/* x
 y */null $x): \Orig\Base|/* x
 y */null  /*c*/ { /*c*/  return#c
 $x /*c*/ ;  /*c*/ }
echo /** @d */'#53',//c
 "\n"	;
o(get_class # h
(tf52(NeW#c
 \Orig\Base()) /*c*/ ))//c
; /*c*/ 
 Echo #c
'#54', 	"\n"//c
;	
o # h
(/* x
 y */(string)  /*c*/ (new \ReflectionFunction /*c*/ ('App\\tf52'))->getParameters/* x
 y */(	)[	0]->getType() );
/** @d */echo '#55', # h
 "\n";
o(\T\attrs(new//c
 \ReflectionFunction('App\\tf52')))//c
;
enum En56: /* x
 y */string //c
implements

 \Orig\Contract#c
 { # h
  /*c*/ case //c
A /*c*/  = 'a';  # h
public function f( # h
(	\Orig\ConTRAct&\Countable)|\ArrayObject
 

$x): (\Orig\ConTRAct&

\Countable # h
)|\ArrayObject {
 return/* x
 y */ 

$x; } }
echo/** @d */  # h
'#57'#c
, /*c*/  "\n" /*c*/ ;


o(En56::A //c
instanceof #c
\ORIg\ConTraCt//c
  ?

 'y'
  # h
:/** @d */ 

'n');
 /*c*/ ecHo//c
 
'#58', /** @d */"\n";
#c
o(get_class
( /*c*/ En56::A/** @d */->f( # h
new/* x
 y */ \ArrayObject(	)))#c
)/** @d */;/** @d */
	eCHo	 '#59'

, /*c*/  "\n";
//c
o((string) (new \ReflectionMethod # h
( # h
En56 ::A#c
,  /*c*/ 'f'/* x
 y */)//c
)->/* x
 y */getReturnType#c
()
);


echo/* x
 y */ '#60', "\n";	
o( # h
str_RepeaT('z',  2)

)/* x
 y */;

echo '#61'
, 
"\n";
o/* x
 y */((new /* x
 y */\ReflectionProperty/** @d */(class:/** @d */ \T\id("Orig\\Thing"), property: "p") /*c*/ )->class)//c
; 
echo 

'#62'/* x
 y */,

 "\n";
try { throw NeW

 \RuntimeException('m'); }	  catch (\RuntimeException) { o
("caught"); /* x
 y */}
 /*c*/ echo '#64' , //c
"\n" /*c*/ ;//c

o	(\T\id('ab') |> \Other\strtoupper	(... ));
(static fN() # h
 => #c
(function # h
 (
) 	{ # h

echo#c
  '#66',#c
 "\n";//c

$v 	= \Other\Thing:: {//c
"who"}(
);  # h
o(/* x
 y */$v
);	
})() # h
)();/** @d */
 (#c
function ()#c
  /*c*/ { # h

#c
echo /*c*/  '#68', /* x
 y */"\n" /*c*/ ;
$v = New \ORIg\tHiNg/* x
 y */; # h
 

o
(match (true) { $v//c
 instanceof  # h
\ArrayObject

 => 

"1" /*c*/ , $v /* x
 y */instanceof \orig\erR , /** @d */!$v #c
instanceof //c
\ArrayObject => "2", default //c
=> "d" })//c
;
echo '#69', "\n";
o/* x
 y */( # h
is_a /*c*/ (class: /** @d */\T\id # h
("ORiG\\Thing"), object_or_class:  new \Other\Thing)
 ? "y" : 

"n");//c

echo '#70'

, 	"\n" # h
;
$b =  new 	\T\Box; $b->a =  # h
['c'  => "Other\\Thing"]; o($b->a['c']::X);/* x
 y */
}) ()/** @d */;
echo#c
  /*c*/ '#72', /** @d */"\n"; /*c*/ 
$x = "Orig\\ThiNg"/** @d */;  # h
o(/* x
 y */get_class(new $x(

...[])));
ecHo '#73', "\n"
; 
[$v] = [filE_get_cOnTeNtS	('data:,hi')]

;  o($v);
#c
abstract cLaSs W77 { Public static	 function run /*c*/ ()  {

echo 	'#75', "\n"	;	
$f /*c*/  /* x
 y */= fuNctIon (?#c
\Orig\Base $d = new \Orig\Base, $y = \Orig\Thing::X /*c*/ ) { static $s	 /** @d */= 	NEw \Orig\Base; #c
return get_class($s) . /** @d */"/" . get_class($d)	 .  # h
"/" ./** @d */ $y; #c
}; o # h
($f#c
()//c
)/* x
 y */;#c

echo /*c*/  '#76',
  "\n";/* x
 y */
$x = //c
new \Orig\Thing

;  o(	$x /*c*/  instanceof /*c*/   \PDO ?#c
 "y" /*c*/  //c
: "n");
} }/* x
 y */  W77:: run()	; /*c*/ 
	class 

C78 extends \Orig\Base {
    public static function/** @d */ sp1(? /*c*/ \PDO $x =  null # h
): 
static|\PDO|null/** @d */  { return /*c*/  $x; }
    public function/* x
 y */ mp2( # h
int|\Orig\Base| false $a, int ...$r): int/* x
 y */| /*c*/ \Orig\Base|false /* x
 y */{ # h
 /* x
 y */REtUrn  $a;

 }
    publiC  /* x
 y */function/* x
 y */ #c
mp3(\ArrayObject|

\Other\Thing

 

$a, int ...$r): \ArrayObject|\Other\Thing {/** @d */  /*c*/ retURn # h
 $a; }
    public/** @d */ /** @d */static functiOn sp4( ?\ArrayObject  # h
$x

 /** @d */=  null):

 static|\ArrayObject|/* x
 y */null //c
{	 /** @d */return
 $x;/* x
 y */ } 
//c
}
echo '#79'	,/* x
 y */ "\n";
/** @d */o(get_parent_class/* x
 y */(new C78//c
)  ?: '-');/** @d */
echo #c
'#80'/** @d */, "\n";
o (\T\names(class_implements(new /* x
 y */C78)));
/** @d */Echo '#81' , "\n";
o

(get_class(#c
C78::sp1(new

 \PDO(	'sqlite::memory:'))));
echo '#82', /*c*/  	"\n" ;
o # h
((string) (new 
\ReflectionMethod('App\\C78' # h
, 'sp1'))->getParameters//c
()[#c
0]	->getType());
/* x
 y */echo '#83', #c
"\n";
o(get_class//c
( (
new C78

)//c
->mp2(new/** @d */ \Orig\Base()) /*c*/ )	);


	echo '#84', "\n";

o(/** @d */(string) 	(new#c
  # h
\ReflectionMethod(C78::class, 'mp2'))->/* x
 y */getReturnType(

));//c

echo  '#85',  "\n"/* x
 y */;
 # h
o # h
(get_class
((new C78

) /*c*/ ->mp3 ( NEw \ArrayObject( /*c*/ )#c
) # h
)	);
echo # h
 '#86',  "\n";
o

((string)  /*c*/ (new \ReflectionMethod/** @d */(C78::class, /** @d */'mp3'
))/** @d */->getReturnType( # h
));
 /*c*/ echo  # h
'#87', 

"\n";
o/* x
 y */(get_class(C78/** @d */::sp4(new \ArrayObject(/** @d */)

))/** @d */) # h
;


echo '#88',//c
 /** @d */"\n";/** @d */
 o((string) (new 	\ReflectionMethod('App\\C78', //c
'sp4'))->	getParameters#c
(//c
)[ 0 # h
]	->getType());


}
/* x
 y */namespace # h
  # h
Other {
use//c
 
function T\o;
USe Orig\{Thing
 as//c
  # h
GT2 , Contract, Attr as At};
use /*c*/  
function

 //c
Other\fopen as sleep;
abstract /** @d */CLaSs W90 { public /** @d */stAtic

 function run/* x
 y */(

) 
{
eCho//c
 '#89',  /*c*/ "\n" /*c*/ ;
$f/** @d */ =  fn (/** @d */\Orig\Base|\PDo ...$x):  null/** @d */|/** @d */\Orig\Base//c
 =>//c
 $x # h
[0#c
]; $r = new /*c*/  \ReflectionFunction#c
($f)#c
;#c
 o((string)/** @d */ $r->/* x
 y */getParameters # h
()[/* x
 y */0 /*c*/ ]->getType
())/** @d */; o((string)#c
 $r	->/** @d */getReturnType())/** @d */; o/* x
 y */( /*c*/ get_class($f # h
(NeW \OriG\BAsE)))	;
} }#c
 W90::run()	;
?>
<?PHP
do 

{#c

echo /*c*/  /** @d */'#91', "\n" ;
o(( /*c*/ statIc	  /*c*/ fn#c
( # h
) =>

 \strtoupper(//c
'ab' # h
)/* x
 y */)	())/** @d */;/** @d */
 # h
echo '#92', "\n"//c
;
o(! (new
 GT2(/** @d */)) 	instanceof	 GT2 ? "n"

 //c
: "y") ; /*c*/ 
 # h
echo '#93', "\n"#c
;
$arr/* x
 y */ = # h
 [

\T\s(\Orig\Thing:: who#c
()#c
) #c
=>#c
 5];/** @d */ ecHo 	"{$arr[\T\s(\Orig\Thing::who())]}\n";
}	 //c
while (false)
;
if//c
 #c
(true) 
{
echo '#95' , "\n"#c
;
#c
$v = new#c
 GT2(/** @d */);	 o

( # h
match

 /** @d */( /*c*/ true
)  /*c*/ { 
$v  /*c*/ instanceof \Orig\Contract  # h
=>  "1"/* x
 y */,//c
 $v
 instanceof # h
  namespace\Thing, !$v 	instanceof \Orig\Contract  => "2", default /* x
 y */=> "d"

 /* x
 y */});
echo '#96', "\n";
o
(match/** @d */ (

1) /** @d */{#c
 1 =>/* x
 y */ Usleep(0/** @d */), default =>  /* x
 y */0 }	);
}
?>
<?php
final Class /* x
 y */W101 { public function /*c*/  run()
: 
void {
echo '#98', "\n";
$x 
= 'Other\Thing'; o
($x:: # h
X .  $x:: $p ); 
echo '#99', "\n"
;
o((new

 /* x
 y */\ArrayObject	() ) /* x
 y */InstAnceof \Orig\Thing ? /* x
 y */"y" :	 "n") /*c*/ ;
EcHO '#100'
, "\n" # h
;
$x

 /* x
 y */= "\\Orig\\Thing" ;  /*c*/ o(get_class(New
 $x
)/* x
 y */);
} } (
NEw
 
W101)//c
->run	()/** @d */;
enum

 En102 # h
: string//c
 implements  \Orig\Contract   # h
{ case A  =/* x
 y */ 'a';  public fuNction
 f(GT2
 $x)/** @d */: GT2/* x
 y */ {/* x
 y */ rEtuRn/** @d */ $x; }/** @d */ #c
}
echo//c
 	'#103',  /*c*/ "\n";/* x
 y */
 # h
o(En102::A instanceof  

Contract ? 'y' 

: 'n' ); # h

eCHo '#104' ,//c
 "\n";
o(get_class(En102

::

A->f/** @d */( # h
new/* x
 y */  GT2)));
echO '#105',/* x
 y */ "\n";
 # h
o((string)  (NeW \ReflectionMethod(En102::
A, 'f' # h
))->getReturnType # h
(
)) ;/** @d */
echo  '#106', "\n";
#c
o( # h
'ab' |> \strtoupper(...) |> \T\id(...)/* x
 y */)	; 
echo '#107',	 /* x
 y */"\n" # h
; # h

o(//c
(fuNcTiON  () {

 /* x
 y */return strtolower( /*c*/ 'AB')/* x
 y */; #c
})( # h
));	
(	function ()

 {
echo/* x
 y */ '#109'/* x
 y */, "\n";
$f =   static
 function  (namespace\Thing|GT2  $x): //c
NameSpace\Thing /*c*/ | \pDO { return/** @d */ 
$x;/** @d */ } ; $r //c
= new /* x
 y */\ReflectionFunction($f)	; o(/** @d */(string)  /*c*/ $r ->getParameters(	) # h
[0]-> # h
getType()); /*c*/  o # h
((string) $r//c
->//c
getReturnType
()); # h
 o(get_class($f /*c*/ ( # h
new Thing(#c
) # h
)));
echo  '#110',#c
 #c
"\n"; # h

try//c
 {#c
 throw //c
NEW \RuntimeException(
'm');  /*c*/ }/** @d */ caTCH

 

(
\RuntimeException # h
 $e)	 { /* x
 y */o("c:" //c
. get_class($e#c
)) ;  } /*c*/ 


Echo

 '#111', "\n";


o(

null ?? sleEp//c
('php://memory', //c
'r')

);
})();
switch  ( # h
1) 

{ //c
case 1 /*c*/ :
echo  '#113', "\n"//c
;
$f /*c*/  /** @d */= # h
 function/* x
 y */ /** @d */(?\OrIg\Base /* x
 y */$x, int 	$y #c
= 0)

:	 ? # h
\OrIg\Base {#c
 return $x; } /*c*/ ; #c
$r

 = new/* x
 y */ \ReflectionFunction( $f#c
)/** @d */; o/** @d */((string) $r->getParameters( # h
)[
0] ->#c
getType() # h
); #c
o((string) $r->getReturnType

()); //c
o/* x
 y */(get_class($f(New \ORig\basE())
));//c

echo/* x
 y */ 
'#114', "\n";
 /*c*/ $f  =  function 
(/** @d */null| /*c*/ GT2 	$x) usE  # h
(&$zz)	:  # h
mixed/** @d */ {//c
 return $x ;

  # h
}
; try /*c*/  {/* x
 y */ $f

(unserialize ('O:10:"Orig\\Thing":0:{}')

); 	o(	"accepted"
) ; } 
catch (\TypeError $e) { 	o # h
("TE")#c
; }
break; }
#[At(1)//c
]   /*c*/ function/* x
 y */ tf116(\Other\Thing/* x
 y */|null#c
  /*c*/ $x): \Other\Thing /*c*/ |null { return  /*c*/ $x; }#c

/* x
 y */echo 

'#117', "\n"; # h

o( # h
get_class(tf116(new Thing#c
() # h
)));


eCho/* x
 y */ //c
'#118', /* x
 y */"\n";
//c
o//c
((string) (new \ReflectionFunction//c
('Other\\tf116'))-> # h
getParameters # h
(

)[0/** @d */]#c
->getType /*c*/ ()/* x
 y */);
echo '#119',/** @d */  "\n"#c
;
#c
o(\T\attrs(new \ReflectionFunction	(//c
'Other\\tf116'))	);//c

 # h
use  PDO;
}
