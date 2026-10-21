<?php
// `X::$$n()` and `X::${expr}()` (and `$o->$$n()`) are method calls whose name is a variable variable,
// not calls of a static property's value.
class K { static function who() { return 'K::who'; } function me() { return 'K->me'; } }
$c = 'K'; $n = 'm'; $m = 'who'; $o = new K; $p = 'q'; $q = 'me';
echo $c::$$n(), "\n";
echo K::$$n(), "\n";
echo K::${'m'}(), "\n";
echo $c::${'m'}(), "\n";
echo $o->$$p(), "\n";
echo $o->${'q'}(), "\n";
