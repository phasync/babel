<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
class K { public $c = 'K'; static function m($a) { return $a; } }
$o = new K;
$n = null;
eval($o?->c::m(
'L(__FILE__);'
));
var_dump(@eval('return $n?->c::m(1);'));
