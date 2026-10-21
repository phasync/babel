<?php
// Typed class constants (PHP 8.3) whose names are keywords.
class C { const string INCLUDE = 'i'; const string __DIR__ = 'd'; public const string REQUIRE_ONCE = 'r'; }
echo C::INCLUDE, C::__DIR__, C::REQUIRE_ONCE, ' ', basename(__DIR__), "\n";
