<?php
declare(strict_types=1);
// first-class callables of class-name functions created in a strict_types file
$g = is_a(...);
$c = class_exists(...);
function strictCall(\Closure $f, ...$a) { try { return $f(...$a); } catch (\TypeError $e) { return 'TypeError: ' . $e->getMessage(); } }
