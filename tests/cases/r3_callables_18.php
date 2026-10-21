<?php
// variable calls inside string interpolation and heredocs
$f = 'strtoupper';
$a = ['k' => 'fopen', 'n' => ['j' => 'sleep']];
echo "{$f('x')}|{$a['k']('y')}|{$a['n']['j'](1)}\n";
echo <<<EOT
{$f('x')} {$a['k']('y')}
EOT;
echo "\n";
echo <<<"EOT"
  [{$a['n']['j'](2)}]
  EOT;
echo "\n";
$o = new class { public $p = ['fopen']; function m($c) { return $c; } };
echo "{$o->m($f('q'))}\n";
echo "{$o->p[0]}\n";
$g = fn($x) => "<$x>";
echo "{$g($f('w'))}\n";
