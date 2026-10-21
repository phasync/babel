<?php
// eval line with heredoc / nowdoc arguments holding rewritten interpolation
class K { public static $p = 'K'; public static function m($x = '') { return 'K'; } }
function L($f) { echo preg_replace('~^.*\((\d+)\) : eval.*$~', '$1', $f), "\n"; }
$c = 'K';
$o = new stdClass;
$o->c = 'K';
$n = null;
eval(<<<E
L(__FILE__); echo "{$c::m()}
", "{$o?->c::m()}\n";
E);
eval(<<<E
  L(__FILE__);
  echo '{$o?->c::m(
  )}', "\n";
  E
);
eval(<<<E
L(__FILE__); echo '{$c::$p}'
. '{$n?->c::m()}-'

, "\n";
E . "\n");
eval(<<<E

L(__FILE__);
echo '{$o->c::m()}', "\n";

E
);
eval(<<<'E'
L(__FILE__); echo "{$c::m()}{$o?->c::$p}\n";
E);
eval(<<<'E'
L(__FILE__); echo <<<F
{$c::m()} {$o?->c::m()}
F . "\n";
E);
eval("L(__FILE__); echo \"{\$c::m()}\" . <<<F
 {\$o?->c::m()}
F . \"\\n\";");
eval(`echo 'L(__FILE__); echo "x\n";'`);
eval(`echo 'L(__FILE__); echo "{$c::m()}\n";'
`);
