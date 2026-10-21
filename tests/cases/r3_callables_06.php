<?php
// variable variables as callees: $$n(), ${'f'}()
$f = 'fopen';
$n = 'f';
echo $$n('x'), "\n";
echo ${'f'}('x'), "\n";
echo ${$n}('x'), "\n";
