<?php
// fallback calls in the arguments of interpolated method calls and nullsafe static chains, in double
// quoted strings, and heredocs, before and after the namespaced function exists
namespace App;
class B { public $b = 'Orig\Thing'; public $s; function __construct() { $this->s = $this; } function m(...$a) { return implode('|', $a); } }
function t($o, $n) {
    echo "a{$o->m(strtoupper('x'), fopen(...)('y'))}b {$o?->b::who(strtoupper('z'))} {$n?->b::who(strtoupper('q'))}.\n";
    echo <<<EOT
     h{$o->m(strtoupper('h'))} {$o?->s?->b::who(fopen('w'))}|{$n?->s?->b::who(fopen('w'))}|{$o->m(...[strtoupper('s')])}
    EOT;
    echo "\n";
}
t(new B, null);
eval('namespace App; function strtoupper($x) { return "local"; } function fopen($x) { return "lf"; }');
t(new B, null);
