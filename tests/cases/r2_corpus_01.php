<?php
namespace a;
// ($expr)::member - a parenthesized class expression (php-enum EnumSet: `($this->enumeration)::get($e)`)
$c = 'Orig\Thing';
$o = new \stdClass;
$o->c = $c;
echo ($c)::who(), "\n";
echo ($o->c)::X, "\n";
echo ($o->c ?? 'x')::$p, "\n";
