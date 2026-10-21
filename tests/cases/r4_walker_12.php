<?php
// Heredoc interpolation of a nullsafe static access that short-circuits: PHP skips the whole rest of
// the chain (arguments, ->c after the call, static properties), the translation must too.
class T { public static $p = 'P'; public $c = 'T'; static function who($x = '') { return 'T' . $x; } static function me() { return new T; } }
function side() { echo "[side]"; return 's'; }
$n = null; $o = new T;
echo <<<X
1 {$o?->c::who(side())}|{$n?->c::who(side())}|
X;
echo "\n";
echo <<<X
2 {$n?->c::me()->c}|
X;
echo "\n";
echo <<<X
3 {$o?->c::$p}|{$n?->c::$p}|
X;
echo "\n";
