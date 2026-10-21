<?php
// heredoc interpolation of a short-circuited nullsafe chain before '::': null, no arguments evaluated
class Box { public $p = 'Orig\Thing'; public ?Box $n = null; }
function side($x) { echo "side:$x\n"; return $x; }
$box = new Box; $nul = null; $m = 'who';
echo <<<EOT
1<{$nul?->p::$p}>
2<{$box->n?->p::$p[0]}>
3<{$nul?->p::who(side(3))}>
4<{$box?->n?->p::$m(side(4))}>
5<{$box?->p::$p}>
EOT;
echo "\n";
echo "6<{$nul?->p::$p}>7<{$nul?->p::who(side(7))}>8<{$box->n?->p::$m(side(8))}>9<{$box?->p::who()}>\n";
// a null that does not come from a short circuit ($box?->n is null, $box is not) is an Error in PHP
try { echo <<<EOT
<{$box?->n::who()}>
EOT; } catch (\Error $e) { echo get_class($e), ': ', $e->getMessage(); }
echo "\n";
