<?php
// Constants and braces as class expressions: CONST[0]::, H::C[0]::, $o->{'c'}::, $o?->{'c'}::, "{$o->{'c'}::who()}"
const LIST_ = ['Orig\Thing'];
class H { const C = ['Orig\Thing']; }
$o = new stdClass();
$o->c = 'Orig\Thing';
echo LIST_[0]::who(), "\n";
echo \LIST_[0]::X, "\n";
echo H::C[0]::who(), "\n";
echo $o->{'c'}::who(), "\n";
echo $o?->{'c'}::who(), "\n";
echo "{$o->{'c'}::who()}\n";
echo $o->{'c'}::$p, "\n";
