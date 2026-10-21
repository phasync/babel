<?php
namespace q;
function foo($class, $cb) { return $cb(); }
echo foo(class: 'x', cb: function () { function sleep($s) { return 'own-sleep'; } return 1; }), "\n";
echo sleep(1), "\n";
