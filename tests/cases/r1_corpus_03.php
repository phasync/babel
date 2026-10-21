<?php
// A static call to a method named like a keyword (`CoreExtension::include($env, ...)` in twig) is not an include.
class K
{
    public static function __callStatic($name, $args) { return $name . ':' . implode(',', $args); }
}
echo K::include(1), ' ', K::require(2), ' ', K::eval(3), ' ', K::include_once(4), "\n";
