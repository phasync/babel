<?php
$f = 'strtoupper';
$g = 'trim';
$c = 'Orig\Thing';
$o = new stdClass;
$o->c = $c;
$o->f = ['k' => 'fopen'];
echo "a {$g(<<<E
     {$f('x')} {$c::who()} "{$g(" q{$c::$p}q ")}"
    E)} b\n";
echo <<<E
  1 {$g("2 {$c::who()} " . <<<F
    3 {$o->c::who()} {$o->f['k']('y')}
    F)}
  E, "\n";
echo "{$o->f['k']('z')}|{$o?->c::who()}|{$g(`echo {$c::$p}`)}\n";
$arr = ["k{$c::who()}" => "v{$f('w')}"];
echo key($arr), '=', current($arr), "\n";
echo "{$c::who()}"::who(), ' ', "x{$c::who()}y"[1], "\n";
