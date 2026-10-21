<?php
class T { public static $p = 'T'; public static $f = ['k' => 'strrev']; public $c = 'T'; static function who() { return 'T'; } function self() { return $this; } }
$o = new T; $n = null; $f = fn() => 'strrev'; $c = 'T';
echo $f /* a */ ( /* b */ ) # c
  ('ab'), "\n";
echo $o // x
  ?-> /** y */ c
  :: who(), "\n";
var_export($n ?-> c :: who()); echo "\n";
echo ( $o ?-> c ) :: $p, "\n";
echo $c
::
$f
[ 'k' ]
( 'xy' ), "\n";
echo "{$o
  ->c::who()}", "\n";
echo <<<X
 {$o ?-> self() -> c :: who()} {$n?->c::who()}|
X;
echo "\n";
