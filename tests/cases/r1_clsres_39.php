<?php
namespace dyn4;
class Holder { public static $cls = 'Orig\Thing'; }
$h = 'dyn4\Holder';
var_dump(new \Repl\Thing instanceof $h::$cls);
