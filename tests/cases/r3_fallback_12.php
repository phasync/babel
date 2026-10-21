<?php
// compiler-specialised functions, when mapped, through the namespace check (custom map)
namespace Y {
    function strlen($s) { return 'Y:strlen'; }
    function count($a, $m = 0) { return 'Y:count'; }
    function is_null($v) { return 'Y:is_null'; }
    function in_array($n, $h, $s = false) { return 'Y:in_array'; }
    function array_key_exists($k, $a) { return 'Y:ake'; }
    function defined($c) { return 'Y:defined'; }
    function function_exists($f) { return 'Y:function_exists'; }
    function call_user_func($f, ...$a) { return 'Y:cuf'; }
    function is_callable($f, $s = false, &$n = null) { return 'Y:is_callable'; }
    function gettype($v) { return 'Y:gettype'; }
    function chr($c) { return 'Y:chr'; }
    function ord($c) { return 'Y:ord'; }
    function sprintf($f, ...$a) { return 'Y:sprintf'; }
}
namespace {
    $names = ['strlen', 'count', 'is_null', 'in_array', 'array_key_exists', 'defined', 'function_exists',
        'call_user_func', 'is_callable', 'gettype', 'chr', 'ord', 'sprintf'];
    $map = [];
    foreach ($names as $n) { $map[$n] = "Y\\$n"; }
    $b = new phasync\Babel\Babel($map);
    $code = $b->translate('<?php namespace App;
    function count($a) { return "App:count"; }
    echo strlen("abc"), " ", count([1]), " ", is_null(null), " ", in_array(1, [1]), " ",
        array_key_exists("a", []), " ", defined("X"), " ", function_exists("f"), " ",
        call_user_func("f"), " ", is_callable("f"), " ", gettype(1), " ", chr(65), " ", ord("a"), " ", sprintf("%d", 1), "\n";
    echo \strlen("abc"), " ", \count([1, 2]), "\n";
    ', 'virtual.php');
    eval(substr($code, 5));
}
