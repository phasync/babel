<?php
// Heredoc / nowdoc corner cases: labels named like mapped names, callee positions, closing label followed by operators.
$f = 'strtoupper';
$c = 'Orig\Thing';
echo (<<<E
    strtoupper
    E)('a'), "\n";
echo (<<<'fopen'
    file_get_contents
    fopen)('b'), "\n";
echo "$f"('c'), ' ', "{$f}"('d'), ' ', (<<<E
  $f
  E)('e'), "\n";
echo [<<<E
  $c
  E, 'who']() . <<<PDO
    \{$f('x')} fopen('y') {$f('z')} PDO
    PDO . "\n";
$a = [<<<A
	tab {$c::who()}
	A, <<<'B'
	  {$c::who()}
	B];
echo implode('|', $a), "\n";
echo strlen(<<<X
   X), ' ', __LINE__, "\n";
echo <<<E
  {$f(<<<F
    {$c::$p}
    F . 'x')}
  E . (<<<Q
  Orig\Thing
  Q)::who(), "\n";
