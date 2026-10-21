<?php function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
$f = fn() => 'L(__FILE__);';
class K { static function m() { return 'L(__FILE__);'; } }
$x = 'K';
eval(<<<E
{$f()}
E
);
eval(<<<E
{$x::m(
)}
E

);
eval(<<<"E"
  {$f()} {$x::m()}
  E);
eval(`echo 'L(__FILE__);'`
);
