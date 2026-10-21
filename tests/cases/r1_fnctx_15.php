<?php
namespace n;
use Orig\Thing;
class Base0 { public function __construct(public $a = null) {} }
$o = new class(match (1) { default => 1 }) extends Base0 {
    public Thing $t;
    public function fopen() { return 'method-fopen'; }
    public function get(Thing $x): ?Thing { return $x; }
};
echo $o->fopen(), ' ', fopen('x'), "\n";
echo (new \ReflectionProperty($o, 't'))->getType(), ' ', (new \ReflectionMethod($o, 'get'))->getReturnType(), "\n";
