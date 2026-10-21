<?php
// Keyword names as the second and later constants of one class constant declaration.
class C { const A = 1, __FILE__ = 'f', INCLUDE = 'i', EVAL = 'e'; }
echo C::A, C::__FILE__, C::INCLUDE, C::EVAL, ' ', basename(__FILE__), "\n";
