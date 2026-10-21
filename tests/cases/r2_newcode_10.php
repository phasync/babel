<?php
// Nullsafe short-circuit covers a following static call: $x?->cls::who() is null when $x is null.
class H { public $cls = 'Orig\Thing'; }
$h = new H; $none = null;
var_dump($h?->cls::who());
var_dump($none?->cls::who());
