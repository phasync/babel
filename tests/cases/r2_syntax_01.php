<?php
// PHP 8.4: new without wrapping parentheses, member access chained directly
namespace s01;
use Orig\Thing;
use Orig\Base;
echo new Thing()::who(), "\n";
echo new Thing()::X, "\n";
echo new \Orig\Base()->name(), "\n";
echo new Base()?->name(), "\n";
echo new Thing()::class, "\n";
echo new Thing() instanceof Thing ? "yes\n" : "no\n";
$x = 'Orig\Base';
echo new $x()->name(), "\n";
$h = new class { public $cls = 'Orig\Thing'; };
echo new $h->cls()::who(), "\n";
