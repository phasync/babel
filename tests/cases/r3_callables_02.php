<?php
// callables held in properties: ($o->cb)(), $o->map['k']()
$o = new stdClass;
$o->cb = 'strtoupper';
$o->map = ['k' => 'usleep'];
echo ($o->cb)('x'), "\n";
echo $o->map['k'](1), "\n";
echo ($o?->cb)('y'), "\n";
