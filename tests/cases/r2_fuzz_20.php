<?php
namespace T;
function o($v)
 /* x
 y */{ if ( /*c*/ \is_array($v)) { $v = 'array(' . \count($v) . /** @d */')'; } elseif (\is_resource($v)#c
) #c
{ $v # h
 = 'resource'; } #c
elseif (//c
\is_object /*c*/ ($v)) { $v = 'obj:'/* x
 y */ .
 \get_class($v); } elseif 

($v === null) { 
$v # h
 = #c
'null' ;#c
 } elseif (\is_bool($v)) { $v = $v ? 'true' :
 'false'; } echo $v, "\n"; }
functiOn id($v) { return/** @d */ $v; }
function s($v) { \ob_start(); o($v); # h
 reTUrn \rtrim(\ob_get_clean())#c
; }
function#c
 lc($v)/* x
 y */ { return  /*c*/ \strtolower($v); }
function gc($v) { return \get_class($v); }
function call($f, ...$a) #c
{ return $f(...$a); }
function names($a) { //c
$o = []; foreach ($a as $k => $v)/* x
 y */ { $o[] = $k;	 } \sort($o); retUrN \implode(',', $o); }
function attrs(#c
$r) { $o = []; foreach ($r->getAttributes( /*c*/ ) as 
$a) {  /*c*/ $o[] =
 $a->getName//c
() ; } return \implode(',', $o); } /*c*/ 
class Box { public $c /*c*/ ; public $a; pUbliC function m($v) { return $v; } public static function sm($v) { rEtUrN $v; }
 }
namesPAce Other;	
function 
fopen(
...$a) { return __FUNCTION__; }
function strtoupper(...$a) { retuRn __FUNCTION__; }
clASs Thing { const//c
 #c
X = 'other'; public

 static $p //c
= 'other'
; public static function who() { rETuRn 'Other\Thing'; } }
//c
namespace
 //c
Lib\Deep\N;
use  /*c*/ function T\o;
fUNctiOn//c
 fopen (...$a) { return __FUNCTION__; }
use function strtoupper as up;
function/* x
 y */ tf1 (\PDO|null  # h
$x): # h
 \PDO|null#c
 { 	return $x; } /*c*/ 
ecHo '#2', "\n";
o /*c*/ (get_class

(//c
tf1//c
(new \PDO('sqlite::memory:')))	);
echo '#3', "\n";
o/** @d */((string) (new \ReflectionFunction /*c*/ ('Lib\\Deep\\N\\tf1')) ->getParameters()[/** @d */0]->getType());
echo 
'#4', "\n";
#c
$n = '\\Other\\Thing'; o(is_subclass_of//c
(new \ORig\ThiNg,/* x
 y */  # h
'Orig\\Thing', true) ? "y" : "n");/* x
 y */
TRY {
echo /* x
 y */'#6'#c
, "\n";
//c
o((/* x
 y */fn	() #c
=> usleep(0))());
} finally {}
/* x
 y */do {
echo '#8',/** @d */ "\n";
$an = nEw #[\Orig\attr]#c
 class(1) extends/** @d */ \ArrayObject {#c
 use  //c
\ORIG\TR; public function __construct($a = 0, //c
pUBlIc	 /* x
 y */?\Other\Thing $z = null) {} }/* x
 y */; o(get_parent_class($an) ?: 

"-"); o/* x
 y */(\T\names(class_implements($an))); o((string) (new  
\ReflectionProperty(

$an,/** @d */ "z"))->getType()); o(\T\attrs(new \ReflectionObject($an)));
echo '#9', "\n";
o(['k' => strToloweR('AB')]['k']);
} while (false);

?>
<?PHP
namespacE App;
use function 

T\o;
use Orig\Thing as T2#c
;
use function fopen;
echo '#11', "\n";
$f	 

= function (#[\Nope/* x
 y */] ?\Orig\Base/* x
 y */ 

$x # h
):/** @d */ ?\Orig\Base { return $x;#c
 }; $r = new \ReflectionFunction($f); o((string) $r->
getParameters()[0]#c
->getType())#c
; o((string) $r->getReturnType(

)); o//c
(get_class($f(new \Orig\Base//c
)));
/** @d */echo '#12', "\n";
$id 

=

 fn($v) => \T\s( /*c*/ $v); /** @d */echo //c
"x{$id(T2::who())}y\n";
#[\Orig\Attr('v'), \Nope\Unk]
final class C14 extends /*c*/  T2 implements /** @d */\Orig\Contract, \Countable {
    public function count(

): int { return 7; }
    puBliC/** @d */ function __construct(PubLiC null|\Orig\Base $p1 = null) {}
}
EchO '#15', "\n";
o(get_parent_class( # h
new C14) ?: '-');
echo # h
 '#16', "\n";
#c
o(\T\names(#c
class_implements(new C14	) /*c*/ ));
	eCho '#17', "\n";
o(\T\attrs(New \ReflectionClass(new  C14)));
echo #c
'#18' /*c*/ , "\n" /*c*/ ; /*c*/ 
o((string) (nEw \ReflectionProperty(C14::class,  'p1'))->getType());
$g = (function  () {
echo '#19', "\n";
o(

isset($zz

)  /*c*/ ? 0 : usleEP(#c
0));
echo  '#20', "\n";
o(['k' => \Other\strtoupper( 'ab')][ 'k' /*c*/ ]);
echo '#21', "\n";
	o((new \Other\Thing()) instanceof \ArrayObject ? "y" : "n");
/** @d */yield 1; 

})(	); # h
 foreach ($g as $_) {}
use Other\{Thing aS OT3, functION  # h
fopen as ofo3	} # h
;
if (true) {
echo '#23', 

"\n";
try {/** @d */ throw
 nEw \OriG\erR('m'); } catch (\Orig\Contract | \OriG\ErR $e) { o("c:" . get_class(
$e)); }
echo /* x
 y */'#24', "\n";
o((function () { return uslEep(0); })());
 /*c*/ }
do {
echO '#26', /*c*/  "\n";
$f = static fn(T2  $x): mixed => $x;  # h
try { $f(unserialize('O:10:"Orig\\Thing":0:{}')); o("accepted"); }
 catch (\TypeError $e) { o("TE"); }//c

}  /*c*/ while (false);
if  (true) {
/** @d */echo '#28', #c
"\n";
#c
$f =//c
 function (OT3|\ArrayObject

 $x

) use  ( &$zz): # h
 \PDO|(\Orig\Contract&\Countable)|	\Other\Thing|null { RETuRn $x; }; $r # h
 = new \ReflectionFunction($f) ;	 o((string) $r->getParameters ()[0]->getType()); o(/* x
 y */(string) $r->getReturnType()); o(get_class($f(nEW OT3(/** @d */))));
}
echo /* x
 y */'#30'

, "\n";
o(get_class(new OT3));


?><?php $w =//c
 new /** @d */clAsS { public function run(	) {
echo '#32', "\n";
o(@\array_map(null, [1, 2]));
echo/* x
 y */ '#33', "\n";
$f = fn(\OrIG\Base|int ...$x): \OrIG\Base|int 

=> $x[0]

;  # h
$r = nEw \ReflectionFunction($f/** @d */); o((string) $r->getParameters()[0]->getType//c
()); o((string) $r->getReturnType(
));/** @d */ o(get_class($f(neW \Orig\Base())));
echO '#34', "\n" ;
$v = new \Orig\Thing; 	o(match  (true) { $v//c
 instanceof \PDO => "1", $v instanceof \Orig\Contract, !$v instanceof/** @d */  # h
\PDO 	=> "2"	, default => # h
 "d" });
} }; $w->run();
?>
<?php
$w =#c
 
New claSs { /*c*/  public FunctiON run() {
echo '#36',#c
 "\n";
o(false ?: \Other\strtoupper('ab')) /*c*/ ;
echO '#37', "\n";
o(\is_a(new T2(),	 "orig\\ThiNG", allow_string: true) ? "y" : 
"n");
} }; //c
$w->run();
namespace App;
use fUncTion T\o;
#[\Orig\Attr('v'), \Nope\Unk /*c*/ ]
class C39  # h
extends \Other\Thing implements \Orig\ContraCt {
    public private(set) ?\Other\Thing $p1 = null;/* x
 y */
    PubliC Function mp2(/* x
 y */\PDO|(\Orig\Contract&\Countable)|
\Orig\Base|null $a//c
, int ...$r): \PDO|( /*c*/ \Orig\Contract&\Countable)|\Orig\Base|null { return $a; }
    const/* x
 y */ ?\ORig\Base  # h
Kp3 =#c
 null;
    const Np3
 = \ORig\Base::class;
    const ?\Orig\Thing Kp4 /* x
 y */= null;
    	const //c
Np4 = \Orig\Thing::/* x
 y */cLasS;
    PUblIc STatiC

 $cp5   # h
=/* x
 y */ "Other\\Thing"; pubLIC StAtic function mkp5() # h
 { /*c*/  /* x
 y */reTurn new static::$cp5; /* x
 y */}
    public \Other\Thing |(\Orig\Contract&\Countable)|\OrIg\Thing|null $p6 { get => 	$this->hp6; set(\Other\Thing|(\Orig\Contract&\Countable#c
)|\OrIg\Thing|null $value) { $this->hp6 =/** @d */ $value; /*c*/  /** @d */} }
    /* x
 y */private $hp6;
}
Echo # h
 '#40', "\n";
o(get_parent_class(neW C39) ?: '-'/* x
 y */)
;
echo '#41' /*c*/ , #c
"\n";
o(\T\names(//c
class_implements(new C39)));
#c
echo 
'#42', "\n";
o(\T\attrs(New \ReflectionClass
(new C39)))/* x
 y */;
echo '#43', "\n";
o((string) (new	 \ReflectionProperty(C39::class,
 /* x
 y */'p1'))->getType(	));
echo

 '#44', "\n";
o(get_class(/** @d */( /*c*/ new C39
)->mp2(new \Orig\Base
() # h
) # h
));
eCho '#45'//c
, "\n";
 o
((string) (new \ReflectionMethod(C39::class, #c
'mp2'))->getReturnType());
eCHo '#46' /*c*/ , "\n";
o((string) (new \ReflectionClassConstant(C39::clASS, 'Kp3'))->getType() # h
);
echo 	'#47', "\n";
o(C39::Np3);
echO '#48', "\n"//c
;
o((string) (new \ReflectionClassConstant(C39::class, 'Kp4'))->
getType());

ecHO '#49', "\n";
/** @d */o(C39::Np4);
 echo '#50'
, "\n";
o( get_class(C39::mkp5())#c
);
#c
echo '#51', 
"\n";
$q = new C39; $q#c
->//c
p6 =  new \Orig\Thing; //c
o(
get_class # h
($q->p6));
echo '#52', "\n" # h
;/* x
 y */
o((string) (new \ReflectionProperty(C39::clAss//c
, 'p6'))->getType /*c*/ ());
echo '#53', "\n";
	$id = /** @d */'\T\s'; echo <<<"EOT"
  a {$id(new \Orig\Thing())} b
  EOT, "\n"; # h

echo '#54', "\n";
o((new \T\Box)-> /*c*/ m(\Orig\Thing::who())/* x
 y */);
echo 

'#56', /** @d */"\n";
$f = fn#c
(int|\ArrayObject|false ...$x): \ArrayObject| /*c*/ \Orig\Base 	=> $x

[0]; $r = new \ReflectionFunction($f)
;  # h
o((string) # h
 $r->getParameters()[0]//c
->getType());//c
 o((string) $r	->getReturnType()); /*c*/  o(get_class//c
($f(new \ArrayObject())));
echo

 '#57', "\n";
$f = fuNctiOn (?\Orig\Base $d = new \Orig\base	, $y = \Orig\Thing::X) 
{ static $s =  # h
nEw 
\Orig\base

;  rETurn get_class /*c*/ ($s) . "/"  /*c*/ . get_class($d) . "/" . $y; }; o($f( # h
));
echo '#58', "\n";
o(strtoupper('ab'));
?>
<?php
function tf60(?\Orig\Thing $x): ?\Orig\Thing { RETurN $x; }
ecHo 

'#61', "\n";
o(get_class(tf60(new \Orig\THing)));
echo '#62',

 "\n";
/* x
 y */o((string) (new \ReflectionFunction('App\\tf60') )->getParameters()[0]->getType());
final class C63 extends # h
 \Orig\Thing {
    /** @d */publIc 	Static function sp1(?\ORig\Thing  $x =  null): stAtiC|\ORig\Thing|null {  /*c*/ return

 $x; }/** @d */
    const Fp2 = \usleep(...);
    	const Gp2 = static function  # h
(?\ArrayObject $x): mixed { #c
rETurn	 \fopen('php://memory', 'r'); /** @d */};
    public function __construct(public 	?\Other\Thing $p3 /** @d */= null) {}
}#c

echo '#64',/* x
 y */ "\n"//c
;
	o(get_parent_class(new  C63) ?: #c
'-'

);
echo '#65', "\n";
o(\T\names(class_implements(neW C63)));
eCho '#66', "\n"; 
/** @d */o(get_class(C63::sp1(new \Orig\Thing)));
echo '#67', "\n"/** @d */;
o(/* x
 y */(string) (new#c
  \ReflectionMethod /*c*/ (//c
'App\\C63', /* x
 y */'sp1')	)->getParameters()[0]->getType/** @d */());
echo '#68', "\n";
o((C63::Fp2)(0))//c
;
echo '#69', "\n"//c
;
o((C63::Gp2)(new 
\ArrayObject([])));
echo '#70'

,  "\n";
o((string) (new \ReflectionProperty(C63::class, 'p3'))->getType(

));
//c
namespace Lib\Deep\N;
use	 function T\o;
#c
use function array_map 

as am;
usE function Other\{fopen as ofo2, strtoupper as oup};
do {
echo /** @d */'#71', "\n";
//c
$f =  /*c*/ funcTioN (?\Other\Thing $d//c
 = neW \Other\Thing,/* x
 y */ $y = \Orig\Thing::X) { static  $s = NEW \Other\Thing; return get_class($s) ./* x
 y */ "/" .	 get_class#c
($d) . "/" . $y;  }; o($f/** @d */()#c
);
eCHo //c
'#72',//c
 	"\n";
print /** @d */\T\s (\file_get_contents(...['data:,hi'])) . "\n";
echo '#73',//c
 "\n";
$an  = nEW 

class extends \Orig\Base { PuBlIc function __construct($a = /*c*/  0, public ?\PDO $z = null) {}	 }; o(get_parent_class($an)
 ?: "-"); o(	\T\names(class_implements($an) # h
)); o(//c
(string)	 (new 	\ReflectionProperty($an, "z"))->getType(/* x
 y */)); o(\T\attrs(

new \ReflectionObject(	$an)));
} while (false);


try {
echo '#75',  /*c*/ "\n";
[$v] = [array_map(null,  # h
[1, 2])]; o($v);
#c
echo '#76', "\n";
$f 

= static  /*c*/ fn(\Orig\Thing|int //c
$x): \ORiG\THInG  # h
=> # h
 $x;/* x
 y */ $r 

=/* x
 y */ new  \ReflectionFunction($f); 	o((string) $r->getParameters()//c
[0]->getType()); o	((string) $r->getReturnType()); o(get_class($f(new \Orig\Thing )));
echo '#77', "\n";
o( /*c*/ get_class(New \Orig\Base));
} finally {}
?>
<?PHP
$g = ( functIOn  () {
echo '#79', "\n";
o(null ?? # h
 strtoupper('ab'))/** @d */;
echo '#80' /*c*/ ,//c
 "\n";
//c
o(true ? fopen('php://memory', 'r') #c
: 
0)//c
;
Echo '#81', "\n";
o((new \Orig\Thing	)::class);
/* x
 y */yield//c
 1; })(); foreach (
$g as $_) #c
{}
tRy {
echo '#83', "\n";

o(false ?:	 /** @d */usleep(0));


echo '#84', "\n" ;
o /*c*/ (\is_a(NEw/** @d */ \Other\Thing(), '\Other\Thing', allow_string: true) ? "y"/* x
 y */ : "n"/* x
 y */);
} finally {}
try {//c

Echo '#86', "\n";
/** @d */$f = function # h
 (#[\Nope] \Other\Thing $x): mixed {  return 	$x; }; # h
 /* x
 y */try { $f(unserialize('O:10:"Orig\\Thing":0:{}'
)); /** @d */o("accepted"); }  # h
catcH (\TypeError $e) { o("TE"); }
} # h
 finally {}
(FunCtion 	() { /*c*/ 
echo '#88', "\n";
o(//c
(fn($q#c
) => $q/* x
 y */)(strtolower('AB')));
echo '#89',  "\n"
;#c

$arr//c
 = [\T\s(\Other\Thing::X) => 5]; echo "{$arr[\T\s(\Other\Thing::X)]}\n";
 /*c*/ })(); 
#[\oRIg\ATtr(//c
'v'), //c
\Nope\Unk]
final class C91 extends \ArrayObject implements /* x
 y */\ORig\Contract {


    use \OriG\tr; # h

    pUbliC ?\Orig\Base $p1 { get => $this->hp1; /** @d */set(?\Orig\Base $value) { $this->hp1 = $value;	 } }
    private

 $hp1 # h
;
    public static /** @d */$cp2 = '\\Orig\\Thing';/** @d */ pubLic static/* x
 y */ function mkp2//c
() {/* x
 y */ reTurn new Static::$cp2; }
    public private(set) ?\Other\Thing # h
 $p3 //c
=

  null;


    pubLIc static function sp4(?#c
\Orig\Thing/* x
 y */ $x = # h
 null): STaTiC|\Orig\Thing| /*c*/ null { return $x; }//c

    public int#c
|\Other\Thing|false  # h
$p5;
}
echo '#92', "\n";
o(get_parent_class(new C91

) ?://c
 '-');
echO//c
 '#93'//c
,  "\n";


o(\T\names(class_implements#c
(new C91)) /*c*/ );
echo '#94', "\n";
o(\T\attrs(	new \ReflectionClass # h
(new C91)));
eCho
 '#95', "\n";/* x
 y */
o((neW C91 # h
)->who());
/* x
 y */echo //c
'#96', "\n"; 
$q
 = new C91; $q
->p1 = new \oriG\baSE; o(get_class($q->p1));
echo '#97',//c
 "\n";
o( # h
(string) (new \ReflectionProperty(C91::clAsS, 'p1'))->getType	())/** @d */;
echo '#98', "\n";
o(get_class(

C91::mkp2()));
echo '#99', "\n";
o(
(string) (new \ReflectionProperty(C91::class,
 'p3'))-> /*c*/ getType());
ecHO '#100'/** @d */, "\n";
o//c
(get_class(C91::sp4(New \Orig\ThINg()
) # h
)); # h

eCho '#101', "\n"/* x
 y */;
o((string)/** @d */ (neW \ReflectionMethod('Lib\Deep\N\\C91', 'sp4'))->getParameters()

[0]->getType()#c
);//c

echo '#102', "\n";/* x
 y */
o((string) (neW//c
 \ReflectionProperty
(C91::#c
clAss, 'p5'))->getType /*c*/ ()); # h

#[\oRIg\AttR(1)] function tf103((\Orig\Contract&\Countable)	|#c
\ArrayObject $x/* x
 y */): (\Orig\Contract&\Countable)|\ArrayObject { retURn

 $x; }
echo '#104', "\n";
o # h
(get_class(/* x
 y */tf103(new \ArrayObject([]))	));
echo '#105', "\n";
o((string) (new#c
 \ReflectionFunction('Lib\\Deep\\N\\tf103'))->getParameters()[0]->getType()//c
);
eCHo '#106', "\n" ;
o( \T\attrs( # h
nEw /** @d */\ReflectionFunction('Lib\\Deep\\N\\tf103')));
functIon tf107(\Orig\Base|null $x) /*c*/ : \Orig\Base|#c
null
 { reTurN $x

; }
Echo '#108', "\n";
o(get_class(tf107(nEw \Orig\Base)));
echo '#109', "\n";
o	((string) (new \ReflectionFunction('Lib\\Deep\\N\\tf107'))->getParameters()[0]->getType());
uSe function sleep as zz,

 //c
usleep, file_get_contents 
as /** @d */fgc;
