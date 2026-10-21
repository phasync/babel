<?php
// nested heredocs/nowdocs with interpolated method calls taking mapped calls
namespace s14;
class O { public function m(...$a) { return implode('+', $a); } public $p = ['k' => 'v']; }
$o = new O;
echo <<<A
  one {$o->m(fopen('x'), <<<B
    two {$o->m(strtoupper('y'), \Orig\Thing::who())}
    B)} three {$o->p['k']}
  four {$o->m(\fopen('z'))}
  A;
echo "\n";
echo "x{$o->m(sleep(1), "in{$o->m(usleep(2))}")}y\n";
echo <<<'N'
  {$o->m(fopen('x'))}
  N;
echo "\n";
