<?php
namespace kwc;
class Promise {
    public static function catch($x) { return "catch($x)"; }
    public static function extends($x) { return "extends($x)"; }
    public static function fn($x) { return "fn($x)"; }
    public static function function($x) { return "function($x)"; }
    public static function implements($x) { return "implements($x)"; }
    public static function new($x) { return "new($x)"; }
    public static function list($x) { return "list($x)"; }
}
echo Promise::catch(sleep(1)), "\n";
echo Promise::extends(sleep(1)), "\n";
echo Promise::fn(sleep(1)), "\n";
echo Promise::function(sleep(1)), "\n";
echo Promise::implements(sleep(1)), "\n";
echo Promise::new(sleep(1)), "\n";
echo Promise::list(sleep(1)), "\n";
