<?php
// A named argument whose name is the magic constant keyword __FILE__ / __DIR__.
function f($__FILE__ = 'none', $__DIR__ = 'none') { return $__FILE__ . '/' . $__DIR__; }
echo f(__FILE__: 'a', __DIR__: 'b'), "\n";
echo basename(__FILE__), "\n";
