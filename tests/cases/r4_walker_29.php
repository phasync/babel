<?php
// A variable-variable property name ($o->$$p, $o->${expr}) is part of the chain before `::` / after `new` / `instanceof`.
$o = new class { public $c = 'Orig\Thing'; }; $p = 'q'; $q = 'c';
echo get_class(new $o->$$p), "\n";
echo get_class(new $o->${'q'}), "\n";
echo $o->$$p::who(), "\n";
echo $o->${'q'}::who(), "\n";
var_dump(new Repl\Thing instanceof $o->$$p);
