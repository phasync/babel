<?php
// new ('name')(...) instantiates the class 'name': a class that shares its name with a mapped function is not a callable.
class strtoupper { public function __construct(public $v = null) {} }
class fopen {}
$a = new ('strtoupper')('x');
$b = new ('fopen')();
echo get_class($a), ' ', $a->v, ' ', get_class($b), ' ', get_class(new ('Orig\Thing')()), "\n";
