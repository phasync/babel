<?php
// Trait method aliases that are keyword names.
trait T { function who() { return 'who'; } }
class D { use T { who as include; who as protected __DIR__; who as require; } function d() { return $this->__DIR__(); } }
$d = new D;
echo $d->include(), $d->d(), $d->require(), ' ', basename(__DIR__), "\n";
