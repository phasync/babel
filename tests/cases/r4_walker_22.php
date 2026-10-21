<?php
// A `?->` inside the interpolation of a string used as class name is not a link of the chain before '::'.
$o = new class { public $c = 'Orig\Thing'; };
echo "{$o?->c}"::who(), "\n";
echo ("{$o?->c}")::$p, "\n";
