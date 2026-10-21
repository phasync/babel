<?php
// a parenthesised variable is called: ($f)(...)
$f = 'fopen';
echo ($f)('x'), "\n";
echo ($f)(...)('x'), "\n";
$a = ['k' => 'sleep'];
echo ($a['k'])(1), "\n";
