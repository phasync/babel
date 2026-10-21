<?php
// preg_replace_callback_array() takes its callables as the values of its first argument
echo preg_replace_callback_array(['/a/' => 'strtoupper', '/b/' => 'Orig\Thing::who'], 'ab'), "\n";
$cb = 'strtoupper';
echo preg_replace_callback_array(['/x/' => $cb], 'x'), "\n";
