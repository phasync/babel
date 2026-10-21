<?php
// PHP 8.5: mapped calls inside closures and first-class callables in global constant expressions
const C = static function () { return strtoupper('x') . '/' . fopen('y'); };
echo (C)(), "\n";
const F = strtoupper(...);
echo (F)('z'), "\n";
define('G', 1);
const H = [static function () { $f = 'sleep'; return $f(1); }];
echo (H[0])(), "\n";
