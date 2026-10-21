<?php
// Parenthesised expressions of every kind as the class expression
$v = 2;
$c = 'Orig\Thing';
echo (match ($v) { 1 => 'X', 2 => 'Orig\Thing' })::who(), "\n";
echo ($v > 1 ? 'Orig\Thing' : 'X')::who(), "\n";
echo ($v > 1 ? $c : 'X')::X, "\n";
echo (function () { return 'Orig\Thing'; })()::who(), "\n";
echo (fn () => 'Orig\Thing')()::who(), "\n";
echo (static fn () => 'Orig\Thing')()::$p, "\n";
echo ($c ?: 'X')::who(), "\n";
echo ((($c)))::who(), "\n";
echo ('Orig' . '\\' . 'Thing')::who(), "\n";
echo (sprintf('%s\%s', 'Orig', 'Thing'))::who(), "\n";
echo (new Orig\Thing)::who(), "\n";
echo (clone new Orig\Thing)::X, "\n";
echo ($x = 'Orig\Thing')::who(), "\n";
echo ($y ??= 'Orig\Thing')::who(), "\n";
echo [$c][0]::who(), "\n";
echo [[$c]][0][0]::who(), "\n";
