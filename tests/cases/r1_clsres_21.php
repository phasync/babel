<?php
namespace dyn3;
class Holder { public static $cls = 'Orig\Thing'; public static $o; }
$h = 'dyn3\Holder';
echo get_class(new $h::$cls), "\n";
