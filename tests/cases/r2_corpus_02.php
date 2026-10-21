<?php
namespace a;
// new (expr) - PHP 8 arbitrary-expression new (laravel `new ($this->getPivotClass())`, twig `new ($this->nodeClass)(...)`)
$c = 'Orig\Thing';
$o = new \stdClass;
$o->c = $c;
echo get_class(new ($c)), "\n";
echo get_class(new ($o->c)()), "\n";
echo get_class(new (trim(' Orig\Thing '))), "\n";
