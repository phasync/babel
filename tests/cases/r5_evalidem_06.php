<?php
// the double quoted interpolation rewrite in odd positions, and eval'd
$c = 'Orig\Thing';
$w = 'who';
$t = 'Thing';
echo "{$c::who()}"::X, "\n";
echo "Orig\\{$t}"::X, "\n";
echo "{$c::who()}"::who(), "\n";
echo "{$c::$p[0]}{$c::$p}x", "\n";
echo "{$c::who()}"::$p, "\n";
echo strlen("{$c::who()}") . "{$c::who()}", "\n";
echo "{$c::$w()}{$c::$w()}" === 'Repl\ThingRepl\Thing' ? "eq\n" : "ne\n";
eval('echo "{$c::who()}"::X, "\n", "Orig\\\\{$t}"::who(), "\n";');
$s = "{$c::who()}";
echo $s, "\n";
echo "{$c}"::X, "\n";
