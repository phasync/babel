<?php
// new (expr): PHP 8.0 arbitrary-expression class name, same semantics as new $x
namespace s24;
$c = 'Orig\Thing';
$o = new ($c);
echo $o::who(), "\n";
$p = new ('Orig\\' . 'Base')();
echo $p->name(), "\n";
$arr = ['k' => 'Orig\Base'];
echo (new ($arr['k']))->name(), "\n";
