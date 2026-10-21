<?php
declare(strict_types=1);
// strict_types of the calling file applies to a first-class callable of an internal function; the
// shim that stands in for it must not coerce where the original throws a TypeError
$fa = is_a(...);
try { var_dump($fa(new \Orig\Thing, 1)); } catch (\TypeError $e) { echo get_class($e), "\n"; }
$ce = class_exists(...);
try { var_dump($ce(123)); } catch (\TypeError $e) { echo get_class($e), "\n"; }
var_dump($fa(new \Orig\Thing, 'Orig\Thing'));
