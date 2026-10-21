<?php
// Chains in foreach, return of closures with return types, as array_map arguments.
function t($f) { try { var_dump($f()); } catch (Throwable $e) { echo get_class($e), ": ", $e->getMessage(), "\n"; } }
function tr($x) { echo "tr($x) "; return $x; }
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
class S { public static $arr = ['Orig\Thing']; }
class H { public $b = 'S'; public $c = 'Orig\Thing'; }
$a = new H; $z = null;
foreach ($a?->b::$arr as $k => $v) { var_dump($v::who()); }
foreach ($z?->b::$arr ?? ['none'] as $v) { var_dump($v); }
$f = function () use ($a): array { return $a?->b::$arr; };
var_dump($f()[0]::who());
var_dump(count(array_filter($a?->b::$arr, fn($c) => $c::who() === "Repl\\Thing")));
