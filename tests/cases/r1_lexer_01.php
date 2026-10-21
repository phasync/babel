<?php
$x = new stdClass; $x->m = fn() => 1;
$o = new class { public function m($a) { return $a; } public $p = 'P'; };
$s = <<<TXT
call fopen('x') and new Orig\Thing and sleep(1)
interp {$o->m(fopen('a'))} and {$o->m(strtoupper('b'))} and $o->p
TXT;
echo $s, "\n";
$n = <<<'NOW'
fopen('x') {$o->m(fopen('a'))} Orig\Thing
NOW;
echo $n, "\n";
echo "str {$o->m(sleep(2))} fopen()\n";
