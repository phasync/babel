<?php
// variable variables as callees, method names, property names and class names, split by comments and newlines
class O { public $c = 'Orig\Thing'; public $fs = 'strtoupper'; public $o; public function m() { return 'fopen'; } public function __construct() { $this->o = $this; } }
$o = new O; $name = 'o'; $pp = 'c'; $p = 'pp'; $mm = 'm'; $m = 'mm'; $fv = 'fs'; $f = 'fv';
$g = 'strtoupper'; $gg = 'g';
echo $$gg('a'), ' ', ${'g'}('b'), ' ', ${'g' . ''}('c'), "\n";
echo $$name->$$m()('d'), ' ', $o->{$$m}()('e'), "\n";
echo $o->$$p::who(), ' ', $o?->$$p::who(), ' ', $$name->o->$$p::$p, "\n";
echo ($o
    ->o /* x */ ->$$f
    // y
    )('f'), "\n";
echo $o->o->$$p
    ::who(), "\n";
echo "{$$name->$$m()('g')} {$o->$$p::who()}", "\n";
echo <<<H
{$$name->$$m()('h')} {$o->$$p::who()}
H, "\n";
$cls = 'pp';
echo $o->{$$cls}::who(), ' ', $$cls, "\n";
