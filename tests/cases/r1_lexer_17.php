<?php
namespace A;
use Orig\Thing;
$s = "unbalanced { brace";
$t = '} } }';
$h = <<<EOT
{ {
  } } } {$s}
EOT;
echo $h, "\n";
$a = ['k' => 'v'];
$x = match (true) {
    $s === 'a' => fopen('a'),
    default => sleep(1),
};
echo $x, "\n";
function f(Thing $t, array $a) { return "}{$a['k']}{"; }
echo f(new Thing, $a), "\n";
echo "{$a['k']} {$s}\n";
class K { public Thing $p; }
echo (new \ReflectionProperty(K::class, 'p'))->getType(), "\n";
function h(Thing $t, $s) { $q = "{$s}"; return strtoupper($q); }
echo h(new Thing, 'x'), "\n";
