<?php
// computed class expressions in front of '::' of every dereferenceable kind
const C = 'Orig\Thing';
class X { const Y = 'Orig\Thing'; public static $s = 'Orig\Thing'; }
$a = 'Thing'; $th = 'Orig\Thing';
$o = unserialize('O:10:"Orig\\Thing":0:{}');
$h = new stdClass; $h->b = 'Orig\Thing';
echo "Orig\\{$a}"::who(), "\n";
echo "Orig\\$a"::$p, "\n";
echo b"Orig\Thing"::who(), "\n";
echo "{$th}"::X, "\n";
echo X::Y::who(), "\n";
echo (C)::who(), "\n";
echo (\C)::who(), "\n";
echo $o::class, ' ', $o::class::who(), "\n";
echo $h->{"b"}::who(), "\n";
echo X::$s::who(), X::$s::$p, "\n";
echo ('Orig' . '\Thing')::who(), "\n";
echo [$th][0]::who(), ['k' => 'Orig\Thing']['k']::who(), "\n";
echo "Orig\Thing"[0], "\n";
