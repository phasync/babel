<?php
// A nullsafe chain ending in a call passed to a by-reference parameter: PHP passes the call result
// with a notice ("Only variables should be passed by reference"); it must not become an Error.
set_error_handler(function ($no, $msg) { echo "W: $msg\n"; return true; });
class H { public $self; public $b = 'Orig\Thing';
    public function __construct() { $this->self = $this; }
    public static function arr() { return [3, 1, 2]; } }
function f(&$x) { $x[] = 1; return count($x); }
$a = new H; $z = null;
var_dump(end($a?->self::arr()));
var_dump(sort($a?->self::arr()));
var_dump(f($a?->self::arr()));
var_dump(end($a?->self?->self::arr()));
