<?php
// methods, constants and enum cases whose names are PHP keywords the translator special-cases
class K {
    const include = 'c-include';
    const Require = 'c-require';
    public static function include($x) { return "include:$x"; }
    public function eval($x) { return "eval:$x"; }
    public static function require_once() { return 'require_once'; }
}
echo K::include(1), ' ', (new K)->eval(2), ' ', K::require_once(), ' ', K::include, ' ', K::Require, "\n";
