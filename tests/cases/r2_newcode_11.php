<?php
// new (expr) and instanceof (expr) take an arbitrary class expression (PHP 8.0).
$cls = 'Orig\Thing';
echo get_class(new ($cls)), "\n";
echo get_class(new ('Orig\\' . 'Thing')), "\n";
$o = new Repl\Thing;
var_dump($o instanceof ($cls));
