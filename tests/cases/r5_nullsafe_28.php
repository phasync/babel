<?php
// empty() takes any expression: a nullsafe chain with a static call inside it is mapped like anywhere else.
class H { public $self; public function __construct() { $this->self = $this; } public static function id($x) { return $x; } }
$a = new H; $z = null;
var_dump(empty($a?->self::id('Orig\Thing')::who() === 'Repl\Thing' ? '' : 'unmapped'));
var_dump(empty($a?->self::id('Orig\Thing')::who()) ? 'empty' : $a?->self::id('Orig\Thing')::who());
var_dump(empty($z?->self::id('Orig\Thing')::who()));
var_dump(empty([$a?->self::id('Orig\Thing')::who()][0] === 'Repl\Thing' ? 0 : 1));
