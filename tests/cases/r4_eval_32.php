<?php
class K { public $c = 'K'; static function m() { return 'm'; } }
function f($o) {
    $r = $o?->c::m();
    return implode(',', array_keys(get_defined_vars())) . " $r";
}
echo f(new K), "\n";
function g($o) {
    eval('$r = $o?->c::m();');
    return implode(',', array_keys(get_defined_vars())) . " $r";
}
echo g(new K), "\n";
