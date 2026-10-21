<?php
class K {
    public static function include($x) { return "include:$x"; }
    public function eval($x) { return "eval:$x"; }
    public static function require_once() { return 'require_once'; }
}
echo K::include(1), ' ', (new K)->eval(2), ' ', K::require_once(), "\n";
