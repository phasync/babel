<?php
// A nullsafe chain before a static call with a braced method name ::{'m'}() short-circuits too.
$o = new class { public $c = 'Orig\Thing'; }; $n = null; $w = 'who';
var_dump($o?->c::{'who'}());
var_dump($n?->c::{'who'}());
var_dump($n?->c::{$w}());
var_dump($n?->c::$w());
