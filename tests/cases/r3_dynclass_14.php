<?php
// instanceof with every dynamic right hand side
class H { public static $c = 'Orig\Thing'; public $p = 'Orig\Thing'; public static function f() { return 'Orig\Thing'; } }
$o = new Orig\Thing();
$c = 'Orig\Thing';
$n = 'c';
$h = new H();
$a = ['k' => 'Orig\Thing'];
var_dump($o instanceof $c);
var_dump($o instanceof $$n);
var_dump($o instanceof ${'c'});
var_dump($o instanceof $h->p);
var_dump($o instanceof $a['k']);
var_dump($o instanceof H::$c);
var_dump($o instanceof ('Orig' . '\Thing'));
var_dump($o instanceof (H::f()));
var_dump($o instanceof ($c ?? 'X'));
var_dump(!$o instanceof $c);
var_dump($o instanceof $c && true);
var_dump($o instanceof $h::$c);
var_dump($o instanceof $o);
