<?php
// a named attribute argument whose name equals a mapped class short name (global namespace, PDO)
#[Attribute]
class Opt { public function __construct(public $PDO = null, public $Thing = null) {} }
#[Opt(PDO: 'named', Thing: PDO::class)]
class Z {}
$o = (new ReflectionClass('Z'))->getAttributes()[0]->newInstance();
echo $o->PDO, ' ', $o->Thing, "\n";
