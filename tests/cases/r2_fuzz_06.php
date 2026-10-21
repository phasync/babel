<?php
// A typed class constant (PHP 8.3) named EXTENDS / IMPLEMENTS / USE is a name: it must not switch on
// class-name-list mode for the rest of the statement, where a first-class callable (PHP 8.5) follows.
namespace App;
class K {
    const ?\Closure EXTENDS = null, UP = \strtoupper(...);
    const ?\Closure USE = null, UP2 = strtoupper(...);
    const ?\Closure IMPLEMENTS = null, UP3 = sleep(...);
}
echo (K::UP)('a'), ' ', (K::UP2)('b'), ' ', (K::UP3)(0), "\n";
