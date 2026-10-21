<?php
// a nullsafe chain ends at '::C'; a static access on the constant's value is a computed class
namespace NA;
class K { const C = 'Orig\Thing'; }
class H { public $ko; public function __construct() { $this->ko = new K; } }
$h = new H;
var_dump($h?->ko::C::$p);
var_dump($h?->ko::C::who());
var_dump($h?->ko::C::X);
var_dump($h->ko::C::who());
