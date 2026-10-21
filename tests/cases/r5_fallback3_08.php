<?php
// a static method that defines the namespaced function in the middle of its recursion, nested function
// declarations, and first-class callables (direct and returned by an arrow function)
namespace App;
class S { static function r($n) { if ($n === 2) eval('namespace App; function strtoupper($a) { return "L$a"; }'); return $n > 3 ? '' : strtoupper($n) . ',' . self::r($n + 1); } }
echo S::r(0), "\n";
function outer() { function inner() { return strtoupper('i'); } return strtoupper('o'); }
echo outer(), inner(), "\n";
$f = strtoupper(...); $g = fn() => strtoupper(...);
echo $f('f'), ($g())('g'), "\n";
