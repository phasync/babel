<?php
declare(strict_types=1);
// The strictness of a call to an internal function is the caller's: a first-class callable made in a
// strict file and called from a weak file coerces, one made in a weak file and called from a strict
// file throws.
require __DIR__ . '/../cases/fixtures/r5_newfeat_weak.php';
require __DIR__ . '/../cases/fixtures/r5_newfeat_strict.php';
$f = class_exists(...);
try { var_dump(weak_call($f, 123)); } catch (TypeError $e) { echo $e->getMessage(), "\n"; }
try { var_dump(weak_call(is_a(...), 'Orig\Thing', 'Orig\Thing', 1)); } catch (TypeError $e) { echo $e->getMessage(), "\n"; }
try { var_dump(strict_call($GLOBALS['weak_fcc'], 123)); } catch (TypeError $e) { echo $e->getMessage(), "\n"; }
try { var_dump($GLOBALS['weak_fcc'](123)); } catch (TypeError $e) { echo $e->getMessage(), "\n"; }
